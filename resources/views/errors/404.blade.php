@extends('layouts.auth')

@section('title')
Not Found
@endsection

@section('form')

<div class="jumbotron">
    <center>
        <h1 class="display-4"><span style="color: red"><center>404</center> </span></h1>
        <p class="lead">The page You Are Looking For Doesnot Seem To Be Existing</p>
        <hr class="my-4">
        <p>Please Try Some Valid Address</p>
        {{-- <p class="lead">
        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </p> --}}
    </center>
  </div>

@endsection