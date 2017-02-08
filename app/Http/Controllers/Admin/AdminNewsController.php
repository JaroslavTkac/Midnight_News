<?php

namespace App\Http\Controllers\Admin;

use App\Models\Author;
use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.news.list', array('news' => News::all(), 'authors' => Author::pluck('name', 'id')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create', array('authors' => Author::pluck('name', 'id')));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $news = new News();
        $news->title = $request->input('title');
        $news->content = $request->input('content');
        $news->author_id = $request->input('author_id');
        $news->save();
        $author = Author::find($request->input('author_id'));
        $current_posts = $author->posts;
        $author->posts = $current_posts + 1;
        $author->save();
        return redirect('admin/news');
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
        return view('admin.news.edit', array('news' => News::find($id), 'authors' => Author::pluck('name', 'id')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) //TODO:When Changing author change posts counter
    {
        $news = News::find($id);
        $news->title = $request->input('title');
        $news->content = $request->input('content');
        $news->author_id = $request->input('author_id');
        $news->save();
        return redirect('admin/news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        $author = Author::find($news->author_id);
        $current_posts = $author->posts;
        $author->posts = $current_posts - 1;
        $author->save();
        $news->delete();
        return redirect('admin/news');
    }
}
