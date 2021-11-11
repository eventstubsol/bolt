@extends("layouts.admin")

@section("styles")
    @include("includes.styles.datatables")
@endsection

@section("page_title")
    Lounge Page
@endsection

@section("title")
    Lounge Page
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item active">Sessions</li>
@endsection

@section("content")

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="datatable-buttons" class="table datatable table-striped dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Seats</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($tables as $table)
                        <tr>
                            <td>{{$table->name}}</td>
                            <th>{{$table->seats}}</th>
                            <td class="text-right" >
                                <a href="{{ route("eventee.lounge.edit", [
                                        "table" => $table->id,'id'=>$id
                                    ]) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fe-edit-2" ></i></a>
                                    <button data-toggle="tooltip" data-placement="top" data-id="{{$table->id}}" title="" data-original-title="Delete" class="delete btn btn-danger ml-1 "  type="submit"><i class="fas fa-trash-alt"></i></button>        
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
            $("#buttons-container").append('<a class="btn btn-primary" href="{{ route("eventee.lounge.create",["id"=>$id]) }}">Create New</a>')
            $("body").on("click",".delete",function(e){
                    t = $(this);
                    let deleteUrl = '{{route("eventee.lounge.destroy", [ "table" => ":id", "id" => $id ])}}';
                    let id = t.data("id");
                    confirmDelete("Are you sure you want to DELETE table?","Confirm table Delete").then(confirmation=>{
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
