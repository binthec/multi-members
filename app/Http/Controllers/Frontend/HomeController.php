<?php

namespace App\Http\Controllers\Frontend;

use App\Group;
use App\Novel;
use App\Tag;
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
     * タグ別表示
     *
     * @param Tag $tag
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function novels(Tag $tag)
    {
        $novels = Novel::checked()->paginate(Novel::NUM);

        return view('frontend.home.novels', compact('novels'));
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
