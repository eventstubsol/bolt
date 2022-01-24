@extends("layouts.admin")

@section("styles")
    @include("includes.styles.datatables")
@endsection

@section("page_title")
    Session Room Page
@endsection

@section("title")
    Session Room Page
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item active">Session Rooms</li>
@endsection

@section("content")

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
{{--                <div class="float-right d-none d-md-inline-block">--}}
{{--                    <div class="btn-group mb-2">--}}
{{--                        <a class="btn btn-primary" href="{{ route("sessionrooms.create") }}">Create New</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <table id="datatable-buttons" class="table datatable   dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Master Room</th>
                            <th class="text-right mr-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($sessionrooms as $sessionroom)
                        <tr>
                            <td>{{$sessionroom->name}}</td>
                            <th>{{$sessionroom->master_room}}</th>
                            <td class="text-right" >
                                <a href="{{ route("sessionrooms.edit", [
                                        "sessionroom" => $sessionroom->id
                                    ]) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fe-edit-2" ></i></a>
                                    <button data-toggle="tooltip" data-placement="top" data-id="{{$sessionroom->id}}" title="" data-original-title="Delete" class="delete btn btn-danger ml-1 "  type="submit"><i class="fas fa-trash-alt"></i></button>        
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
            $("#buttons-container").append('<a class="btn btn-primary" href="{{ route("sessionrooms.create") }}">Create New</a>')
            $("body").on("click",".delete",function(e){
                    t = $(this);
                    let deleteUrl = '{{route("sessionrooms.destroy", [ "sessionroom" => ":id" ])}}';
                    let id = t.data("id");
                    confirmDelete("Are you sure you want to DELETE sessionroom?","Confirm sessionroom Delete").then(confirmation=>{
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
