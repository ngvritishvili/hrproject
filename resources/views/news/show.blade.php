@section ('content')
    @extends ('layouts.header')

    <div class="container news">
        <div class="row">
            <div class="col-md-12 mt-2">
                <div class="news-header-image text-center mt-4">
                    <img src="/img/cz.png" alt="">
                    <img class="clouds" src="/img/clouds.png" alt="">
                </div>
                <h2 class="mt-4">Important News</h2>
                <p class="font-weight-bold"> {{ $thisNews->created_at }}</p>
                <p class="font-weight-bold mt-5">{{ $thisNews->title }}</p>
                <p class="mb-3"> {{ $thisNews->description }} </p>
                <hr class="mt-5">
            </div>
        </div>
    </div>
@endsection
