@component('mail::message')
# Introduction
<div>
    Name: {{ $name }}
</div>
<div>
    Email: {{ $email }}
</div>
<div>
    Text: {{ $text }}
</div>

@component('mail::button', ['url' => env('APP_URL')])
Back Site
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
