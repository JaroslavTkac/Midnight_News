<?php

namespace App\Http\Controllers;

use App\Models\UsersReviewComment;
use App\Models\Author;
use App\Models\Review;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class ReviewsController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reviews', array('reviews' => Review::where('id', '>', 0 )->orderBy('created_at', 'desc')->get()));
    }

    public function getReview($review_id){
        return view('single.selected_review', array('review' => Review::find($review_id),
            'author' => Author::find(Review::find($review_id)->author_id),
            'comments' => UsersReviewComment::where('review_id', $review_id)->get(),
            'users' => User::pluck('name', 'id')));
    }

    public function postComment($review_id, Request $request){
        $comment = new UsersReviewComment();
        $comment->comment = $request->input('comment');
        $comment->review_id = $review_id;
        $comment->user_id = Auth::id();
        $comment->save();

        return view('single.selected_review', array('review' => Review::find($review_id),
            'author' => Author::find(Review::find($review_id)->author_id),
            'comments' => UsersReviewComment::where('review_id', $review_id)->get(),
            'users' => User::pluck('name', 'id')));
    }


    public function destroy($review_id, $comment_id)
    {
        $comment = UsersReviewComment::find($comment_id);
        $comment->delete();
        return redirect('/review/' . $review_id);
    }
}
