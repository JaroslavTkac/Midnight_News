<?php

namespace App\Http\Controllers;

use App\Models\Identity;
use App\Models\News;
use App\Models\Review;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agent = new Agent();
        $identity = new Identity();

        $identity->os = $agent->platform();
        $identity->browser = $agent->browser();

        if($agent->isDesktop())
            $identity->type = 'Destop';
        if($agent->isMobile())
            $identity->type = 'Mobile';
        if($agent->isTablet())
            $identity->type = 'Tablet';

        $identity->save();
        return view('home', array('reviews' => Review::where('id', '>', 0 )->orderBy('created_at', 'desc')->take(10)->get(),
            'news' => News::where('id', '>', 0 )->orderBy('created_at', 'desc')->take(10)->get()));
    }
}
