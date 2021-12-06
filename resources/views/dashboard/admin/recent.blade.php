@extends("layouts.admin")

@section("title")
Recent Events
@endsection
@section("page_title")
    Recent Events
@endsection
@section('styles')

@include("includes.styles.datatables")
@endsection
@section("content")
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">Recent Added Events</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table datatable table-striped dt-responsive nowrap w-100" id="datatable-buttons">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Event Name</th>
                                <th>Event Admin</th>
                                <th>Admin Email</th>
                                <th>Contact</th>
                                <th>Created On</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($recents) > 0)
                                @foreach ($recents as $key =>$event)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $event->event_name }}</td>
                                        <td>{{ $event->first_name }} {{ $event->last_name }}</td>
                                        <td>{{ $event->email }}</td>
                                        <td>@if ($event->phone !=null)
                                            {{ $event->phone }}
                                            @else
                                                Not Available
                                        @endif</td>
                                        <td>{{ Carbon\Carbon::parse($event->created_at)->format('d-m-Y') }}</td>
                                    </tr>
                                @endforeach
                            @else
                                    <td colspan="6"><center>No Data Available</center></td>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')
@include("includes.scripts.datatables")
@endsection