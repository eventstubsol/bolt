@component('mail::message')
<h5>Subject:</b>{{ $subject }}</h5><b>

@php
    echo $message
@endphp

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}
<hr>
Thanks,<br>
{{ $event }}
@endcomponent
