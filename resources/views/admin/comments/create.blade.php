@extends('layouts.base')


@section('content')

    <h1>ADMIN</h1>

    {!! Form::open(['url' => 'admin/comments']) !!}
        Comment:
        <br />
        {!! Form::textarea('comment', old('comment')) !!}
        <br />
        is_review:
        {!! Form::radio('is_review', true, false) !!}
        <br />
        is_trailer:
        {!! Form::radio('is_trailer', true, false) !!}
        <br />
        is_news:
        {!! Form::radio('is_news', true, false) !!}
        <br />
        {!! Form::select('content_id', $reviews, old('content_id')) !!}
        <br />
        {!! Form::submit('Save') !!}
    {!! Form::close() !!}

@stop



