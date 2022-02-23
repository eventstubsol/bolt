@extends('layouts.auth')
@section('title') Verify Account @endsection
@section("styles_after")
    <style>
        /* body.auth .login-container .form .register label{
            display: block;
        } */
        form{
            overflow-x: auto;
            white-space: nowrap;
            padding: 3%;
            max-height: 25rem;
        }
        @media screen and (min-width: 1000px) and (min-height: 1400px) and (max-width:1366px) and (max-height:768px){
            /* STYLES HERE */
            form{
                overflow-x: auto;
                white-space: nowrap;
                padding: 3%;
                max-height: 25%;
            }
        }
    </style>
@endsection

@section('form')
    @php
        if($user->type =='attendee'){
            $event = App\Event::findOrFail($user->event_id);
        }
    @endphp
    <form method="POST" class="register mt-6" action="@if($user->type =='attendee'){{ route('Eventee.verify.attendee',['user_id'=>$user_id,'subdomain'=>$event->slug]) }}@else{{ route('Eventee.verify',$user_id) }}@endif">
        @csrf
        <div class="form-group">
            <label for="">OTP</label>
            <input type="text" class="field form-control" name="otp">
        </div>
        <button type="submit" class="btn btn-success">Verify</button>
    </form>


@endsection
