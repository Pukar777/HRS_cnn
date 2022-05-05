@component('mail::message')
# Welcome to HRS Cooperative

We have successfully reviewed your application. We have created your account as per request. You can login using following link to get started.

@component('mail::button', ['url' => '{{ $link }}'])
Click Here to Sign In into your account.
@endcomponent

If above button is not working <a href="{{ $link }}">Click Here</a><br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
