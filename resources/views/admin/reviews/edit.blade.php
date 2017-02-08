@extends('layouts.base')


@section('content')

    <h1>ADMIN</h1>

    {!! Form::open(['url' => 'admin/news/' . $reviews->id, 'method' => 'PUT']) !!}
    Title:
    <br />
    {!! Form::text('title', $reviews->title) !!}
    <br />
    Content:
    {!! Form::textarea('content', $reviews->content) !!}
    <br />
    Author:
    {!! Form::select('author_id', $authors, $reviews->author_id) !!}
    <br />
    {!! Form::submit('Save') !!}
    {!! Form::close() !!}
@stop



