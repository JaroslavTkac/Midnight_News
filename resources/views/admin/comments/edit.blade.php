@extends('layouts.base')


@section('content')

    <h1>ADMIN</h1>

    {!! Form::open(['url' => 'admin/authors/' . $author->id, 'method' => 'PUT']) !!}
        Name:
        <br />
        {!! Form::text('name', $author->name) !!}
        <br />
        {!! Form::submit('Save') !!}
    {!! Form::close() !!}

@stop



