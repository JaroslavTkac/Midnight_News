@extends('layouts.base')


@section('content')

    <h1>ADMIN</h1>

    <table class="data-table">
        <tr>
            <th>Title</th>
            <th>Video URL</th>
            <th>Preview URL</th>
        </tr>
        @if ($trailers->count() > 0)
            @foreach ($trailers as $trailer)
                <tr>
                    <td>{{ $trailer->title }}</td>
                    <td>{{ $trailer->video_url }}</td>
                    <td>{{ $trailer->preview_url }}</td>
                    <td>
                        <a href="{{ url('admin/latest-trailers/' . $trailer->id . '/edit') }}">Edit</a>
                        {!! Form::open(['url' => 'admin/latest-trailers/' . $trailer->id, 'method' => 'DELETE', 'style' => 'display:inline' ]) !!}
                        {!! Form::submit('Delete') !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="3" class="align-center">There no any trailers</td>
            </tr>
        @endif
    </table>
    <br />
    <a href="{{ url('admin/latest-trailers/create') }}">New trailer</a>
@stop


