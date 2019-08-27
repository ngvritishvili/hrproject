@extends ('layouts.header')
@section ('content')

    <form method="post" action="{{ route('settings') }}" enctype="multipart/form-data">
        {{ method_field('patch') }}
        {{ csrf_field() }}
        {{--<div class="row text-center mt-2  m-0">--}}
        {{--<div class="col-md-12">--}}

        {{--</div>--}}
        {{--</div>--}}
        <div class="container-fluid settings mt-3">
            <h2 class="text-center">Settings</h2>
            <div class="row mt-5">
                <div class="col-md-3">
                    <div class="setting-picture">
                        @if($authUserProfileImages != '')

                            @foreach($authUserProfileImages as $one)
                                <img src="img/profile_imgs/{{ $one }}" alt="">
                            @endforeach
                        @endif

                    </div>
                    <input type="file" class="setting-input" name="picture_name">
                </div>
                <div class="col-md-9 s-try">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control font-weight-bold" placeholder="Name and Surname"
                               name="name"
                               aria-label="Username"
                               aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control font-weight-bold" placeholder="Password"
                               name="password"
                               aria-label="Password"
                               aria-describedby="basic-addon1">

                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control font-weight-bold" placeholder="Address"
                               aria-label="Address"
                               name="address" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control font-weight-bold" placeholder="Phone Number" name="tel"
                               aria-label="Phone Number"
                               aria-describedby="basic-addon1">
                    </div>
                </div>
                {{--<div class="col-md-3">--}}

            </div>
            <div class="row">
                <div class="col-md-9 text-center">
                    <button type="submit" class="btn btn-outline-secondary mt-1 setting-save">Save</button>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 text-center setting-logo">
                    <p>Powered By</p>
                    <img src="/img/cz.png" alt="">
                </div>
                <div class="col-md-9">
                    <div class="-image">
                        <img src="/img/iceberg (11).png" alt="">
                    </div>
                </div>
            </div>
        </div>
        </div>
    </form>
@endsection
