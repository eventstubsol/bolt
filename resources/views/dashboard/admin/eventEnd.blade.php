@extends("layouts.admin")

@section("title")
 Event Expiry
@endsection
@section("page_title")
    Event Expiry
@endsection
@section('styles')

@include("includes.styles.datatables")
@endsection
@section("content")
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">Events Close To Expiry</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table datatable   dt-responsive nowrap w-100" id="datatable-buttons">
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
                            @if(count($ending_event) > 0)
                                @foreach ($ending_event as $key =>$event)
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
                                        <td>{{ Carbon\Carbon::parse($event->end_date)->format('d-m-Y') }}</td>
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