<?php

namespace App\Http\Controllers;


use App\Models\News;
use App\Models\Review;
use Illuminate\Http\Request;


class SearchController extends Controller
{
    public function index(){

        $query = News::whereDate('created_at', '=', date('Y-m-d'));
        $news = $query->get();

        $query = Review::whereDate('created_at', '=', date('Y-m-d'));
        $reviews = $query->get();

        return view('search_results', compact('news'), compact('reviews'));
    }

    public function postSearch(Request $request){

        $query = News::where('title', 'like', '%' . $request->input('search') . '%');
        $news = $query->get();

        $query = Review::where('title', 'like', '%' . $request->input('search') . '%');
        $reviews = $query->get();

        return view('search_results', compact('news'), compact('reviews'));
    }
}
