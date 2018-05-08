<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//	    $topimages = Topimage::open()->get();
//	    $activities = Activity::open()->take(4)->get();
//	    $events = Event::getAllEvents();
//		return view('frontend.home', compact('topimages', 'activities', 'events'));
        return view('frontend.home.index');
    }

    public function about()
    {
        return view('frontend.home.about');
    }

}
