@extends("layouts.admin")

@section('title')
Recycle Bin
@endsection

@section("styles")
@include("includes.styles.datatables")
@endsection

@section("page_title")
Recycle Bin
@endsection

@section("breadcrumbs")
<li class="breadcrumb-item active"><a href="{{ route('restore.event') }}">Restore Events</a></li>
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="datatable-buttons" class="table datatable   dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th width="80%">Event</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $event)
                            <tr>
                                <td>{{ $event->name }}</td>
                                <td><a href="{{ route('restore.event.data',$event->id) }}" class="btn btn-primary">Restore</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection