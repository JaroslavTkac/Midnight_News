@extends('layouts.base')


@section('content')

    <h1>ADMIN</h1>

    {!! Form::open(['url' => 'admin/news']) !!}
    Title:
    <br />
    {!! Form::text('title', old('title')) !!}
    <br />
    Content:
    {!! Form::textarea('content', old('content')) !!}
    <br />
    Author:
    {!! Form::select('author_id', $authors, old('author_id')) !!}
    <br />
    {!! Form::submit('Save') !!}
    {!! Form::close() !!}

@stop



