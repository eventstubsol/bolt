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
    <li class="breadcrumb-item ">Menus</li>
    <li class="breadcrumb-item active"><a href="{{ route("eventee.menu",$id) }}">Nav</a></li>
@endsection


@section("content")

<div class="row">
    <div class="col-12">
        <div class="card">
          <div id="buttons-container" class="card-header" style="display:inline-flex">
          </div>
            <div class="card-body">
               <table id="datatable-buttons" class="table datatable   dt-responsive nowrap w-100">
                    <thead>
                        <tr class="head">
                            <th class="checks" style="display: none"><input type="checkbox" class="checkall"></th>
                            <th>Menu</th>
                            <th>Status</th>
                            <th class="text-right mr-2">Actions</th>
                        </tr>
                    </thead>
                
                    <tbody class="sort" id="sort">
                      @foreach($menus as $menu)
                        <tr class="checkedbox" data-id="{{ $menu->id }}">
                            <td width="5%" class="incheck" style="display: none" ><input type="checkbox"  onclick="checkedValue(this)"  class="inchecked"></td>
                            <td>@if($menu->name  == 'personalagenda')Personal Agenda @else {{$menu->name}} @endif</td>
                            <td>{{ $menu->status ? 'Active' : 'Disabled' }}</td>
                         <td class="text-right" >
                              @if($menu->status)
                                <button class="btn btn-danger disable" data-id="{{$menu->id}}"  > Disable </button>
                              @else
                                <form action='{{ route("eventee.menu.enable", [ "menu" => $menu->id,"id" => $id ]) }}' method="POST">
                                  {{ csrf_field() }}
                                  @method("PUT")
                                  <button class="btn btn-success activate" data-id="{{$menu->id}}"> Activate </button>
                                </form>
                              @endif
                              @if($menu->link !== "perm")
                                <a href="{{ route("eventee.menu.edit", [
                                          "menu" => $menu->id, "id"=>$id,
                                      ]) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fe-edit-2" ></i></a>
                                    <button data-toggle="tooltip" data-placement="top" data-id="{{$menu->id}}" title="" data-original-title="Delete" class="delete btn btn-danger ml-1 "  type="submit"><i class="fas fa-trash-alt"></i></button>        
                              @endif
                               
                            </td>
                        </tr>
                      @endforeach
                    </tbody>

                </table>
                <div class="liSort custom-dd dd"  style="max-width: 100%"  id="sortable"  >
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

<!-- <script src="https://coderthemes.com/ubold/layouts/default/assets/libs/nestable2/jquery.nestable.min.js"></script> -->
<script src="https://coderthemes.com/ubold/layouts/default/assets/js/pages/nestable.init.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.js" integrity="sha512-7bS2beHr26eBtIOb/82sgllyFc1qMsDcOOkGK3NLrZ34yTbZX8uJi5sE0NNDYFNflwx1TtnDKkEq+k2DCGfb5w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.css" integrity="sha512-WLnZn2zeYB0crLeiqeyqmdh7tqN5UfBiJv9cYWL9nkUoAUMG5flJnjWGeeKIs8eqy8nMGGbMvDdpwKajJAWZ3Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.js" integrity="sha512-82PG9+UohqLAGHC/K7Jxbm8RxGLTcPLiJtC9k/LkLhDHye/rlfls9jSIwqR7Co3776CqUfsD6Fo9ZVWWb9BSZg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.css" integrity="sha512-yOW3WV01iPnrQrlHYlpnfVooIAQl/hujmnCmiM3+u8F/6cCgA3BdFjqQfu8XaOtPilD/yYBJR3Io4PO8QUQKWA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

<script type="text/javascript">

// var ids = [];
var position =[];
var final;
var incheck = $('.incheck');
var checks = $('.checks');
$(document).ready(function(){
    checks.hide();
    incheck.hide();
});
var appendcheck = 0;
var deleteArr = [];
var deltype = 0;
$(document).ready(function(){
    
    $("#buttons-container").append('<a class="btn btn-primary" href="{{ route("eventee.menu.create",$id) }}">Create New</a>');
    $("#buttons-container").append('<button class="btn btn-success ml-2" onclick="setOrder()">Set Order</button>');
    $("#buttons-container").append('<button id="savebtn" type="button" class="btn btn-success ml-2" onclick="SavePositions()" style="display:none">Save</button>');
    $("#buttons-container").append('<button type="button" onclick="AddCheckBox(this)" class="addbox btn btn-info ml-2" >Bulk Disable</button>');
    $("#buttons-container").append('<button class="deleteBulk btn btn-danger float-right ml-2" onclick="BulkDelete()" style="display: none">Disable</button>');
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
            maxDepth:1,
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

        // function getvalues(e){
        //     console.log(e.closest('ol'));
        // }
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

        function AddCheckBox(e){
            var button = $('.addbox');
            
            if(appendcheck == 0){
                // $('.head').append('<th class="thead">#</th>');
                // $('.checkedbox').append(appended);
                checks.show();
                incheck.show();
                $('.deleteBulk').show();
                appendcheck = 1;
                button.text("Cancel");
                button.addClass('btn-danger');
                button.removeClass('btn-info');
            }
            else{
                checks.hide();
                incheck.hide();
                
                $('.deleteBulk').hide();
                appendcheck = 0;
                button.text("Bulk Delete");
                button.removeClass('btn-danger');
                button.addClass('btn-info');
            }
        }

        function checkedValue(e){
            var data_id = e.closest('tr').getAttribute('data-id');
            // console.log(data_id);
            if(deleteArr.indexOf(data_id) == -1){
                deleteArr.push(data_id);
                deltype = 1;
            }
            else{
               
                for(var i = 0 ; i < deleteArr.length; i++){
                   if(deleteArr[i] == data_id){
                       deleteArr.splice(i,1);
                   }
               }
            }
            // console.log(deleteArr);
        }
        function BulkDelete(){
            if(deltype == 1){
                if(deleteArr.length < 1){
                    alert("Please Select The CheckBoxe First");
                }
                else{
                
                    $.post("{{ route('eventee.menu.bulkdisable')}}",{'ids': deleteArr},function(response){
                        if(response.code == 200){
                            showMessage(response.message,'success');
                            setTimeout(function(){ location.reload(); }, 2000);
                        }
                        else{
                            // $('#errorAlert').show()
                            // $('#successAlert').hide()
                            showMessage(response.message,'error');
                        }
                    });
                }
            }
            else if(deltype == 2){
               $.post("{{ route('eventee.menu.disableAll') }}",{'id': "{{ $id }}" },function(response){
                    if(response.code == 200){
                            // $('#successAlert').show()
                            // $('#errorAlert').hide();
                            showMessage(response.message,'success');
                            setTimeout(function(){ location.reload(); }, 2000);
                    }
                    else{
                        // $('#errorAlert').show()
                        // $('#successAlert').hide()
                        showMessage(response.message,'error');
                    }
               });
            }
            else{
                alert("Please Select The CheckBoxe First");
            }
        }

        $(document).ready(function(){
            $('.checkall').on('click',function(){
                $("input[type=checkbox]").prop('checked', $(this).prop('checked'));
                deltype = 2; 
            });
        });
        
</script>
@endsection
