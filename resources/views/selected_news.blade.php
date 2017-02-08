@extends('layouts.base')


@section('content')


    <h1>{{ $news->title }}</h1>
    <h4>Author: <a href="{{ '/authors/' . $author->id }}">{{ $author->name }}</a></h4>
    <p>{{ $news->content }}</p>

    <h3>Comments</h3>
    @if (count($comments) === 0)
        <p>This post is so boring no one commented, but you could be first!</p>
    @elseif (count($comments) >= 1)
        @foreach($comments as $comment)
            <h3><a href="{{ '/user_comments/'. $comment->user_id }}">{{ $users->get($comment->user_id) }}</a></h3>
            <p>{{ $comment->comment }}</p>
            @if (Auth::check() && Auth::user()->isAdmin())
                {!! Form::open(['action' => ['NewsController@destroy', $news->id, $comment->id], 'method' => 'DELETE', 'style' => 'display:inline' ]) !!}
                {!! Form::submit('Delete') !!}
                {!! Form::close() !!}
            @endif
        @endforeach
    @endif

    @if (Auth::check())
        {!! Form::open(['url' => '/news/' . $news->id]) !!}
        {!! Form::textarea('comment', old('comment')) !!}
        <br />
        {!! Form::submit('Add') !!}
        {!! Form::close() !!}
    @endif

@stop


