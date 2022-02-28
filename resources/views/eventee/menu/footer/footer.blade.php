@extends("layouts.admin")

@section("styles")
    @include("includes.styles.datatables")
    <style>
      form{
        display: inline !important;
      }
      #savebtn{
          margin-left:1.5rem;
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
    <li class="breadcrumb-item ">Menu</li>
    <li class="breadcrumb-item active"><a href="{{ route("eventee.menu.footer",$id) }}">Footer</a></li>
@endsection


@section("content")

<div class="row">
    <div class="col-12">
        <div class="card">
          <div id="buttons-container" class="card-header" >
          </div>
            <div class="card-body">
                <table id="datatable-buttons" class="table datatable   dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Menu</th>
                            <th>Status</th>
                            <th>Type</th>
                            <th class="text-right mr-2">Actions</th>
                        </tr>
                    </thead>
                
                    <tbody class="sort" id="sort">
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

                <div class="custom-dd dd"  style="max-width: 100%"  id="sortable" >
                    <ol class="sort dd-list" id="olsort">
                        @foreach($menus as $i => $menu)
                        
                                <li class="dd-item" data-id="{{ $menu->id }}" data-position="{{ $menu->position }}">
                                    
                                    <div class="dd-handle" data-id="{{ $menu->id }}">
                                       
                                        {{$menu->name}} 
                                
                                    </div>
                                    @foreach($menu->submenus as $submenu)
                                    <ol class="dd-list"><li class="dd-item" data-id="{{ $submenu->id }}" data-position="{{ $submenu->position }}">
                                        <div class="dd-handle" data-id="32">
                                            {{ $submenu->name }}
                                        </div>
                                        </li></ol>
                                    </li>
                                    @endforeach
                            {{-- @else
                            <li class="dd-item" data-id="{{ $menu->id }}" data-position="{{ $menu->position }}">
                                <div class="dd-handle" data-id="{{ $menu->id }}">
                                    {{$menu->name}}
                                   
                                </div>
                            </li>
                            @endif --}}
                        @endforeach
                    </ol>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div><!-- end row-->
@endsection
@section("scripts")

<script src="https://coderthemes.com/ubold/layouts/assets/libs/nestable2/jquery.nestable.min.js"></script>

<script type="text/javascript">
var final;
$(document).ready(function(){
    $("#buttons-container").append('<a class="btn btn-primary" href="{{ route("eventee.footer.create",$id) }}">Create New</a>');
    $("#buttons-container").append('<button class="btn btn-success" onclick="setOrder()">Set Order</button>');
    $("#buttons-container").append('<button id="savebtn" type="button" class="btn btn-success" onclick="SavePositions()" style="display:none">Save</button>')
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

        var updateOutput = function (e) {
            var list = e.length ? e : $(e.target), output = list.data('output');
            if (window.JSON) {output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
            } else {
                output.val('JSON browser support required for this demo.');
            }
            // console.log(list.nestable('serialize'));
            final = list.nestable('serialize');
            $('#savebtn').css('display','block');

            
        };

        $('#sortable').nestable({
            group: 1,
            maxDepth:2,
            serialize:true,
            
        }).on('change',updateOutput);
        updateOutput($('#sortable').data('output', $('#sortable')));
        // $('.dd').on('change', function(el) {
        //         /* on change event */
        //     console.log(el);
        // });
        function saveNewPoisition(){
            
            $('.updated').each(function(){
                position.push([$(this).attr('data-id'), $(this).attr('data-position')]);
            });
        }

        function SavePositions(){
            // console.log(final);
            $.ajax({
                url:"{{ route('menu.store') }}",
                method:"POST",
                data:{"menu":final},
                success:function(response){
                    // alert("Changes Made Successfully");
                    showMessage("Changes Made Successfully",'success');
                    $('#savebtn').hide();
                    location.reload();
                    

                }
            });
        }
        $(document).ready(function(){
            $('#sortable').hide();
            $('#sort').show();
        });
        var switchOrder = 0;
        function setOrder(){
           if(switchOrder == 0){
            $('#sortable').show();
            $('#sort').hide();
            switchOrder = 1;
           }
           else{
            $('#sortable').hide();
            $('#sort').show();
            switchOrder = 0;
           }
        }

</script>
@endsection
