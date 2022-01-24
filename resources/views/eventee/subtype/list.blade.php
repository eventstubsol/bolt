@extends("layouts.admin")

@section('title')
Manage User Subtypes
@endsection

@section("styles")
@include("includes.styles.datatables")
@endsection

@section("page_title")
Manage User Subtypes
@endsection

@section("breadcrumbs")
<li class="breadcrumb-item active">Users</li>
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="datatable-buttons" class="table datatable   dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th class="text-right mr-2">Actions</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach($subtypes as $subtype)
                        <tr>
                            <td>{{ $subtype->name }} </td>
                          
                            <td class="text-right">
                                <a href="{{ route("eventee.subtype.edit", [
                                        "id" => $id,"subtype"=>$subtype->id
                                    ]) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title=""
                                    data-original-title="Edit"><i class="fe-edit-2"></i></a>
                                <button  data-id="{{ $subtype->id }}" class=" delete btn btn-danger"><i class="fa fa-trash"></i></button>

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
   $("body").on("click",".delete",function(e){
        let deleteUrl = '{{route("eventee.subtype.destroy", [ "id" => ":id" ])}}';
        let t = $(this);
        let id = t.data("id")
        // alert(id);
        confirmDelete("Are you sure you want to DELETE User Subtype?","Confirm User Subtype Delete").then(confirmation=>{
            if(confirmation){
                $.ajax({
                    url:deleteUrl.replace(":id", id),
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "_method": "DELETE"
                    },
                    method:"post",
                    success: function(){
                        t.closest("tr").remove();
                        $(".tooltip").removeClass("show");
                    }
                })
            }
        });
    });
    $(document).ready(function(){
            $("#buttons-container").append('<a class="btn btn-primary" href="{{ route("eventee.subtype.create",$id) }}">Create New</a>')
            
        });

</script>
@endsection