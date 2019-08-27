<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}

<!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">


{{--    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>--}}
{{--    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>--}}


<!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">


    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
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

<form class="text-center" action="{{ route('tasks.index') }}" method="get">
    {{ csrf_field() }}


    <h3 class="text-center mt-5">Calendar</h3>
    @if(\Illuminate\Support\Facades\Auth::user()->role == 'Manager')
        <button class="calendar-button" formaction="{{ route('tasks.create') }}">Create Task</button>
    @endif

    <div id='calendar'></div>

{{--    <img class="calendariceberg" src="img/calendariceberg.jpg">--}}
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>

    <script>
        $(document).ready(function () {
            // page is now ready, initialize the calendar...
            $('#calendar').fullCalendar({
                // put your options and callbacks here
                events: [
                        @foreach($tasks as $task)
                    {
                        title: '{{ $task->name }}',
                        start: '{{ $task->task_date }}',
                        @if(\Illuminate\Support\Facades\Auth::user()->role == 'Manager')
                        url: '{{ route('tasks.edit', $task->id) }}',
                        @else
                        url: '{{ route('tasks.show', $task->id) }}'
                        @endif
                    },
                    @endforeach
                ]
            })
        });
    </script>


</form>


