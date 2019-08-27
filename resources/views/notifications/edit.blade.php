@section ('content')
    @extends ('layouts.header')

    <form action="{{ route('notifications.update', ['id' => $oneNotification->id] ) }}" method="post">
        {{ method_field('PATCH') }}
        @csrf

        <br> <br>

        <input name="title" type="text" value="{{ $oneNotification->title }}">
        <br> <br>
        <input name="description"  value="{{ $oneNotification->description }}" placeholder="{{ $oneNotification->description }}">
        <br> <br>
        <button type="submit">Edit</button>


    </form>

    <form action="{{ route('notifications.destroy', ['id' => $oneNotification->id] ) }}" method="post">
        {{ method_field('DELETE') }}
        @csrf
        <button type="submit" >Destroy</button>

    </form>

@endsection

@section ('content')--}}
{{--    @extends ('layouts.header')--}}

{{--    <form action="{{ route('notifications.update', ['id' => $oneNotification->id] ) }}" method="post">--}}
{{--        {{ method_field('PATCH') }}--}}
{{--        @csrf--}}

{{--        <br> <br>--}}

{{--        <input name="title" type="text" value="{{ $oneNotification->title }}">--}}
{{--        <br> <br>--}}
{{--        <input name="description"  value="{{ $oneNotification->description }}" placeholder="{{ $oneNotification->description }}">--}}
{{--        <br> <br>--}}
{{--        <button type="submit">Edit</button>--}}


{{--    </form>--}}

{{--    <form action="{{ route('notifications.destroy', ['id' => $oneNotification->id] ) }}" method="post">--}}
{{--        {{ method_field('DELETE') }}--}}
{{--        @csrf--}}
{{--        <button type="submit" >Destroy</button>--}}

{{--    </form>--}}

{{--@endsection
