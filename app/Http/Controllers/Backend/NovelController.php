<?php

namespace App\Http\Controllers\Backend;

use App\Picture;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Validator;
use App\Novel;

class NovelController extends Controller
{
    /**
     * １ページに表示する件数
     */
    const PAGINATION = 20;

    /**
     * 一覧画面
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $novels = Novel::paginate(self::PAGINATION);
        return view('backend.novel.index', compact('novels'));
    }

    /**
     * 新規作成画面表示
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $novel = new Novel;
        return view('backend.novel.edit', compact('novel'));
    }

    /**
     * 新規作成実行
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
            return redirect('/novel')->with('flashMsg', '登録が完了しました。');

        } catch (\Exception $e) {

            Log::error($e->getMessage());
            DB::rollback();
            return redirect()->back()->with('flashErrMsg', '登録に失敗しました。');

        }

    }

    /**
     * 編集画面表示
     *
     * @param Novel $novel
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Novel $novel)
    {
        return view('backend.novel.edit', compact('novel'));
    }

    /**
     * 編集実行
     *
     * @param Request $request
     * @param Novel $novel
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Novel $novel)
    {
        $validator = Validator::make($request->all(), Novel::getValidationRules());
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        try {

            $novel->saveAll($request);

            DB::commit();
            return redirect('/novel')->with('flashMsg', '登録が完了しました。');

        } catch (\Exception $e) {

            Log::error($e->getMessage());
            DB::rollback();
            return redirect()->back()->with('flashErrMsg', '登録に失敗しました。');

        }
    }

    /**
     * 削除実行
     *
     * @param Novel $novel
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Novel $novel)
    {
        if (File::exists($novel->uploadDir . $novel->id)) {
            File::deleteDirectory($novel->uploadDir . $novel->id);
        }

        $novel->delete();

        return redirect('/novel')->with('flashMsg', '削除が完了しました。');
    }

    /**
     * 表示確認
     *
     * @param Novel $novel
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function confirm(Novel $novel)
    {
        //単記事以外の記事を取得
        $activities = $novel->getActList();

        return view('frontend.novel.detail', ['activities' => $activities, 'actSingle' => $novel]);
    }
}
