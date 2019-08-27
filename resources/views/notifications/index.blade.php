@extends ('layouts.header')
@section ('content')

    @csrf

    <div class="container-fluid notification-message">
        <div class="col-md-12 mt-2">


            @foreach($usersWithNotification as $person)
                @foreach($person->notifications as $oneNotification)
                    <div class="row">
                        <div class="col-md-12 mt-5">
                            <p> Author: {{ $person->name}} -- Created: {{ $oneNotification->created_at }}</p>
                        </div>
                    </div>
                    <div class="row messages">
                        <div class="col-md-12">

                            @if(\Illuminate\Support\Facades\Auth::user()->role == 'Manager')
                                {{ Form::open(['method' => 'DELETE', 'route' => ['notifications.destroy', $oneNotification->id]]) }}

                                @csrf
                                {{ method_field('DELETE') }}

                                <button type="submit" class='close mt-3'>X</button>

                                {{ Form::close() }}
                                <h3 class="mt-3"> {{ $oneNotification->title }} </h3>
                            @else

                            @endif
                            <hr>
                            <p>{{ $oneNotification->description }}</p>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
@endsection ('content')
