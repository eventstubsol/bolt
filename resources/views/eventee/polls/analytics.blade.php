@extends('layouts.admin')

@section('styles')
    @include('includes.styles.datatables')
@endsection

@section('page_title')
    Manage polls
@endsection

@section('title')
    Manage polls
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route('polls.manage', $id) }}">Poll Analytics</a></li>
@endsection



@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>{{ $poll->name }}</h2>
                </div>
                <div class="card-body">

                    @foreach ($poll->questions as $n => $question)
                        <div class="">
                            <h2>{{ $question->question }}</h2>
                            <div class="row">
                                <div class="col-12">
                                    @foreach ($question->options as $option)
                                        <div class="row mb-3 options option-{{ $option->id }}"
                                            data-id="{{ $option->id }}">
                                            <button
                                                disabled
                                                class="btn btn-primary option disabled optionButton-{{ $option->id }} option-{{ $n }}"
                                                data-id="{{ $option->id }}"
                                                data-question="{{ $question->id }}">{{ $option->answer }} - {{$option->voteCount}} Votes </button>
                                            <div class="progress mb-2 mt-2 w-100 ">
                                                <div class="progress-bar option_progress progress-{{ $option->id }} progress-bar-striped"
                                                    role="progressbar" style="width: {{$option->percent??0}}%" aria-valuenow="{{$option->percent??0}}"
                                                    aria-valuemin="0" aria-valuemax="100">{{$option->percent}}%</div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div>
                    @endforeach

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->
@endsection
