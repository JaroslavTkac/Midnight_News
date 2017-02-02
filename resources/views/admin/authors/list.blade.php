@extends('layouts.base')


@section('content')

    <h1>ADMIN</h1>

    <table class="data-table">
        <tr>
            <th>Author</th>
            <th>Posts</th>
            <th>Comments</th>
            <th>Working since</th>
            <th>Operations</th>
        </tr>
        @if ($authors->count() > 0)
            @foreach ($authors as $author)
                <tr>
                    <td>{{ $author->name }}</td>
                    <td>{{ $author->posts }}</td>
                    <td>{{ $author->comments }}</td>
                    <td>{{ $author->created_at->format('d M Y') }}</td>
                    <td>
                        <a href="{{ url('admin/authors/' . $author->id . '/edit') }}">Edit</a>
                        {!! Form::open(['url' => 'admin/authors/' . $author->id, 'method' => 'DELETE', 'style' => 'display:inline' ]) !!}
                        {!! Form::submit('Delete') !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5" class="align-center">There no any authors</td>
            </tr>
        @endif
    </table>
    <br />
    <a href="{{ url('admin/authors/create') }}">New author</a>
@stop


