@component('mail::message')
# Account created

Your account is almost ready, Please click on the button to activate your account.!

@component('mail::button', ['url' => route('acctivate-account' , $user->activation_token)])
Acivate account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent