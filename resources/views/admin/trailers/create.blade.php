@extends('layouts.base')


@section('content')

    <h1>ADMIN</h1>

    {!! Form::open(['url' => 'admin/latest-trailers']) !!}
    Title:
    <br />
    {!! Form::text('title', old('title')) !!}
    <br />
    Video URL:
    <br />
    {!! Form::text('video_url', old('video_url')) !!}
    <br />
    Preview URL:
    <br />
    {!! Form::text('preview_url', old('preview_url')) !!}
    <br />
    {!! Form::submit('Save') !!}
    {!! Form::close() !!}

@stop



