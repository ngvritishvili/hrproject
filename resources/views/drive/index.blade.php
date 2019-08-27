@extends ('layouts.header')
@section ('content')
    <form method="post" action="{{ route('drives.store') }}">
        @csrf
    <div class="container news-create-post text-center">
        <div class="event-header">
            <div class="clouds">
                <h2 class="text-center mt-4 font-weight-bold">Drive</h2>
            </div>
        </div>
        <div class="row mt-5">
            <div class="container  mt-5 news-title">
                <div class="row">
                    <div class="col-md-12">
                        <h3>User</h3>
                        <input type="email" name="user" placeholder="E-mail" required>
                    </div>
                    <div class="col-md-12 mt-5">
                        <h3>Drive Link</h3>
                        <input type="text" name="driveLink" placeholder="Link" required>
                    </div>
                    <div class="col-md-12 mt-5">
                        <div class="-image">
                            <img src="/img/iceberg.png" alt="">
                        </div>
                        <button class="calendar-button" type="submit">Add</button>
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
