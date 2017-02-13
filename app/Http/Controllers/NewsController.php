<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\News;
use App\Models\UsersNewsComment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('news', array('news' => News::where('id', '>', 0 )->orderBy('created_at', 'desc')->get()));
    }

    public function getNews($news_id){
        return view('single.selected_news', array('news' => News::find($news_id),
            'author' => Author::find(News::find($news_id)->author_id),
            'comments' => UsersNewsComment::where('news_id', $news_id)->get(),
            'users' => User::pluck('name', 'id')));
    }

    public function postComment($news_id, Request $request){
        $comment = new UsersNewsComment();
        $comment->comment = $request->input('comment');
        $comment->news_id = $news_id;
        $comment->user_id = Auth::id();
        $comment->save();

        return view('single.selected_news', array('news' => News::find($news_id),
            'author' => Author::find(News::find($news_id)->author_id),
            'comments' => UsersNewsComment::where('news_id', $news_id)->get(),
            'users' => User::pluck('name', 'id')));
    }


    public function destroy($news_id, $comment_id){
        $comment = UsersNewsComment::find($comment_id);
        $comment->delete();
        return redirect('/news/' . $news_id);
    }
}
