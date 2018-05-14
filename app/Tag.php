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
