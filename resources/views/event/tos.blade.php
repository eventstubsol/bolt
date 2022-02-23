@extends("layouts.single-outer")
@section("content")

    <div class="wrapper my-5">
        <div class="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Privacy Policy</h1>
                            {!! html_entity_decode($tos) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
