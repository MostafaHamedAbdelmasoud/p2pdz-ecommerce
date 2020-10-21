@component('mail::message')
# Introduction

Hello Every One,
{{$msg}}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
