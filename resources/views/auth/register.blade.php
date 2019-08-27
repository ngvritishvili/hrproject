@extends('layouts.layout')
@section('content')
    <div class="row text-center mt-2  m-0">
        <div class="col-md-12">
            <img src="/img/cz.png" alt="">
        </div>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf
    <div class="container inputs mt-5">
        <div class="row">
            <div class="col-12 mt-5 ml-3">

                <div class="input-group mb-3">

                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} font-weight-bold ml-3" name="name" value="{{ old('name') }}" placeholder="Name and Surname" required autofocus>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif

                </div>
                <div class="input-group mb-3">


                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} font-weight-bold ml-3" name="email" value="{{ old('email') }}" required placeholder="Email Address" aria-label="Email Address"
                           aria-describedby="basic-addon1">

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif

                </div>
                <div class="input-group mb-3">


                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} font-weight-bold ml-3" name="password" required placeholder="Password">

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="input-group mb-3">
                    <input id="password-confirm" type="password" class="form-control font-weight-bold ml-3" name="password_confirmation" required placeholder="Confirm Password">
                </div>

            </div>
        </div>
{{--        <select class="dropdown btn-secondary btn  w-25 font-weight-bold ml-3" required="required" name="role">--}}
{{--            <option selected disabled>Select Role</option>--}}
{{--            <option type="text"  value="Employee">Employee</option>--}}
{{--            <option type="text"  value="Manager">Manager</option>--}}

{{--        </select> <hr>--}}
        <button type="submit" class="btn btn-outline-secondary mt-3 font-weight-bold ml-3">{{ __('Register') }}</button>
    </div>
    </form>
@endsection
