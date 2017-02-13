@extends('layouts.base')


@section('content')

    @if ($reviews->count() > 0)
        @foreach ($reviews as $review)
            <h3><a href="{{ 'review/'. $review->id }}">{{ $review->title }}</a></h3>
        @endforeach
    @else
        <p>No news found</p>
    @endif


    @if ($news->count() > 0)
        @foreach ($news as $_news)
            <h3><a href="{{ 'news/'. $_news->id }}">{{ $_news->title }}</a></h3>
        @endforeach
    @else
        <p>No news found</p>
    @endif



@stop