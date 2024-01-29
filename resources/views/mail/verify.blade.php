@component('mail::message')
# Welcome to our Clothes store

Please click the button below to verify your email
@component('mail::button',['url'=>$activateLink])
    Click to Verify
@endcomponent

Thank you,<br>
Shop
@endcomponent