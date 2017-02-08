@extends('layouts.base')


@section('content')

    <h1>ADMIN</h1>

    {!! Form::open(['url' => 'admin/authors']) !!}
        Name:
        <br />
        {!! Form::text('name', old('name')) !!}
        <br />
        {!! Form::submit('Save') !!}
    {!! Form::close() !!}

@stop



