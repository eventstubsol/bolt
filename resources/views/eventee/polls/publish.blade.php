@extends('layouts.admin')

@section('styles')
    @include('includes.styles.datatables')
@endsection

@section('page_title')
    Publish polls
@endsection

@section('title')
    Publish polls
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route('polls.manage', $id) }}">Manage polls</a></li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    {{ $poll->name }}
                </div>
                <div class="card-body">
                    <form action="{{ route('eventee.polls.publish',[
                        'poll' => $poll->id,
                        'id' => $id,
                    ]) }}" method="post" id="userForm">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="type">Type of User
                                <span style="color:red">*</span>
                            </label>
                            <select class="form-control" id="user-type" name="type[]" multiple> 
                                <option value="all">All</option>
                                @foreach (USER_TYPES as $type)
                                    @if ($type == 'exhibiter')
                                        <option value="exhibiter">Exhibitor</option>
                                    @else
                                        <option value="{{ $type }}">{{ ucfirst($type) }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        @if (count($subtypes))
                            <div class="form-group mb-3">
                                <label for="type">Subtype of User (Optional)</label>
                                <select class="form-control" name="subtype[]" multiple>
                                    <option value="">Select Subtype</option>
                                    @foreach ($subtypes as $type)
                                        <option value="{{ $type->name }}">{{ ucfirst($type->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif

                        <button class="btn btn-primary">Publish</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
