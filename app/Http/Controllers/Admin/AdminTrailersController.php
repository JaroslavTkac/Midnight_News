<?php

namespace App\Http\Controllers\Admin;

use App\Models\Trailer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminTrailersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.trailers.list', array('trailers' => Trailer::all()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.trailers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trailers = new Trailer();
        $trailers->title = $request->input('title');
        $trailers->video_url = $request->input('video_url');
        $trailers->preview_url = $request->input('preview_url');
        $trailers->save();
        return redirect('admin/latest-trailers');
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
        return view('admin.trailers.edit', array('trailer' => Trailer::find($id)));
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
        $trailers = Trailer::find($id);
        $trailers->title = $request->input('title');
        $trailers->video_url = $request->input('video_url');
        $trailers->preview_url = $request->input('preview_url');
        $trailers->save();
        return redirect('admin/latest-trailers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Trailer::find($id)->delete();
        return redirect('admin/latest-trailers');
    }
}
