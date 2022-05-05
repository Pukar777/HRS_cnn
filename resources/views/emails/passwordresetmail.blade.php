@component('mail::message')
# Welcome to HRS Cooperative

We recently received a request to reset the password to your account: {{ $email }}

We have created your account as per request. You can login using following link to get started.

@component('mail::button', ['url' => '{{ $link }}'])
Click Here to change your account password.
@endcomponent

If above button is not working <a href="{{ $link }}">Click Here</a><br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
