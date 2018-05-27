<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
	/*
	  |--------------------------------------------------------------------------
	  | Login Controller
	  |--------------------------------------------------------------------------
	  |
	  | This controller handles authenticating users for the application and
	  | redirecting them to your home screen. The controller uses a trait
	  | to conveniently provide its functionality to your applications.
	  |
	 */

use AuthenticatesUsers;

	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	protected $redirectTo = '/mypage/site/edit';


    /**
     * ログイン時に使うカラム名を変更
     *
     * @return string
     */
    public function username()
    {
        return 'name';
    }

	/**
	 * ログインフォーム表示のパスを変更
	 *
	 * @return type
	 */
	public function showLoginForm()
	{
		return view('frontend.auth.login');
	}

    /**
     * ユーザのガードを設定
     *
     * @return mixed
     */
    protected function guard()
    {
        return Auth::guard('user');
    }

    /**
     * 認証を処理する
     *
     * @return Response
     */
//    public function authenticate(Request $request)
//    {
//        if (Auth::attempt(['name' => $request->name, 'password' => $request->password], $request->remember)) {
//            // 認証に成功したら、デフォルトでダッシュボードへ
//            return redirect()->intended($this->redirectTo);
//        }
//    }

}
