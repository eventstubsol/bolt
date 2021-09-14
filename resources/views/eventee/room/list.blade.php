@extends("layouts.admin")

@section("styles")
    @include("includes.styles.datatables")
@endsection

@section("page_title")
    Rooms Page
@endsection

@section("title")
    Rooms Page
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item active">Rooms</li>
@endsection

@section("content")

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="datatable-buttons" class="table datatable table-striped dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Index</th>
                            <th>Room Name</th>
                            <th>Room Type</th>
                            <th class="text-right mr-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($rooms as $room)
                        <tr>
                            <td>{{$room->position + 1}}</td>
                          <td>{{$room->name}}</td>
                          <td>{{$room->type}}</td>    
                            <td class="text-right" >
                                <a href="{{ route("eventee.room.edit", [
                                        "room_id" => $room->id,"id"=>$id
                                    ]) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fe-edit-2" ></i></a>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
                        <!-- end row-->
@endsection


@section("scripts")
    @include("includes.scripts.datatables")
    <script>
        $(document).ready(function(){
            $("#buttons-container").append('<span><a class="btn btn-primary mr-1" href="{{ route("eventee.room.create",$id) }}">Create New</a><a class="btn btn-primary" href="{{ route("eventee.room.sort",$id) }}">Sort</a></span>');
            $("body").on("click",".delete",function(e){
                t = $(this);
                let deleteUrl = '{{route("room.destroy", [ "room" => ":id" ])}}';
                let id = t.data("id");
                confirmDelete("Are you sure you want to DELETE Room?","Confirm Room Delete").then(confirmation=>{
                    if(confirmation){
                        $.ajax({
                            url:deleteUrl.replace(":id", id),
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "_method": "DELETE"
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
