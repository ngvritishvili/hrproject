@component('mail::message')
# Vocation Days for {{ $name }}  now = {{$vocationDaysGot}}


{{--The body of your message.--}}

{{--@component('mail::button', ['url' => ''])--}}
{{--Button Text--}}
{{--@endcomponent--}}

Thanks,<br>
{{--{{ config('app.name') }}--}}
@endcomponent
