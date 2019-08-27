@section ('content')
    @extends ('layouts.header')
    <form action="{{ route('tasks.update', ['id' => $task->id] ) }}" method="post">
        <div class="container calendar-create-event text-center">
            <div class="event-header">
                <div class="clouds">
                    <h2 class="text-center mt-4 font-weight-bold">Edit Event</h2>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12">
                    <h3>Event Name</h3>
                    <input name="name" type="text" value="{{ $task->name }}">
                </div>
                <div class="col-md-12 mt-5">
                    <h3>Event Text</h3>
                    <textarea class="event-description" name="description" type="text"
                              placeholder="">{{ $task->description }}</textarea>
                </div>
                <div class="col-md-12 mt-5">
                    <h3>Event Start Date</h3>
                    <div class="-image">
                        <img src="/img/iceberg.png" alt="">
                    </div>
                    <input type="date" name="task_date" value="{{ $task->task_date }}">
                    <hr style="border-color: #f8fafc">


                        {{ method_field('PATCH') }}
                        @csrf


                    <button name="editButton"  class="calendar-button" type="submit">Edit</button>

                    <button class="calendar-button" name="delete" value="godelete" type="submit">Delete</button>



                </div>


            </div>
            <div class="row">
                <div class="col-md-3 text-center setting-logo">
                    <p>Powered By</p>
                    <img src="/img/cz.png" alt="">
                </div>
            </div>
        </div>
    </form>
    {{--<div class="container news-create-post text-center">--}}
    {{--<div class="event-header">--}}
    {{--<div class="clouds">--}}
    {{--<h2 class="text-center mt-4 font-weight-bold">Edit</h2>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="row mt-5">--}}
    {{--<div class="container  mt-5 news-title">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-12">--}}
    {{--<h3>Event Name</h3>--}}
    {{--<input type="text" name="title" placeholder="" required>--}}
    {{--</div>--}}
    {{--<div class="col-md-12 mt-5">--}}
    {{--<h3>Event Text</h3>--}}
    {{--<input type="text" name="title" placeholder="" required>--}}
    {{--</div>--}}
    {{--<div class="col-md-12 mt-5">--}}
    {{--<div class="-image">--}}
    {{--<img src="/img/iceberg.png" alt="">--}}
    {{--</div>--}}
    {{--<input type="date" name="task_date" placeholder="" required>--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-3 text-center setting-logo">--}}
    {{--<p>Powered By</p>--}}
    {{--<img src="/img/cz.png" alt="">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}


    {{--<form action="{{ route('tasks.update', ['id' => $task->id] ) }}" method="post">--}}
    {{--{{ method_field('PATCH') }}--}}
    {{--@csrf--}}
    {{--<br>--}}

    {{--<input name="name" type="text" value="{{ $task->name }}">--}}

    {{--<br>--}}

    {{--<input name="description" type="text" value="{{ $task->description }}">--}}

    {{--<br>--}}

    {{--<input name="task_date" type="date" value="{{ $task->task_date }}">--}}

    {{--<br>--}}
    {{--<button type="submit">Edit</button>--}}


    {{--</form>--}}
    {{--<form action="{{ route('tasks.destroy', ['id' => $task->id] ) }}" method="post">--}}
{{--    {{ method_field('DELETE') }}--}}
{{--    @csrf--}}
    {{--<button type="submit">Destroy</button>--}}

    {{--</form>--}}

@endsection
