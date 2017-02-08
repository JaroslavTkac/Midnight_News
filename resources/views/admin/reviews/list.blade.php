@extends('layouts.base')


@section('content')

    <h1>ADMIN</h1>
    <h3>Reviews</h3>

    <table class="data-table">
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Author</th>
            <th>Posted at</th>
            <th>Operations</th>
        </tr>
        @if ($reviews->count() > 0)
            @foreach ($reviews as $review)
                <tr>
                    <td>{{ $review->title }}</td>
                    <td>{{ substr($review->content, 0, 20) }}...</td>
                    <td>{{ $authors->get($review->author_id) }}</td>
                    <td>{{ $review->created_at->format('d M Y') }}</td>
                    <td>
                        <a href="{{ url('admin/news/' . $review->id . '/edit') }}">Edit</a>
                        {!! Form::open(['url' => 'admin/news/' . $review->id, 'method' => 'DELETE', 'style' => 'display:inline' ]) !!}
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
    <a href="{{ url('admin/reviews/create') }}">Add news</a>
@stop


