<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Picture;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class Novel extends Model
{

    /**
     * ソフトデリートを使う
     */
    use SoftDeletes;

    /**
     * １ページに表示する数
     */
    const ACT_NUM_LIST = 20;
    const ACT_NUM_DETAIL = 5;

    /**
     * ステータス
     */
    const OPEN = 1;
    const CLOSE = 99;

    static $statusList = [
        self::OPEN => '公　開',
        self::CLOSE => '非公開',
    ];


    /**
     * Dropzone.jsで上げた画像を一時的に保存するディレクトリの絶対パス
     *
     * @var string
     */
    public $tmpDir = '';

    /**
     * 一時的にファイルを保存するディレクトリのパス
     *
     * @var string
     */
    public static $tmpFilePath = '/app/public/act-pict-tmp/';

    /**
     * アップロード先ディレクトリの絶対パス
     *
     * @var string
     */
    public $uploadDir = '';

    /**
     * 活動の様子に使う画像を格納するディレクトリパス
     *
     * @var string
     */
    public static $baseFilePath = '/files/activity/';

    /**
     * 画像アップロードの際のkey名
     *
     * @var string
     */
    public static $paramName = 'file';

    /**
     * 詳細ページで使う画像のプレフィックス
     *
     * @var string
     */
    public static $pictPrefix = '270x180_';

    /**
     * バリデーションメッセージ
     *
     * @var array
     */
    static $validationMessages = [
        //
    ];

    /**
     * モデルの「初期起動」メソッド
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        //グローバルスコープ追加。活動の様子は基本的に開催日の新しい順に並べる
        static::addGlobalScope('date', function (Builder $builder) {
            $builder->orderBy('date', 'desc');
        });
    }

    /**
     * コンストラクタ。ちゃんと親を呼び出しましょう。
     */
    public function __construct()
    {
        parent::__construct();
        $this->tmpDir = storage_path() . self::$tmpFilePath;
        $this->uploadDir = public_path() . self::$baseFilePath;
    }

    /**
     * 活動の様子のポリモーフィックリレーション
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function pictures()
    {
        return $this->morphMany(Picture::class, 'target');
    }

    /**
     * 公開ステータスのものだけ取得する場合のローカルスコープ
     *
     * @param $query
     * @return mixed
     */
    public function scopeOpen($query)
    {
        return $query->where('status', self::OPEN);
    }

    /**
     * バリデーションルールを返すメソッド
     *
     * @param bool $storeFlg
     * @return array
     */
    static function getValidationRules($storeFlg = false)
    {
        $rules = [
            'title' => 'required',
            'date' => 'required',
            'place' => 'required',
            'status' => 'required',
        ];

        if ($storeFlg === true) {
            $rules = array_merge($rules, ['pictures' => 'required']);
        }

        return $rules;

    }

    /**
     * 活動の様子を保存するメソッド
     *
     * @param Request $request
     */
    public function saveAll(Request $request)
    {

        $this->title = ($request->title !== null) ? $request->title : null;
        $this->date = getStdDate($request->date); //必須項目
        $this->place = $request->place; //必須項目
        $this->detail = ($request->detail !== null) ? $request->detail : null;
        $this->status = $request->status; //必須項目
        $this->save();

        //画像が設定されている場合は保存処理
        if (!empty($request->pictures)) {

            $uploadDir = $this->uploadDir . $this->id . '/'; //最終的な保存先

            //picturesテーブルから紐付いているものは一旦全削除
            $this->pictures()->delete();

            //それぞれの画像に対して処理
            foreach ($request->pictures as $key => $pict) {

                $this->pictures()->create(['name' => $pict, 'order' => $key + 1]);

                if (!File::exists($uploadDir)) { //保存先ディレクトリが無い場合は作成
                    File::makeDirectory($uploadDir);
                }

                //保存先に画像が無ければ（＝新しい画像の場合）、一時ディレクトリから移動
                //保存先に画像がある時（＝既に登録されている画像の場合）は何もしない
                if (!File::exists($uploadDir . $pict)) {
                    File::move($this->tmpDir . $pict, $uploadDir . $pict);

                    /**
                     * リサイズ処理
                     */
                    $image = Image::make($uploadDir . $pict);
                    $image->fit(270, 180)->save($uploadDir . self::$pictPrefix . $pict);
                }

            }

        }
    }

    /**
     * 画像の内、order が１の画像のパスを返すメソッド
     *
     * @return string
     */
    public function getMainPictPath()
    {

        if ($this->pictures->count() > 0) {
            return self::$baseFilePath . $this->id . '/' . self::$pictPrefix . $this->pictures->sortBy('order')->first()->name;
        }

        return '';

    }

    /**
     * 詳細画面で表示する、「自分以外の、公開中の」活動の様子を取得して返すメソッド
     *
     * @return mixed
     */
    public function getActList(){

        return self::where('id', '!=', $this->id)
            ->open()
            ->take(self::ACT_NUM_DETAIL)
            ->get();

    }

}
