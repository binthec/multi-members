<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Novel;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Auth;

class NovelController extends Controller
{
    /**
     * １ページに表示する数
     */
    const PAGINATION = 10;

    /**
     * 小説一覧
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $siteId = Auth::guard('user')->user()->sites->first()->id; //TODO:いずれユーザに複数サイトを登録出来るようにする

        $novels = Novel::where('site_id', $siteId)->paginate(self::PAGINATION);
        return view('frontend.novel.index', compact('user', 'novels'));
    }

    /**
     * 作品投稿ページ表示
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $novel = new Novel;
        return view('frontend.novel.edit', compact('novel'));
    }

    /**
     * 作品投稿実行
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), Novel::getValidationRules(true));
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        try {

            $novel = new Novel;
            $novel->saveAll($request);

            DB::commit();
            return redirect('/mypage')->with('flashMsg', '登録が完了しました。');

        } catch (\Exception $e) {

            Log::error($e->getMessage());
            DB::rollback();
            return redirect()->back()->with('flashErrMsg', '登録に失敗しました。');

        }
    }
}
