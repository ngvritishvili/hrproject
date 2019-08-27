@section ('content')
    @extends ('layouts.header')

    <div class="container calendar-create-event text-center">
        <form action="{{ route('news.update', ['id' => $oneNews->id] ) }}" method="post">
            @csrf
            {{ method_field('PATCH') }}

            <div class="event-header">
                <div class="clouds">
                    <h2 class="text-center mt-4 font-weight-bold">Edit News</h2>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12">
                    <h3>News Title</h3>
                    <input name="title" type="text" value="{{ $oneNews->title }}">
                </div>
                <div class="col-md-12 mt-5">
                    <h3>News Description</h3>
                    <textarea class="event-description" name="description" type="text"
                              placeholder="">{{ $oneNews->description }}</textarea>
                </div>

                <div class="col-md-12 mt-5">

                    <div class="-image">
                        <img src="/img/iceberg.png" alt="">
                    </div>
                    <hr style="border-color: #f8fafc">


                    <button name="editButton" class="calendar-button" type="submit">Edit</button>

                    <button class="calendar-button" name="delete" value="{{ $oneNews->id }}" type="submit">Delete</button>


                </div>


            </div>
            <div class="row">
                <div class="col-md-3 text-center setting-logo">
                    <p>Powered By</p>
                    <img src="/img/cz.png" alt="">
                </div>
            </div>
        </form>
    </div>

    {{--<form action="{{ route('news.update', ['id' => $oneNews->id] ) }}" method="post">--}}
    {{--{{ method_field('PATCH') }}--}}
    {{--@csrf--}}

    {{--<br> <br>--}}

    {{--<input name="title" type="text" value="{{ $oneNews->title }}">--}}

    {{--<br> <br>--}}

    {{--<input name="description"  value="{{ $oneNews->description }}" placeholder="{{ $oneNews->description }}">--}}

    {{--<br> <br>--}}
    {{--<button type="submit">Edit</button>--}}


    {{--</form>--}}
    {{--<form action="{{ route('news.destroy', ['id' => $oneNews->id] ) }}" method="post">--}}
    {{--{{ method_field('DELETE') }}--}}
    {{--@csrf--}}
    {{--<button type="submit" >Destroy</button>--}}

    {{--</form>--}}

@endsection
