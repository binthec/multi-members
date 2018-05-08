<?php

namespace App\Policies;

use App\Admin;
use Illuminate\Auth\Access\Gate;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        //
//    }

    /**
     * beore
     *
     * @param $admin
     * @return bool|null
     */
    public function before($admin)
    {
        //オーナー以上であれば、ユーザ全操作が可能。それ以外の場合はnullを返し、ポリシーに従う
        return $admin->isHigherOwner() ? true : null;
    }

    /**
     * アップデートの際に、ユーザIDとログインしているユーザのIDが同じかを判断する
     *
     * @param Admin $admin
     * @param Admin $willChangeAdmin
     * @return bool
     */
    public function update(Admin $admin, Admin $willChangeAdmin)
    {
        return $admin->id === $willChangeAdmin->id;
    }
}
