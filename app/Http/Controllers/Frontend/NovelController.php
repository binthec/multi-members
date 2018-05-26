<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Novel;
use Illuminate\Http\Request;

class NovelController extends Controller
{

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

        dd($request);

        return redirect('mypage');
    }
}
