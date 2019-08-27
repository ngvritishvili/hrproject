@section ('content')
    @extends ('layouts.header')
    <div class="container-fluid profile mt-3">
        <div class="row mb-5">
            <div class="col-md-7">
                <h1>Profile</h1>
            </div>
            <div class="col-md-4 text-center">
                <h1>Employees</h1>
            </div>
        </div>

        <form method="post" action="{{ route('profile') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-3">

                    <div class="profile-picture">

                        @if($authUserProfileImages != '')
                            @foreach($authUserProfileImages as $one)

                                @if($one != null)
                                    <img src="img/profile_imgs/{{ $one }}" alt="">
                                @endif

                            @endforeach
                        @endif


                    </div>


                </div>


                <div class="col-md-5 employee-information">
                    <ul style="color: #FF8055">
                        <li>
                            <a href="">Name:</a>
                            <p>{{ Auth::user()->name }}</p>
                        </li>
                        <li class="mt-2">
                            <a href="">Email:</a>
                            <p>{{ Auth::user()->email }}</p>
                        </li>
                        <li class="mt-2">
                            <a href="">Address:</a>
                            <p>{{ Auth::user()->address }}</p>
                        </li>
                        <li class="mt-2">
                            <a href="">Phone Number:</a>
                            <p>{{ Auth::user()->phone }}</p>
                        </li>
                        <button onclick="window.open('{{ $AuthDrive }}')" type="button"
                                class="drive-button mt-2">Drive
                        </button>
                    </ul>
                </div>
                @if(\Illuminate\Support\Facades\Auth::user()->role == 'Manager')
                    <div id="collapseOne" class="collapse show font-weight-bold" aria-labelledby="headingOne"
                         data-parent="#accordionExample">
                        <div class="card-body">
                            <ul style="color: #FF8055">


                                @foreach($userWithImages  as $one)
                                    <li>
                                        <div class="container employees">

                                            <a class="button" data-toggle="modal"
                                               data-target="#{{$one->id}}"
                                               data-whatever="@getbootstrap">{{ $one->name }}
                                            </a>

                                            <div class="modal fade" id="{{$one->id}}" tabindex="-1" role="dialog"
                                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-10">
                                                                    <h3 class="modal-title"
                                                                        id="exampleModalLabel">{{ $one->name }}</h3>

                                                                </div>
                                                            </div>
                                                            <form>
                                                                <div class="form-group pop-info">
                                                                    <a href="">Email Adress:
                                                                        <p>{{  $one->email }}</p>
                                                                    </a>
                                                                    <a href="">Adress: <p>{{  $one->address }}</p>
                                                                    </a>
                                                                    <a href="">Phone Number: <p>{{  $one->phone }}</p>
                                                                    </a>
                                                                </div>
                                                                <div class="form-group pop-days">
                                                                    <div class="row">
                                                                        <div class="col-md-3 mt-2">
                                                                            <a href="">Sick Days:</a>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <input name="sickDays"
                                                                                   placeholder="{{ $one->sick_days }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-5 mt-2">
                                                                            <a href="">Vocation Day Left</a>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <input
                                                                                placeholder="{{ $one->vocation_days }}"
                                                                                name="vocationDays">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-7">

                                                                            <button class="mt-4" name="badgeOfMonth"
                                                                                    value="{{$one->id}}"
                                                                                    type="submit"
                                                                                    formaction="{{ route('editDays') }}"
                                                                            >Employee Of The Month
                                                                            </button>

                                                                            @foreach($one->drive_links as $link)

                                                                                <button
                                                                             onclick="window.open('{{ $link->drive_link }}')"
                                                                                    class="mt-4" type="button">
                                                                                    Drive Document
                                                                                </button>
                                                                            @endforeach
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                            <img src="/img/iceberg.png" alt="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-4">
                                                                        <div class="col-md-12 text-center">
                                                                            <button name="id" value="{{$one->id}}"
                                                                                    type="submit" class="save-changes">
                                                                                Save Changes
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </li>

                                @endforeach

                            </ul>


                        </div>
                    </div>
                @endif
                @if(\Illuminate\Support\Facades\Auth::user()->role == 'Employee')
                    <div class="row">
                        <div id="collapseOne" class="collapse show font-weight-bold" aria-labelledby="headingOne"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                <ul style="color: #FF8055">
                                    @foreach($userWithImages  as $one)
                                        <li>
                                            <div class="container employees">

                                                <a
                                                    class="button" data-toggle="modal"
                                                    data-target="#{{$one->id}}"
                                                    data-whatever="@getbootstrap">{{ $one->name }}
                                                </a>

                                                <div class="modal fade" id="{{$one->id}}" tabindex="-1" role="dialog"
                                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-7">
                                                                        <h3 class="modal-title" id="exampleModalLabel">
                                                                            {{$one->name}}</h3>

                                                                    </div>
                                                                </div>
                                                                <form>
                                                                    <div class="form-group pop-info">
                                                                        <a href="">Email Adress: <p>
                                                                                {{ $one->email }}</p></a>
                                                                        <a href="">Adress: <p> {{ $one->address }}</p>
                                                                        </a>
                                                                        <a href="">Phone Number: <p>{{ $one->phone }}</p></a>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-10 logo-for-employees">
                                                                            <img src="/img/iceberg.png" alt="">
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>

                            </div>

                        </div>

                    </div>
                @endif

            </div>
        </form>
        <div class="row days-info mt-5">
            <ul style="color: #FF8055">
                <li>
                    <p> Sick Days: {{ Auth::user()->sick_days }}</p>
                </li>
                <li>
                    <p> Vocation Day left: {{ Auth::user()->vocation_days }}</p>
                </li>

                <li>
                    <p>Being Late: {{ Auth::user()->hour_missed }} hours</p>
                </li>
            </ul>

        </div>
        @if( \Illuminate\Support\Facades\Auth::user()->role == 'Employee')
            <div class="col-md-12 text-center employee-notifications mt-2">


                {{Form::open(['method' => 'get', 'route' => ['notifications.create'] ])}}
                @csrf
                <h2 class="mt-4 send-notification">Send Notification to Manager</h2>
                <button class="create-notification" formaction="{{ route('notifications.create') }}">Create
                    Notification
                </button>

                {{  Form::close()   }}

            </div>
        @endif
        <div class="row mt-5 profile-logo">
            <div class="col-md-3 text-center">
                <p>Powered By</p>
                <img src="/img/cz.png" alt="">
            </div>
        </div>
        <div id='app'></div>
    </div>


@endsection
