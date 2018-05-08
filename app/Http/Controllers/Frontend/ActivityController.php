<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Novel;
use Intervention\Image\Exception\NotFoundException;

class ActivityController extends Controller
{

    /**
     * 一覧画面
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $activities = Novel::open()->paginate(Novel::ACT_NUM_LIST);
        return view('frontend.activity.index', compact('activities'));
    }

    /**
     * 詳細画面
     *
     * @param Novel $activity
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail(Novel $activity)
    {
        //単記事表示用。公開ステータスのものしか表示しない
        $actSingle = Novel::open()->find($activity->id);

        //単記事以外の記事を取得
        $activities = $activity->getActList();

        //記事がない場合は例外を投げる
        if(!$actSingle){
            throw new NotFoundException('指定されたURLは無効です。URLを確認してください。');
        }

        return view('frontend.activity.detail', compact('actSingle', 'activities'));
    }
}
