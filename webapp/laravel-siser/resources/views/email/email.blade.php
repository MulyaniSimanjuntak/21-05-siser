@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => '/register_password'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
