@extends ('layouts.header')
@section ('content')

    <div class="container news">
        <div class="row">

            <div class="col-md-12 mt-2">
                <div class="news-header-image text-center mt-4">
                    <img class="clouds" src="/img/clouds.png" alt="">
                </div>
                <div class="row mt-5">
                    <div class="col-md-5 news-title">

                        @if(\Illuminate\Support\Facades\Auth::user()->role == 'Manager')

                            <a href="{{ route('tasks.edit', $thisTask->id) }}"><h2

                                    class="font-weight-bold mt-3">{{ $thisTask->name }} </h2></a>
                        @else
                            <h2 class="font-weight-bold mt-3">{{ $thisTask->name }} </h2>
                        @endif
                        <p style="color: #FF8055;" class="ml-2 font-weight-bold mt-4">By {{ $author->name }} </p>
                        <p style="color: #6C757D;" class="ml-3 mt-4">{{ $thisTask->task_date }}</p>
                        {{--<hr class="mt-5">--}}

                    </div>
                </div>
                <div class="row news-text">
                    <div class="col-md-12">
                        <p>{{ $thisTask->description }}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

{{--    <div class="row mt-5">--}}
{{--        <div class="col-md-5 news-title">--}}
{{--            @if(\Illuminate\Support\Facades\Auth::user()->role == 'Manager')--}}
{{--                <a href="{{ route('news.edit', $one->id) }}"><h2--}}
{{--                        class="font-weight-bold mt-3">{{ $one->title }} </h2></a>--}}
{{--            @else--}}
{{--                <h2 class="font-weight-bold mt-3">{{ $one->title }} </h2>--}}
{{--            @endif--}}
{{--            <p style="color: #FF8055;" class="ml-2 font-weight-bold mt-4">By {{ $person->name }} </p>--}}
{{--            <p style="color: #6C757D;" class="ml-3 mt-4">{{ $one->created_at }}</p>--}}
{{--            --}}{{--<hr class="mt-5">--}}

{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="row news-text">--}}
{{--        <div class="col-md-12">--}}
{{--            <p>{{ $one->description }}</p>--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection
