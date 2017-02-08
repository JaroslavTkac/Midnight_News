<?php

namespace App\Http\Controllers;

use App\Models\Identity;
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
        $idenity = new Identity();

        $idenity->os = $agent->platform();
        $idenity->browser = $agent->browser();

        if($agent->isDesktop())
            $idenity->type = 'Destop';
        if($agent->isMobile())
            $idenity->type = 'Mobile';
        if($agent->isTablet())
            $idenity->type = 'Tablet';

        $idenity->save();
        return view('home');
    }
}
