@extends('layouts.base')


@section('content')



    <h3>You logged in as {{ $user->name }}</h3>


    @if(Auth::check() && (Auth::id() === $user->id))
        <h4>Email: {{ $user->email }}</h4>

        <h4>Change email</h4>
        {!! Form::open(['url' => 'user/' . $user->id]) !!}
        Email:
        <br />
        {!! Form::text('email', old('email')) !!}
        <br />
        {!! Form::submit('Save') !!}
        {!! Form::close() !!}


        <h4>Change password</h4>
        {!! Form::open(['url' => 'user/' . $user->id]) !!}
        Old Password:
        <br />
        {!! Form::text('old_password', old('old_password')) !!}
        <br />
        New Password:
        <br />
        {!! Form::text('new_password', old('new_password')) !!}
        <br />
        Confirm Password:
        <br />
        {!! Form::text('confirm_password', old('confirm_password')) !!}
        <br />
        {!! Form::submit('Save') !!}
        {!! Form::close() !!}

    @endif

    <h2>User Activity</h2>

@stop