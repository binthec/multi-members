<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Group;

class Tag extends Model
{
    /**
     * リレーション。タグはグループに所属する。1対多。
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    /**
     * リレーション。タグは小説をたくさん持つ。多対多。
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function novels()
    {
        return $this->belongsToMany(Novel::class);
    }

    /**
     * ローカルスコープ。確認済グループのみ取得する
     *
     * @param $query
     * @return mixed
     */
    public function scopeChecked($query)
    {
        return $query->where('status', Group::CHECKED);
    }
}
