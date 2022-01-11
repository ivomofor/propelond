
@component('mail::message')
# Verify Your email address


{{-- Hello {{ $user->name}},  <br> <br> --}}

welcome to Propelond.  <br>
Please verify your email address

@component('mail::button', ['url' => ''])
Verify Email Address
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
