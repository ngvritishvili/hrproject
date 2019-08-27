@section ('content')
    @extends ('layouts.header')

    @foreach($result  as $one)
        <li>
            <div class="container search text-center">

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
                                <form method="get" action="{{route('search')}}">
                                    @csrf
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

                                                <button  class="mt-4" name="badgeOfMonth"
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
            {{--<div class="containercz">--}}
            {{--<a class="buttoncz" href="#{{$one->id}}">{{ $one->name }}</a>--}}
            {{--<div class="popup" id="{{$one->id}}">--}}

            {{--<div class="popup-inner">--}}
            {{--<div class="popup__photo">--}}

            {{--@foreach($one->images as $oneimage)--}}
            {{--@if($one->images != null)--}}
            {{--<img--}}
            {{--src="img/profile_imgs/{{$oneimage->picture_name}}"--}}
            {{--alt="">--}}
            {{--@endif--}}
            {{--@endforeach--}}
            {{--</div>--}}

            {{--<div class="popup__text">--}}
            {{--<h1>{{ $one->name }}</h1>--}}
            {{--<p>E-mail: {{  $one->email }}</p>--}}
            {{--<p>address: {{  $one->address }}</p>--}}
            {{--<p>Telephone: {{  $one->phone }}</p>--}}
            {{--{!!  Form::open(['method' => 'post', 'route' => ['editDays'] ]) !!}--}}

            {{--<div>--}}
            {{--<p>Sick Days:--}}
            {{--<input--}}
            {{--placeholder="{{ $one->sick_days }}"--}}
            {{--type="number"--}}
            {{--name="sickDays"--}}
            {{--step="1" min="0" max="100" required>--}}
            {{--<button name="id" value="{{$one->id}}" type="submit">--}}
            {{--Edit--}}
            {{--</button>--}}

            {{--</p>--}}

            {{--</div>--}}

            {{--{!!  Form::close()  !!}--}}

            {{--{!!  Form::open(['method' => 'post', 'route' => ['editDays'] ]) !!}--}}

            {{--<div>--}}
            {{--<p>Vocation Days Left:--}}
            {{--<input--}}
            {{--placeholder="{{ $one->vocation_days }}"--}}
            {{--type="number"--}}
            {{--name="vocationDays"--}}
            {{--step="1" min="0" max="55" required>--}}
            {{--<button name="id" value="{{$one->id}}" type="submit">--}}
            {{--Edit--}}
            {{--</button>--}}

            {{--</p>--}}

            {{--</div>--}}

            {{--{!!  Form::close()  !!}--}}


            {{--<p>Hours Missed: {{  $one->hour_missed }}--}}


            {{--</div>--}}

            {{--<div class="popup__drive">--}}
            {{--<div class="container-fluid mt-5">--}}
            {{--<div class="row">--}}
            {{--<div class="col-md-12 col-md-12-mine">--}}
            {{--<div class="accordion" id="accordionExample">--}}
            {{--<div class="card">--}}
            {{--<div class="card-header font-weight-bold"--}}
            {{--id="headingOne">--}}
            {{--<h5 class="mb-0">--}}
            {{--<button--}}
            {{--class="btn btn-link font-weight-bold"--}}
            {{--type="button"--}}
            {{--data-toggle="collapse"--}}
            {{--data-target="#collapseOne"--}}
            {{--aria-expanded="true"--}}
            {{--aria-controls="collapseOne">--}}
            {{--1. ID cards or Passeort--}}
            {{--</button>--}}
            {{--</h5>--}}
            {{--</div>--}}

            {{--<div id="collapseOne"--}}
            {{--class="collapse show font-weight-bold"--}}
            {{--aria-labelledby="headingOne"--}}
            {{--data-parent="#accordionExample">--}}
            {{--<div class="card-body text-center">--}}

            {{--@foreach($one->images as $onepassportimage)--}}

            {{--@if($onepassportimage->id_passport != null)--}}

            {{--<a href="{{ asset('img/ids/' . trim($onepassportimage->id_passport, '"') ) }}"><img--}}
            {{--src="img/ids/{{ trim($onepassportimage->id_passport, '"') }}"--}}
            {{--alt=""--}}
            {{--class="profile-drive-images"--}}
            {{--style=""></a>--}}


            {{--@endif--}}
            {{--@endforeach--}}


            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="card">--}}
            {{--<div class="card-header font-weight-bold"--}}
            {{--id="headingTwo">--}}
            {{--<h5 class="mb-0">--}}
            {{--<button--}}
            {{--class="btn btn-link collapsed font-weight-bold"--}}
            {{--type="button"--}}
            {{--data-toggle="collapse"--}}
            {{--data-target="#collapseTwo"--}}
            {{--aria-expanded="false"--}}
            {{--aria-controls="collapseTwo">--}}
            {{--2. Contracts--}}
            {{--</button>--}}
            {{--</h5>--}}
            {{--</div>--}}
            {{--<div id="collapseTwo"--}}
            {{--class="collapse font-weight-bold"--}}
            {{--aria-labelledby="headingTwo"--}}
            {{--data-parent="#accordionExample">--}}
            {{--<div class="card-body text-center">--}}


            {{--@foreach($one->images as $oneDoc)--}}
            {{--@if($oneDoc->contract != null)--}}
            {{--@if( str_contains(trim($oneDoc->contract, '"'), '.pdf'))--}}
            {{--<a target="_blank"--}}
            {{--href="{{ asset('img/contracts/' . trim($oneDoc->contract, '"')) }}">Click--}}
            {{--<object width="80"--}}
            {{--height="90"--}}
            {{--type="application/pdf"--}}
            {{--data="img/contracts/{{ trim($oneDoc->contract, '"') }}">--}}
            {{--<p>Something--}}
            {{--gone wrong--}}
            {{--try again or--}}
            {{--call me</p>--}}
            {{--</object>--}}
            {{--</a>--}}
            {{--@else--}}
            {{--<img--}}
            {{--src="img/contracts/{{ trim($oneDoc->contract, '"') }}"--}}
            {{--class="profile-drive-images"--}}
            {{--alt="" style="">--}}
            {{--@endif--}}

            {{--@endif--}}
            {{--@endforeach--}}

            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="card">--}}
            {{--<div class="card-header font-weight-bold"--}}
            {{--id="headingThree">--}}
            {{--<h5 class="mb-0">--}}
            {{--<button--}}
            {{--class="btn btn-link collapsed font-weight-bold"--}}
            {{--type="button"--}}
            {{--data-toggle="collapse"--}}
            {{--data-target="#collapseThree"--}}
            {{--aria-expanded="false"--}}
            {{--aria-controls="collapseThree">--}}
            {{--3. Insurance Documents--}}
            {{--</button>--}}
            {{--</h5>--}}
            {{--</div>--}}
            {{--<div id="collapseThree"--}}
            {{--class="collapse font-weight-bold"--}}
            {{--aria-labelledby="headingThree"--}}
            {{--data-parent="#accordionExample">--}}
            {{--<div class="card-body text-center">--}}

            {{--@foreach($one->images as $oneDoc)--}}
            {{--@if($oneDoc->insurance_doc != null)--}}
            {{--@if( str_contains(trim($oneDoc->insurance_doc, '"'), '.pdf'))--}}
            {{--<a target="_blank"--}}
            {{--href="{{ asset('img/insurance/' . trim($oneDoc->insurance_doc, '"')) }}">Click--}}
            {{--<object width="80"--}}
            {{--height="90"--}}
            {{--type="application/pdf"--}}
            {{--data="img/insurance/{{ trim($oneDoc->insurance_doc, '"') }}">--}}
            {{--<p>Something--}}
            {{--gone wrong--}}
            {{--try again or--}}
            {{--call me</p>--}}
            {{--</object>--}}
            {{--</a>--}}
            {{--@else--}}
            {{--<img--}}
            {{--src="img/insurance/{{ trim($oneDoc->insurance_doc, '"') }}"--}}
            {{--class="profile-drive-images"--}}
            {{--alt="" style="">--}}
            {{--@endif--}}

            {{--@endif--}}
            {{--@endforeach--}}

            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}

            {{--</div>--}}

            {{--</div>--}}
            {{--<a class="popup__close" href="#">X</a>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}

        </li>
    @endforeach


@endsection
