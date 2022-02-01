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
    <h2>Thank you</h2>
    <a href="{{ route('attendeeLogin',$subdomain) }}" class="btn btn-primary">Return To Login</a>
@endsection