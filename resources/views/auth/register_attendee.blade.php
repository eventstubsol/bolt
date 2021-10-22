@extends('layouts.auth')

@section("styles_after")
    <style>
        /* body.auth .login-container .form .register label{
            display: block;
        } */
        form{
            overflow: scroll;
            max-height: 20rem;
        }
    </style>
@endsection

@section('form')
    <form method="POST" class="register mt-2" action="{{ route('attendee_register.confirm',$subdomain) }}" enctype="multipart/form-data">
        @csrf
        @foreach ($fieldsFinal as $field)
                    <div class="form-group">
                        {{-- <p>{{ $field->label }}</p> --}}
                        <input class="form-control" type="{{ $field->type }}" name="{{ $field->fieldName }}" placeholder="{{ $field->label }}">
                    </div>
                    <br>
        @endforeach
        @for($i = 0;$i<count($eveFields);$i++)
        <input type="hidden" name="userfields[]" value="{{ $eveFields[$i] }}">
        @endfor
        <br>
        <div class="input-group form-group">
            <div class="col-md-12 mb-2">
                <button type="submit" class="theme-btn btn primary-filled">{{ __('Register') }}</button>
            </div>
        </div>
    </form>
@endsection
