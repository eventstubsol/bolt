@extends('layouts.auth')

@section('title')
Thank You
@endsection

@section('title-text')
Thank You
@endsection


@section('subtitle-text')
Thank You
@endsection

@section('scripts_before')
<script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}"></script>
@endsection

@section('form')
    <div class="d-flex align-items-center flex-column">
        <h3>Thank You, You Have Successfully Registered</h3>
        <a href="{{ route('attendeeLogin',$subdomain) }}" class="btn btn-primary mt-2">Return To Login</a>
    </div>
@endsection