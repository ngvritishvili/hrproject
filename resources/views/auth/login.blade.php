@extends ('layouts.header')
@section ('content')
    <form method="post" action="{{ route('login') }}">
        @csrf

        <div class="container login mt-5">
            <div class="row">
                <div class="col-12 mt-5 p-0">
                    <h2>SING IN</h2>
                    <div class="background-login-image">
                        <div class="input-groups">
                            <input class="{{ $errors->has('email') ? ' is-invalid' : '' }} login-inputs mt-3"
                                   name="email"
                                   id="email"
                                   type="email"
                                   placeholder="Email Adress"
                                   value="{{ old('email') }}"
                                   aria-label="Email Address"
                                   aria-describedby="basic-addon1">
                        </div>
                        <div class="input-groups mb-3">
                            <input class=" {{ $errors->has('password') ? ' is-invalid' : '' }} login-inputs mt-3"
                                   id="password"
                                   type="password"
                                   name="password"
                                   placeholder="Password"
                                   aria-label="Password"
                                   aria-describedby="basic-addon1">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                    </span>
                            @endif
                            @if (Route::has('login'))
                                <div class="top-right links">
                                    @auth
                                        <script type="text/javascript">
                                            window.location.href = "/profile";
                                        </script>
                                    @else
                                    @endauth
                                </div>
                            @endif
                            <button class="btn btn-outline-secondary mt-5 font-weight-bold"
                                    href="{{ route('login') }}">Login
                            </button>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5  m-0">
            <div class="col-md-3 text-center">
                <p class="login-paragraph font-weight-bold">Powered By</p>
                <img src="/img/cz.png" alt="">
            </div>
        </div>
    </form>

@endsection
