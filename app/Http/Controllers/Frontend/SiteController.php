<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Site;
use Illuminate\Http\Request;
use Auth;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SiteController extends Controller
{
    /**
     * 編集画面表示
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        $site = Site::where('user_id', Auth::guard('user')->user()->id)->first(); //TODO:いずれユーザに複数サイトを登録出来るようにする

        if (!$site) {
            $site = new Site;
        }
        return view('frontend.site.edit', compact('site'));
    }

    /**
     * 登録
     *
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {

        $validator = Validator::make($request->all(), Site::getValidationRules(true));
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        try {
            $site = Site::where('user_id', Auth::guard('user')->user()->id)->first();
            if(!$site){
                $site = new Site;
            }
            $site->saveAll($request);

            DB::commit();
            return redirect()->back()->with('flashMsg', '登録が完了しました。');

        } catch (\Exception $e) {

            Log::error($e->getMessage());
            DB::rollback();
            return redirect()->back()->with('flashErrMsg', '登録に失敗しました。');

        }

    }
}
