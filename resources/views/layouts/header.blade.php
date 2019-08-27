<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- CSRF Token -->
    {{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}

    <title>{{ ('CZ HR') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">


    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">


    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
@if(Auth::check())
    <header class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav mr-auto">

                    <li class="nav-item">
                        <a class="nav-link text-white Profile" href="{{route("profile")}}">Profile</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white News" href="{{route("news.index")}}">News</a>
                    </li>

                    @if(\Illuminate\Support\Facades\Auth::user()->role == 'Manager')
                        <li class="nav-item">
                            <a class="nav-link text-white Drive" href="{{route("drives.index")}}">Drive</a>
                        </li>

                    @endif

                    <li class="nav-item">
                        <a class="nav-link text-white " href="{{route("settings")}}">Settings</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white " href="{{route("tasks.index")}}">Calendar</a>
                    </li>

                    @if(\Illuminate\Support\Facades\Auth::user()->role == 'Manager')
                        <li class="nav-item">
                            <a class="nav-link text-white " href="{{route("notifications.index")}}">Messages<span

                                    style="color: orange"><sup>

                                            {{ \App\Notification::where('status',0)->count() }}
                                    </sup></span></a>
                        </li>

                    @endif

                </ul>

                @if(\Illuminate\Support\Facades\Auth::user()->role == 'Manager')
                    <form class="form-inline my-2 my-lg-0" method="get" action="{{route('search')}}">
                        @csrf
                        <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search"
                               aria-label="Search">
                        <button class="btn text-white my-2 my-sm-0" style="background-color: #FF8055" type="submit">
                            Search
                        </button>

                    </form>
                @endif
                <button style="background-color: #FF8055" class="btn text-white my-2 m-2 my-sm-0 chemi-logout-btn">
                    <a class="logout_chemi" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none;">
                        @csrf
                    </form>

                </button>
                @endif
            </div>
        </nav>
    </header>
    @include ('.auth.register')
