@extends('layouts.base')


@section('content')

    <h1>ADMIN</h1>

    <table class="data-table">
        <tr>
            <th>User</th>
            <th>Comment</th>
            <th>Posted in: </th>
            <th>Name of article</th>
            <th>Posted</th>
            <th>Operations</th>
        </tr>
        @if ($comments->count() > 0)
            @foreach ($comments as $comment)
                <tr>
                    <td>{{ $users->get($comment->user_id) }}</td>
                    <td>{{ $comment->comment }}</td>
                    <td>@if ($comment->is_review)
                            Review
                        @endif
                        @if ($comment->is_trailer)
                            Trailer
                        @endif
                        @if ($comment->is_news)
                            News
                        @endif
                    </td>
                    <td>@if ($comment->is_review)
                            {{ $reviews->get($comment->content_id) }}
                        @endif
                        @if ($comment->is_trailer)
                            Trailer
                        @endif
                        @if ($comment->is_news)
                            {{ $news->get($comment->content_id) }}
                        @endif</td>
                    <td>{{ $comment->created_at->format('d M Y') }}</td>
                    <td>
                        <a href="{{ url('admin/comments/' . $comment->id . '/edit') }}">Edit</a>
                        {!! Form::open(['url' => 'admin/comments/' . $comment->id, 'method' => 'DELETE', 'style' => 'display:inline' ]) !!}
                        {!! Form::submit('Delete') !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6" class="align-center">There no any comments</td>
            </tr>
        @endif
    </table>
    <br />
    <a href="{{ url('admin/comments/create') }}">Write a comment</a>
@stop


