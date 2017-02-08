<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Models\Review;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UsersComment;
use Illuminate\Support\Facades\Auth;

class AdminCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.comments.list', array('comments' => UsersComment::all(), 'users' => User::pluck('name', 'id', 'email', 'id'),
            'reviews' => Review::pluck('title', 'id'), 'news' => News::pluck('title', 'id')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.comments.create', array('reviews' => Review::pluck('title', 'id'), 'news' => News::pluck('title', 'id')));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment = new UsersComment();
        $comment->comment = $request->input('comment');
        $comment->is_review = $request->input('is_review');
        $comment->is_news = $request->input('is_news');
        $comment->is_trailer = $request->input('is_trailer');
        $comment->content_id = $request->input('content_id');
        //$comment->user_id = $request->input('user_id');
        $comment->user_id = Auth::id();
        $comment->save();
        return redirect('admin/comments');
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
        $reviews = new Review();
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
