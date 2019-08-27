@component('mail::message')
# Important News {{ $news->title }}

{{ $news->description }}

{{--@component('mail::button', ['url' => 'localhost:8000/news/' . $news->id ])--}}
{{--View News--}}
{{--@endcomponent--}}

ContractZero Administration<br>

@endcomponent
