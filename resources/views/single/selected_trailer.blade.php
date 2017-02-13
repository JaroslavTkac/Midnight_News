@extends('layouts.base')


@section('content')


    <h1>{{ $trailer->title }}</h1>
    <h3>{{ $trailer->video_url }}</h3>
    <img src="{{ url($trailer->preview_url) }}" alt="Call of Duty">

    <h3>Comments</h3>
    @if (count($comments) === 0)
        <p>This post is so boring no one commented, but you could be first!</p>
    @elseif (count($comments) >= 1)
        @foreach($comments as $comment)
            <h3><a href="{{ '/user_comments/'. $comment->user_id }}">{{ $users->get($comment->user_id) }}</a></h3>
            <p>{{ $comment->comment }}</p>
            @if (Auth::check() && Auth::user()->isAdmin())
                {!! Form::open(['action' => ['TrailersController@destroy', $trailer->id, $comment->id], 'method' => 'DELETE', 'style' => 'display:inline' ]) !!}
                {!! Form::submit('Delete') !!}
                {!! Form::close() !!}
            @endif
        @endforeach
    @endif

    @if (Auth::check())
        {!! Form::open(['url' => '/latest-trailers/' . $trailer->id]) !!}
        {!! Form::textarea('comment', old('comment')) !!}
        <br />
        {!! Form::submit('Add') !!}
        {!! Form::close() !!}
    @endif

@stop


