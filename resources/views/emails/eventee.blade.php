
<h5>Subject:</b>{{ $subject }}</h5><b>
<h5>Email:</b>{{ $user->email }}</h5><b>
<h5>Body:</b>{!!  $message !!}</h5><b>
{{-- 
@php
    echo $user->name;
    echo $message;
@endphp --}}

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}
<hr>
Thanks,<br>
{{ $event }}
