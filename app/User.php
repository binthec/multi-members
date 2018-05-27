<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role', 'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * リレーション。ユーザは小説をたくさん持ってる。１対多。
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function novels()
    {
        return $this->hasMany(Novel::class);
    }

    /**
     * リレーション。ユーザはサイトをたくさん持ってる。
     * ※基本はひとつだけど、拡張性を持たせるために hasMany を設定。
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sites()
    {
        return $this->hasMany(Site::class);
    }

    /**
     * ユーザがサイトを持ってるかの判定をして返すメソッド
     *
     * @return mixed
     */
    public function hasSite()
    {
        return $this->sites->count() > 0;
    }
}
