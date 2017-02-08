<?php

namespace App\Http\Controllers\Admin;

use App\Models\Author;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.reviews.list', array('reviews' => Review::all(), 'authors' => Author::pluck('name', 'id')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.reviews.create', array('authors' => Author::pluck('name', 'id')));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reviews = new Review();
        $reviews->title = $request->input('title');
        $reviews->content = $request->input('content');
        $reviews->author_id = $request->input('author_id');
        $reviews->save();
        $author = Author::find($request->input('author_id'));
        $current_posts = $author->posts;
        $author->posts = $current_posts + 1;
        $author->save();
        return redirect('admin/reviews');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.reviews.edit', array('reviews' => Review::find($id), 'authors' => Author::pluck('name', 'id')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $reviews = Review::find($id);
        $reviews->title = $request->input('title');
        $reviews->content = $request->input('content');
        $reviews->author_id = $request->input('author_id');
        $reviews->save();
        return redirect('admin/reviews');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reviews = Review::find($id);
        $author = Author::find($reviews->author_id);
        $current_posts = $author->posts;
        $author->posts = $current_posts - 1;
        $author->save();
        $reviews->delete();
        return redirect('admin/reviews');
    }
}
