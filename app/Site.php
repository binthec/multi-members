<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Auth;

class Site extends Model
{

    /**
     * ソフトデリートを使う
     */
    use SoftDeletes;

    /**
     * １ページに表示する数
     */
    const NUM = 20;

    /**
     * ステータス
     */
    const CHECKED = 1;
    const DENIED = 99;

    static $statusList = [
        self::CHECKED => 'チェック済',
        self::DENIED => '拒否済',
    ];

    /**
     * リレーション。サイトはユーザに所属する。
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * バリデーションルールを返すメソッド
     *
     * @return array
     */
    static function getValidationRules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'url' => 'required',
            'status' => 'required',
        ];
    }

    /**
     * 保存する際のメソッド
     *
     * @param Request $request
     */
    public function saveAll(Request $request)
    {
        $this->user_id = Auth::guard('user')->user()->id;
        $this->title = $request->title; //必須項目
        $this->url = $request->url; //必須項目
        $this->description = $request->description; //必須項目
//        $this->has_banner = ($request->description !== null) ? $request->detail : null;
        $this->status = $request->status; //必須項目
        $this->save();
    }
}
