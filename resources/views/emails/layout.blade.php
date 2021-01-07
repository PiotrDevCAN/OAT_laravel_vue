@component('mail::message')

@hasSection('message')
@yield('message')
@endif

@hasSection('button')
@component('mail::button', ['url' => $requestEditUrl])
@yield('button')
@endcomponent
@endif

@hasSection('panel')
@component('mail::panel')
@yield('panel')
@endcomponent
@endif

@isset($previewUrl)
@component('mail::button', ['url' => $previewUrl])
View this email online
@endcomponent
@endisset

Thanks,<br>
{{ config('app.name') }}
@endcomponent