<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tag;
use Illuminate\Support\Facades\Cache;

class Group extends Model
{
    /**
     * status
     */
    const CHECKED = 1;
    const DENIED = 99;

    public static $status = [
        self::CHECKED => '承認',
        self::DENIED => '拒否',
    ];

    /**
     * キャッシュの時間（分）
     */
    const EXPIRES_IN = 120;

    /**
     * リレーション。グループはtagを複数持つ。1対多
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    /**
     * ローカルスコープ。確認済グループのみ取得する
     *
     * @param $query
     * @return mixed
     */
    public function scopeChecked($query)
    {
        return $query->where('status', self::CHECKED);
    }

    /**
     * グループをキャッシュから取得して返すメソッド。キャッシュが無い場合のみキャッシュしてから返す。
     *
     * @return mixed
     */
    public static function getGroups()
    {

        //キャッシュされていない場合には、一旦キャッシュする
        return Cache::remember('groups', self::EXPIRES_IN, function () {
            return Group::checked()->get();
        });

    }
}
