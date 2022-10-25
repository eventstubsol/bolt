@extends('layouts.auth')

@section('title')
    Eventee Login
@endsection

@section('title-text')
    Hello there!
@endsection


@section('styles')
<style>
    form{
            overflow-x: auto;
            white-space: nowrap;
            padding: 3%;
            max-height: 25rem;
        }
</style>

@endsection


@section('subtitle-text')
    Sign in your account
@endsection

@section('form')

<!-- <script>
    $('#flash-overlay-modal').modal();
    /* setTimeout(function(){ 
        $('#flash-overlay-modal').modal('toggle'); 
    }, 2000); */
</script> -->

<form action="{{ route('Eventee.login.confirm') }}" method="post">
    @csrf
    @include('flash::message')
    <div class="input-group">
        <label for="emailaddress">Email address
            <span style="color:red">*</span>
        </label>
        <br>
        <div class="input-group input-group-merge mb-3">
            <input value="{{ old('email') }}" class="field form-control @error('email') is-invalid @enderror" type="email" id="emailaddress" name="email" placeholder="Enter your email" />
            @error('email')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div> 
    </div>

    <div class="input-group">
        <label for="password">Password
            <span style="color:red">*</span>
        </label>
        <div class="input-group input-group-merge">
            <input type="password" name="password" id="password" class="field form-control @error('password') is-invalid @enderror" placeholder="Enter your password" />
            <div class="input-group-append" data-password="false">
                <div class="input-group-text">
                    <span class="password-eye"></span>
                </div>
            </div>
            @error('password')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <br>

    <button class="log-btn theme-btn btn primary-filled" type="submit">Login</button>


    
    <div class="clearfix"></div>
</form>
@endsection

@section("form_footer")
    <p class="text mt-4">Register As An Event Admin<a href="{{ route('Eventee.register') }}"> Click here</a></p>
@endsection

@section('extra')
    <a href="{{ route('password.request') }}">Forgot Password? Recover Now</a>
@endsection