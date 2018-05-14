<?php

namespace App\Http\Controllers\Frontend;

use App\Group;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::getGroups();
        return view('frontend.home.index', compact('groups'));
    }

    /**
     * 単なる一覧画面
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function novels()
    {
        return view('frontend.home.novels');
    }

    /**
     * 検索結果画面
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchNovels(Request $request)
    {
        return view('frontend.home.novels');
    }

    /**
     * このサイトについて
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function about()
    {
        return view('frontend.home.about');
    }


}
