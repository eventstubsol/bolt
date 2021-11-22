@extends("layouts.admin")

@section("title")
Least Active Users
@endsection
@section("page_title")
Least Active Users
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
                                <th>User Name</th>
                                <th>Country</th>
                                <th>User Email</th>
                                <th>Contact</th>
                                <th>Last logged in</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($leastActive) > 0)
                                @foreach ($leastActive as $key=>$active)
                                   <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $active->name }}  {{ $active->last_name }}</td>
                                        <td>{{ $active->country }}</td>
                                        <td>{{ $active->email }}</td>
                                        <td>@if ($active->phone !=null)
                                            {{ $active->phone }}
                                            @else
                                                Not Available
                                        @endif</td>
                                        <td>{{ Carbon\Carbon::parse($active->updated_at)->format('d-m-Y') }}</td>
                                        
                                   </tr>

                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6"><center>No Data Available</center></td>
                                </tr>
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