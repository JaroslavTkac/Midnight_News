@extends('layouts.base')


@section('content')

    <h1>Search Rez</h1>

    @if (count($news) === 0)
        <h3>News not found</h3>
    @elseif (count($news) >= 1)
        @foreach($news as $_news)
            <p>{{ $_news->title }} {{ $_news->id  }}</p>
        @endforeach
    @endif

    @if (count($reviews) === 0)
        <h3>Reviews not found</h3>
    @elseif (count($reviews) >= 1)
        @foreach($reviews as $review)
            <p>{{ $review->title }} {{ $review->id  }}</p>
        @endforeach
    @endif


@stop

<?php  //TODO: add sort by uploaded date
?>