@extends('layouts.base')


@section('content')


    @if ($trailers->count() > 0)
        @foreach ($trailers as $trailer)
            <a href="{{ 'latest-trailers/'. $trailer->id }}"><img src="{{ url($trailer->preview_url) }}"
                                                                  alt="{{ $trailer->title }}" height="250" width="150"></a>
            <h3>{{ $trailer->title }}</h3>
        @endforeach
    @else
        <p>No news found</p>
    @endif

@stop