@extends ('layouts.header')
@section ('content')


    <form action="{{ route('tasks.store') }}" method="post">
        {{ csrf_field() }}


        <div class="container calendar-create-event text-center">
            <div class="event-header">
                <div class="clouds">
                    <h2 class="text-center mt-4 font-weight-bold">Create An Event</h2>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12">
                    <h3>Event Name</h3>
                    <input name="name" type="text" placeholder="Event name" required>
                </div>
                <div class="col-md-12 mt-5">
                    <h3>Event Description</h3>
                    <textarea name="description" class="event-description" type="text" placeholder="Event Description"
                              required></textarea>
                </div>
                <div class="col-md-12 mt-5">
                    <h3>Start Date</h3>
                    <div class="-image">
                        <img src="/img/iceberg.png" alt="">
                    </div>
                    <input type="date" name="task_date" placeholder="" required>
                    <hr style="border-color: #f8fafc">
                    <button class="calendar-button" type="submit">Create</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 text-center setting-logo">
                    <p>Powered By</p>
                    <img src="/img/cz.png" alt="">
                </div>
            </div>
        </div>
        {{--<div class="container  mt-5 news-title">--}}
        {{--<div class="row">--}}
        {{--<div class="col-md-12">--}}
        {{--<h2>Event name: </h2>--}}
        {{--<div class="input-group mb-3">--}}
        {{--<input type="text" class="form-control font-weight-bold" placeholder=""--}}
        {{--name="name"--}}
        {{--aria-label="Username"--}}
        {{--aria-describedby="basic-addon1" required>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="row">--}}
        {{--<div class="col-md-12">--}}
        {{--<h2>Event description:</h2>--}}
        {{--<textarea rows="7" cols="45" name="description" class="form-control-message"--}}
        {{--placeholder="" required></textarea>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<br/><br/>--}}
        {{--Start time: <input type="date" name="task_date" class="form-control font-weight-bold col-md-3" required/>--}}
        {{--<br/><br/>--}}
        {{--<button type="submit" class="btn btn-outline-secondary mt-1">Create Event</button>--}}
        {{--</div>--}}


        {{--    Task name:--}}
        {{--    <br />--}}
        {{--    <input type="text" name="name" />--}}
        {{--    <br />--}}
        <input type="hidden" name="user_id" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">
        {{--    <br /><br />--}}
        {{--    Task description:--}}
        {{--    <br />--}}
        {{--    <textarea name="description"></textarea>--}}
        {{--    <br /><br />--}}
        {{--    Start time:--}}
        {{--    <br />--}}



        {{--    <br /><br />--}}
        {{--    <input type="submit" value="Save" />--}}


    </form>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
    <script>
        $('.date').datepicker({
            autoclose: true,
            dateFormat: "yy-mm-dd"
        });
    </script>


@endsection
