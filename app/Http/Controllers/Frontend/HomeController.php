<?php

namespace App\Http\Controllers\Frontend;

use App\Group;
use App\Novel;
use App\Tag;
use App\Site;
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
        //タグに紐付いた小説を返す
        $novels = $tag->novels()->checked()->paginate(Novel::NUM);

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
     * サイト詳細
     *
     * @param Site $site
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function site(Site $site)
    {
        //サイトに紐付いた作品を返す
        $novels = $site->novels()->checked()->paginate(Novel::NUM);

        return view('frontend.home.site', compact('site', 'novels'));
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
