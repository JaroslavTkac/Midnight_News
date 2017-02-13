<?php

namespace App\Http\Controllers;

use App\Models\Trailer;
use App\Models\UsersTrailerComment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrailersController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('latest-trailers', array('trailers' => Trailer::where('id', '>', 0 )->orderBy('created_at', 'desc')->get()));
    }


    public function getTrailer($trailer_id){
        return view('single.selected_trailer', array('trailer' => Trailer::find($trailer_id),
            'comments' => UsersTrailerComment::where('trailer_id', $trailer_id)->get(),
            'users' => User::pluck('name', 'id')));
    }

    public function postComment($trailer_id, Request $request){
        $comment = new UsersTrailerComment();
        $comment->comment = $request->input('comment');
        $comment->trailer_id = $trailer_id;
        $comment->user_id = Auth::id();
        $comment->save();

        return view('single.selected_trailer', array('trailer' => Trailer::find($trailer_id),
            'comments' => UsersTrailerComment::where('trailer_id', $trailer_id)->get(),
            'users' => User::pluck('name', 'id')));
    }


    public function destroy($trailer_id, $comment_id){
        $comment = UsersTrailerComment::find($comment_id);
        $comment->delete();
        return redirect('/latest-trailers/' . $trailer_id);
    }
}
