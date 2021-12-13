@extends('layouts.auth')

@section('title')
Event Login
@endsection

@section('title-text')
Hello there!
@endsection

@section('subtitle-text')
{{ $login["text"] }}
@endsection

@section('scripts_before')
<script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}"></script>
@endsection

@section('form')
@php
$email = "";
if(Auth::user()){
    $email = Auth::user()->email;
    $event_id = Auth::user()->event_id;
}
@endphp

@if(Session::get('attendee_reg') == 1)
    <script type="text/javascript">
        alert("Attendee Registered Successfully");
    </script>
    @php
        Session::put('attendee_reg',0);
    @endphp
@endif
<form id="form" action="{{ route('attendee_login') }}" method="post">
    @csrf
    <div class="">
        <label for="{{ $login["field"] }}">{{ print_r($login["label"]) }}</label>
        <input value="{{ old($login["field"]) ?? $email }}" class="field form-control @error($login["field"]) is-invalid @enderror"
            type="{{ $login["field"] == 'email' ? 'email' : 'text' }}" id="" name="{{ $login["field"] }}"
            placeholder="{{ $login["label"] }}" />
        @error($login["field"])
        <span class="invalid-feedback" role="alert">{{ print_r($message)  }}</span>
        @enderror
        @if ($notFound)
        <span class="invalid-feedback" role="alert">Please check your login details</span>
        @endif
        @if ($captchaError)
        <span class="invalid-feedback" role="alert">Unable to verify captcha</span>
        @endif
    </div>

    <div class="">
        <input type="hidden" id="token" name="token">
    </div>

    <div class="input-footer">
        {{-- <div style="display: flex;flex-direction:column"> --}}
        {{-- <p class="text" >EXHIBITOR LOGIN<a href="{{ route('login') }}"> - CLICK HERE</a></p><br><br>
        <p class="text" >EVENTEE LOGIN<a href="{{ route('Eventee.login') }}"> - CLICK HERE</a></p> --}}
        {{-- </div> --}}
        
        <button class="theme-btn btn primary-filled mt-3" onclick="onSubmit">Login</button>
    </div>
    
    <div class="clearfix"></div>
    <div class="clearfix"></div>
</form>
<p class="text mt-3">By logging in and using the platform, you hereby accept our  <a href="{{ route('privacyPolicy') }}" >Privacy Policy</a> {{--  <a data-toggle="modal" data-target="#privacyPolicy" >Privacy Policy</a>--}}. For more details <a href="{{ route("faq") }}">read the FAQs</a></p>
<div id="privacyPolicy" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <embed src="{{ assetUrl(getFieldId('privacypolicy',$event_id,"uploads/xmbGmR1olTbfKNwonBymeJv0mJV9emC2EK9bjCdF.png"))  }}" frameborder="0" width="100%" height="400px">

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts_after')
<script>
    (function onSubmit() {
        grecaptcha.ready(function () {
            grecaptcha.execute('{{ env("RECAPTCHA_SITE_KEY") }}', {
                action: 'homepage'
            }).then(function (token) {
                document.querySelector("#token").value = token
            });
        });
    })()
</script>
@endsection