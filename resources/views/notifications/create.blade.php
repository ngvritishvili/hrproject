@extends ('layouts.header')
@section ('content')

    <form action="{{ route('notifications.store') }}" method="post">
        {{ csrf_field() }}

        <div class="container employees-notification text-center">
            <div class="event-header">
                <div class="clouds">
                    <h2 class="text-center mt-4 font-weight-bold">Create Notification</h2>
                </div>
            </div>
            <div class="row mt-5">
                <div class="container  mt-5 news-title">
                    <div class="row">

                        <div class="col-md-12">
                            <h3>Notification Title</h3>
                            <input type="text" name="title" placeholder="">
                        </div>
                        <div class="col-md-12 mt-5">
                            <h3>Notifications Description</h3>
                            <textarea class="event-description" name="description" type="text"
                                      placeholder=""></textarea>
                        </div>

                    </div>
                    <hr style="border-color: #f8fafc">
                    <button class="create" type="submit">Create
                    </button>
                    <div class="row">
                        <div class="col-md-3 text-center notification-logo">
                            <p>Powered By</p>
                            <img src="/img/cz.png" alt="">
                        </div>
                        <div class="col-md-9 mt-5">
                            <div class="-image">
                                <img src="/img/iceberg.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </form>

@endsection
