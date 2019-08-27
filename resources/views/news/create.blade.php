@extends ('layouts.header')
@section ('content')

    <form action="{{ route('news.store') }}" method="post">
        {{ csrf_field() }}

        <div class="container news-create-post text-center">
            <div class="event-header">
                <div class="clouds">
                    <h2 class="text-center mt-4 font-weight-bold">Create New Post</h2>
                </div>
            </div>
            <div class="row mt-5">
                <div class="container  mt-5 news-title">
                    <div class="row">

                        <div class="col-md-12">
                            <h3>Title</h3>
                            <input type="text" name="title" placeholder="" required>
                        </div>
                        <div class="col-md-12 mt-5">
                            <h3>Event Description</h3>
                            <textarea class="event-description" name="description" type="text"
                                      placeholder="" required></textarea>
                        </div>
                        <div class="col-md-12 mt-5">
                            <div class="-image">
                                <img src="/img/iceberg.png" alt="">
                            </div>
                            <label class="check-for-mail">Check For Email Broadcast
                                <input type="checkbox"  name="emailBroadcast">
                                <span class="check-mark"></span>
                            </label>
                            <hr style="border-color: #f8fafc">
                            <button type="submit" class="create"  >Create
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 text-center setting-logo">
                            <p>Powered By</p>
                            <img src="/img/cz.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection


{{--<div class="row">--}}
{{--<div class="col-md-12">--}}
{{--<h2>Description</h2>--}}
{{--<textarea rows="5" cols="45" name="description" class="form-control-message" placeholder=""></textarea><br><br>--}}
{{--<input name="emailBroadcast" type="checkbox" class="">--}}
{{--<label class="form-check-label" for="exampleCheck1">Check For Email Broadcast</label>--}}
{{--</div>--}}
{{--</div>--}}
