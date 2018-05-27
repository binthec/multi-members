<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Validator;
use App\User;
use App\Novel;

class UserController extends Controller
{


    /**
     * ユーザ名変更画面
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        $user = Auth::guard('user')->user();
        return view('frontend.user.edit', compact('user'));
    }

    /**
     * ユーザ名変更実行
     *
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request)
    {

        $user = Auth::guard('user')->user();

        //自分以外のユーザの情報を変更出来ない
        $this->authorize('update', $user);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        try {

            $user->name = $request->name;
            $user->save();

            DB::commit();

            return redirect()->back()->with('flashMsg', '変更が完了しました。');

        } catch (\Exception $e) {

            DB::rollback();
            Log::error($e->getMessage());

            return redirect()->back()->with('flashErrMsg', '変更に失敗しました。');

        }

    }

    /**
     * パスワード変更画面を表示
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editPassword(User $user)
    {
        return view('frontend.user.edit-password', compact('user'));
    }

    /**
     * パスワード変更実行
     *
     * @param Request $request
     * @param User $user
     * @return $this|\Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function updatePassword(Request $request, User $user)
    {

        //オペレータは、自分以外のユーザの情報を変更出来ない
        $this->authorize('update', $user);

        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        try {

            $user->password = bcrypt($request->password);
            $user->save();

            DB::commit();

            if ($this->fromMyPage(url()->previous())) {
                //マイページから来た時はマイページに返す
                return redirect()->back()->with('flashMsg', '変更が完了しました。');
            }

            //ユーザ管理画面から来た時はユーザ変更画面に返す
            return redirect('/user')->with('flashMsg', '変更が完了しました。');


        } catch (\Exception $e) {

            DB::rollback();
            Log::error($e->getMessage());
            return redirect()->back()->with('flashErrMsg', '変更に失敗しました。');

        }

    }

}
