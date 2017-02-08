@extends('layouts.base')


@section('content')

    <h1>ADMIN</h1>

    <table class="data-table">
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Author</th>
            <th>Posted at</th>
            <th>Operations</th>
        </tr>
        @if ($news->count() > 0)
            @foreach ($news as $_news)
                <tr>
                    <td>{{ $_news->title }}</td>
                    <td>{{ substr($_news->content, 0, 20) }}...</td>
                    <td>{{ $authors->get($_news->author_id) }}</td>
                    <td>{{ $_news->created_at->format('d M Y') }}</td>
                    <td>
                        <a href="{{ url('admin/news/' . $_news->id . '/edit') }}">Edit</a>
                        {!! Form::open(['url' => 'admin/news/' . $_news->id, 'method' => 'DELETE', 'style' => 'display:inline' ]) !!}
                        {!! Form::submit('Delete') !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5" class="align-center">There no any news</td>
            </tr>
        @endif
    </table>
    <br />
    <a href="{{ url('admin/news/create') }}">Add news</a>
@stop


