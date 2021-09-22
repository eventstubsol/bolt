@extends("layouts.admin")
@section('styles')
    @include("includes.styles.datatables")
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('page_title')
    Event Edit  
@endsection

@section('title')
    Event Edit
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item active">Events &nbsp; > &nbsp;Edit</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('event.Update',$id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Event Name</label>
                        <input type="text" name="name" value="{{ $event->name }}" class="form-control" required>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="name">Start Date</label>
                            <input type="date" name="start_date" value="{{ $event->start_date }}" class="form-control" required>
                        </div>
                        <div class="col">
                            <label for="name">End Date</label>
                            <input type="date" name="end_date" value="{{ $event->end_date }}" class="form-control" required>
                        </div>
                    </div><br>
                
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection