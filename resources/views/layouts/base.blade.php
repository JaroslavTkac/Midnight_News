<!DOCTYPE html>
<html>
<head>
    <title>{{ $meta_title or 'Midnight News' }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div id="wrapper">
    <div id="header">
        <a id="logo" href="{{ url('/') }}">Midnight News</a>
    </div>
    @if(Auth::check() && Auth::user()->isAdmin())
        <div>
            <ul>
                <li><a href="{{ url('admin/news') }}">Edit News</a></li>
                <li><a href="{{ url('admin/reviews') }}">Edit Reviews</a></li>
                <li><a href="{{ url('admin/latest-trailers') }}">Edit Trailers</a></li>
                <li><a href="{{ url('admin/authors') }}">Edit Authors</a></li>
            </ul>
        </div>
    @endif
    <div id="main_menu">
        @if(!Auth::check())
        <ul>
            <li><a href="{{ url('login') }}">Login</a></li>
            <li><a href="{{ url('register') }}">Register</a></li>
        </ul>
        @else
            <p>Welcome, {{ Auth::user()->name }}</p>
            <a href="{{ url('logout') }}">Logout</a>
            <br/>
        @endif
            {!! Form::open(array('url' => 'search_results')) !!}
            {!! Form::text('search', \Illuminate\Support\Facades\Input::get('search')) !!}
            {!! Form::submit('Search') !!}
            {!! Form::close() !!}


        <ul>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('reviews') }}">Reviews</a></li>
            <li><a href="{{ url('news') }}">News</a></li>
            <li><a href="{{ url('latest-trailers') }}">Latest Trailers</a></li>
            <li><a href="{{ url('authors') }}">Authors</a></li>
        </ul>
        <div class="clear"></div>
    </div>
    <div id="content">
        @yield('content')
    </div>
    <div id="footer">
        <br/>
        © {{ date('Y') }} Midnight News.com. All rights reserved.
    </div>
</div>
</body>
</html>