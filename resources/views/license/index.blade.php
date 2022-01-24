@extends("layouts.admin")

@section('title')
Manage License
@endsection

@section("styles")
@include("includes.styles.datatables")
@endsection

@section("page_title")
Manage License
@endsection

@section("breadcrumbs")
<li class="breadcrumb-item active">Package</li>
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="datatable-buttons" class="table datatable   dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Event Name</th>
                            <th>Message</th>
                            <th>License Type</th>
                            <th>Event Created On</th>
                            <th>Event End On</th>
                            <th>Number Of Users</th>
                            <th>Status</th>
                            <th>Issued On</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($licenses)> 0 )
                        @foreach ($licenses as $key => $license)
                        
                        <tr>
                            @php
                                $event = App\Event::where('id',$license->event_id)->first();
                                $userCount = App\User::where('event_id',$event->id)->count();
                            @endphp
                            <td>{{ $key+1 }}</td>
                            <td>{{ $event->name }}</td>
                            <td>{{ $license->message }}</td>
                            <td>{{ $license->type }}</td>
                            <td>{{ $event->start_date }}</td>
                            <td>{{ $event->end_date }}</td>
                            <td>{{ $userCount }}</td>
                            @if ($license->status == 0)
                                <td style="color:red">Unsolved</td>
                            @else
                            <td style="color:green">Solved</td>
                            @endif
                            <td>{{ Carbon\Carbon::parse($license->created_at)->format('d-m-Y') }}</td>
                            <td><a href="{{ route("license.edit", [
                                "id" => $license->id
                            ]) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title=""
                            data-original-title="Edit"><i class="fe-edit-2"></i></a>
                            <a href="{{ route('event.Dashboard',['id'=>encrypt( $event->id )]) }}" class="btn btn-warning"><i class="fas fa-tasks"></i></a>
                            </td>
                        </tr>
                       
                        @endforeach
                        @else
                        <tr>
                            <td colspan="10"><center>No Data Avaukable</center></td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection


@section("scripts")
@include("includes.scripts.datatables")
<script>
     $(document).ready(function(){
        // $("#buttons-container").append('<button class="btn btn-primary" id="sync-account">Sync with Chat</button>')
    
        $("body").on("click",".delete",function(e){
                t = $(this);
                let deleteUrl = '{{route("package.destroy", [ "id" => ":id" ])}}';
                let id = t.data("id");
                confirmDelete("Are you sure you want to DELETE Package?","Confirm Package Delete").then(confirmation=>{
                    if(confirmation){
                        $.ajax({
                            url:deleteUrl.replace(":id", id),
                            data: {
                                "_token": "{{ csrf_token() }}",
                            },
                            method:"POST",
                            success: function(){
                                t.closest("tr").remove();
                                $(".tooltip").removeClass("show");
                            }
                        })
                    }
                });
            });
     });
</script>
@endsection