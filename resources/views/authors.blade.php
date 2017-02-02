@extends('layouts.base')


@section('content')

    <h2>Authors:</h2>
    @if ($authors->count() > 0)
        @foreach ($authors as $author)
            <h4>{{ $author->name }}</h4>
        @endforeach
    @else
        <h4>There are no authors</h4>
    @endif

@stop