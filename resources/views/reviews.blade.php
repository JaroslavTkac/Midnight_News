@extends('layouts.base')


@section('content')



    @if ($reviews->count() > 0)
        @foreach ($reviews as $review)
            <h3><a href="{{ 'review/'. $review->id }}">{{ $review->title }}</a></h3>
        @endforeach
    @else
        <p>No reviews found</p>
    @endif

@stop