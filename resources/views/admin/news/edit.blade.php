@extends('layouts.base')


@section('content')

    <h1>ADMIN</h1>

    {!! Form::open(['url' => 'admin/news/' . $news->id, 'method' => 'PUT']) !!}
    Title:
    <br />
    {!! Form::text('title', $news->title) !!}
    <br />
    Content:
    {!! Form::textarea('content', $news->content) !!}
    <br />
    Author:
    {!! Form::select('author_id', $authors, $news->author_id) !!}
    <br />
    {!! Form::submit('Save') !!}
    {!! Form::close() !!}
@stop



