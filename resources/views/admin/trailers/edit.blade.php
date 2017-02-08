@extends('layouts.base')


@section('content')

    <h1>ADMIN</h1>

    {!! Form::open(['url' => 'admin/latest-trailers/' . $trailer->id, 'method' => 'PUT']) !!}
    Title:
    <br />
    {!! Form::text('title', $trailer->title) !!}
    <br />
    Video URL:
    <br />
    {!! Form::text('video_url', $trailer->video_url) !!}
    <br />
    Preview URL:
    <br />
    {!! Form::text('preview_url', $trailer->preview_url) !!}
    <br />
    {!! Form::submit('Save') !!}
    {!! Form::close() !!}

@stop



