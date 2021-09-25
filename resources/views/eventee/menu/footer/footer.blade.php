@extends("layouts.admin")

@section("styles")
    @include("includes.styles.datatables")
    <style>
      form{
        display: inline !important;
      }
      </style>
@endsection

@section("page_title")
    Manage Menus
@endsection

@section("title")
    Manage Menus
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item active">Menus</li>
@endsection


@section("content")

<div class="row">
    <div class="col-12">
        <div class="card">
          <div id="buttons-container" class="card-header" >
          </div>
            <div class="card-body">
                <table id="datatable-buttons" class="table datatable table-striped dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Menu</th>
                            <th>Status</th>
                            <th>Type</th>
                            <th class="text-right mr-2">Actions</th>
                        </tr>
                    </thead>
                
                    <tbody class="sort">
                      @foreach($menus as $menu)
                        <tr id = "{{ $menu->id }}" class="parent">
                            <td>{{$menu->name}}</td>
                            <td>{{ $menu->status ? 'Active' : 'Disabled' }}</td>
                            @if($menu->parent_id > 0)
                            <td>Child</td>
                            @else
                            <td>Parent</td>
                            @endif
                            <td class="text-right" >
                              @if($menu->status)
                                <button class="btn btn-danger disable" data-id="{{$menu->id}}"  > Disable </button>
                                <a href="{{ route("eventee.menu.edit", [
                                        "menu" => $menu->id, "id"=>$id,
                                    ]) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fe-edit-2" ></i></a>
                            
                              @else
                                <form action='{{ route("eventee.menu.enable", [ "menu" => $menu->id,"id" => $id ]) }}' method="POST">
                                  {{ csrf_field() }}
                                  @method("PUT")
                                  <button class="btn btn-success activate" data-id="{{$menu->id}}"> Activate </button>
                                  <a href="{{ route("eventee.footer.edit", [
                                            "menu" => $menu->id, "id"=>$id,
                                        ]) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fe-edit-2" ></i></a>
                                </form>
                              @endif
                              <button data-toggle="tooltip" data-placement="top" data-id="{{$menu->id}}" title="" data-original-title="Delete" class="delete btn btn-danger ml-1 "  type="submit"><i class="fas fa-trash-alt"></i></button>        

                               
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div><!-- end row-->
@endsection
@section("scripts")



<script type="text/javascript">

$(document).ready(function(){
    $("#buttons-container").append('<a class="btn btn-primary" href="{{ route("eventee.footer.create",$id) }}">Create New</a>')
    //setStatus
    $("body").on("click",".disable",function(e){
                    t = $(this);
                    let deleteUrl = '{{route("eventee.menu.disable", [ "menu" => ":id","id"=>$id ])}}';
                    let id = t.data("id");
                    confirmDelete("Are you sure you want to Disable Menu?","Confirm Disable Menu").then(confirmation=>{
                        if(confirmation){
                            $.ajax({
                                url:deleteUrl.replace(":id", id),
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "_method": "DELETE"
                                },
                                method:"POST",
                                success: function(){
                                    window.location.reload();
                                    // t.removeClass("btn-danger");
                                    // t.addClass("Ac")
                                    // t.closest("tr").remove();
                                    $(".tooltip").removeClass("show");
                                }
                            })
                        }
                    });
                });
                $("body").on("click",".delete",function(e){
                    t = $(this);
                    let deleteUrl = '{{route("eventee.menu.delete", [ "menu" => ":id","id"=>$id ])}}';
                    let id = t.data("id");
                    confirmDelete("Are you sure you want to Delete Menu?","Confirm Delete Menu").then(confirmation=>{
                        if(confirmation){
                            $.ajax({
                                url:deleteUrl.replace(":id", id),
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "_method": "DELETE"
                                },
                                method:"POST",
                                success: function(){
                                    window.location.reload();
                                    // t.removeClass("btn-danger");
                                    // t.addClass("Ac")
                                    // t.closest("tr").remove();
                                    $(".tooltip").removeClass("show");
                                }
                            })
                        }
                    });
                });
        });
</script>
@endsection
