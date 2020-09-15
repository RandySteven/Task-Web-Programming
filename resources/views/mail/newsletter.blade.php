@component('mail::message')
# Thank You

Thanks for subscribe our Media Post. <br>
We will give you a notification about new post.</br>
@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
