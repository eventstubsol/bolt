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
@section('styles')
<style>
    .alert{
        display:flex;
        justify-content: center;
    }

</style>
@endsection

@section('scripts_before')
<script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}"></script>
@endsection

@section('form')
    <div class="d-flex align-items-center flex-column">
        <h3>Thank you registering for {{ $event->name }}. A registration confirmation has been sent to your regsitered email address. Please check your spam/junk email folder in case the email is not visible in your primary inbox. We look forward to seeing you at the event.</h3>
        @if(Carbon\Carbon::now() < Carbon\Carbon::parse($event->start_date))
            <h5>Event Starts At : {{ Carbon\Carbon::parse($event->start)->format('H:i').  ' On '  .Carbon\Carbon::parse($event->start)->format('d-m-Y')}}</h5>
        @endif
        <a href="{{ route('attendeeLogin',$subdomain) }}" style="background-color: {{ $event->primary_color }}; color:white;" class="btn btn-primary mt-2">Login Here</a>
    </div>
@endsection