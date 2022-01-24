@extends("layouts.admin")

@section("styles")
    @include("includes.styles.datatables")
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
                <table id="datatable-buttons" class="table datatable   dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Menu</th>
                            <th>Link</th>
                            <th>Type</th>
                            <th class="text-right mr-2">Actions</th>
                        </tr>
                    </thead>
                
                    <tbody class="sort">
                      @foreach($menus as $menu)
                        <tr id = "{{ $menu->id }}" class="parent">
                            <td>{{$menu->name}}</td>
                            <td>{{ $menu->link }}</td>
                            @if($menu->parent_id > 0)
                            <td>Child</td>
                            @else
                            <td>Parent</td>
                            @endif
                            <td class="text-right" >
                              <label class="switch" >
                                @if($menu->status == '1')
                                      <input type="checkbox" class="parentbox" value="1" data-id = "{{ $menu->id }}" checked>
                                      <span class="slider round"style="font-size:14px"></span>
                                    </label>
                                @else
                                  <input type="checkbox" class="parentbox" value="0" data-id = "{{ $menu->id }}" >
                                      <span class="slider round"style="font-size:14px"></span>
                                    </label>
                                @endif
                            </td>
                            @if(count(App\Menu::where('parent_id',$menu->id)->orderBy('position','asc')->get())>0)
                              @foreach(App\Menu::where('parent_id',$menu->id)->orderBy('position','asc')->get() as $child)
                                <tr id="{{ $child->id }}">
                                  <td>~{{$child->name}}</td>
                                  <td>{{ $child->link }}</td>
                                   @if($child->parent_id > 0)
                                    <td>Child</td>
                                  @else
                                    <td>Parent</td>
                                    @endif
                                  <td class="text-right" >
                                    <label class="switch" >
                                @if($child->status == '1')
                                      <input type="checkbox" class="parentbox" value="1" data-id = "{{ $child->id }}" checked>
                                      <span class="slider round"style="font-size:14px"></span>
                                    </label>
                                @else
                                  <input type="checkbox" class="parentbox" value="0" data-id = "{{ $child->id }}" >
                                      <span class="slider round"style="font-size:14px"></span>
                                    </label>
                                @endif       
                                  </td>
                              @endforeach
                            @endif
                        </tr>
                      @endforeach
                    </tbody>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
                        <!-- end row-->


{{-- Modal Create--}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crete Nav</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('eventee.menu.store',$id) }}" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" id="recipient-name" name="name">
          </div>
          <input type="hidden" name="type" value="nav">
          <div class="form-group">
            <label for="message-text" class="col-form-label">URL</label>
            <input type="url" class="form-control" id="recipient-name" name="link">
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Icon Name:</label>
            <input type="text" class="form-control" id="recipient-name" name="icon">
          </div>
          <div class="form-group">
           
            <input type="checkbox" id="sub"  name="submenu" value="0" onclick="subMenuSEL(this)">
            <label for="message-text" class="col-form-label">Do you want child menu?</label>
          </div>
          <div class="form-group">
           
            <input type="checkbox" id="confirm"  name="confirm" value="0" onclick="checkSel(this)">
             <label for="message-text" class="col-form-label">Is It a child menu?</label>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Parent Menus</label>
            <select class="parent_id form-control" id="parent" name="parent_id">
              @php
                $navs = App\Menu::where('type','nav')->where('parent_id',0)->get();
              @endphp
              @foreach($navs as $nav)
                <option value="{{ $nav->id }}">{{ $nav->name }}</option>
              @endforeach
            </select>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>

{{-- Modal Edit--}}
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Nav</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form action="{{ route('menuDetail.create') }}" method="get">
          {{ csrf_field() }}
          <input type="hidden" name="id" id="menId">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" id="menu-name" name="name">
          </div>
          <input type="hidden" name="type" value="nav">
          <div class="form-group">
            <label for="message-text" class="col-form-label">URL</label>
            <input type="url" class="form-control" id="menu-link" name="link">
          </div>
          <div class="form-group">
           
            <input type="checkbox" id="sub2"  name="submenu" value="0" onclick="subMenuSelected(this)">
            <label for="message-text" class="col-form-label">Do you want to make child menu of this?</label>
          </div>
          <div class="form-group">
           
            <input type="checkbox" id="confirm2"  name="confirm" value="0" onclick="checkSelected(this)">
             <label for="message-text" class="col-form-label">Do you want to make this child menu?</label>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Parent Menus</label>
            <select class="parent_id form-control" id="parent2" name="parent_id">
              @php
                $navs = App\Menu::where('type','nav')->where('parent_id',0)->get();
              @endphp
              @foreach($navs as $nav)
                <option value="{{ $nav->id }}">{{ $nav->name }}</option>
              @endforeach
            </select>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!--Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="confirmatoin modal-body">
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form action="{{ route('delete.submenu') }}" method="get">
          <input type="hidden" name="id" id="deleteId">
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        
      </div>
    </div>
  </div>
</div>


{{-- Modal Edit 2--}}
<div class="modal fade" id="editModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Footer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form action="{{ route('menuDetail.create') }}" method="get">
          {{ csrf_field() }}
          <input type="hidden" name="id" id="menId2">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" id="child-name" name="name">
          </div>
          <input type="hidden" name="type" value="nav">
          <div class="form-group">
            <label for="message-text" class="col-form-label">URL</label>
            <input type="url" class="form-control" id="child-link" name="link">
          </div>
          <div class="form-group">
           
            <input type="checkbox" id="child-sub"  name="submenu" value="0" onclick="subchildSelected(this)">
            <label for="message-text" class="col-form-label">Do you want to make child menu of this?</label>
          </div>
          <div class="form-group">
           
            <input type="checkbox" id="child-confirm"  name="confirm" value="0" onclick="childSelected(this)">
             <label for="message-text" class="col-form-label">Do you want to make this child menu?</label>
          </div>
          <div class="form-group" id="selection">
            <label for="message-text" class="col-form-label">Parent Menus</label>
            <select class="parent_id form-control" id="child" name="parent_id">
              @php
                $navs = App\Menu::where('type','nav')->where('parent_id',0)->get();
              @endphp
              @foreach($navs as $nav)
                <option value="{{ $nav->id }}">{{ $nav->name }}</option>
              @endforeach
            </select>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!--Delete Modal2 -->
<div class="modal fade" id="deleteChild" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="confirmatoin modal-body">
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form action="{{ route('delete.submenu') }}" method="get">
          <input type="hidden" name="id" id="deletechild">
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        
      </div>
    </div>
  </div>
</div>


@endsection
@section("scripts")



<script type="text/javascript">

$(document).ready(function(){
    $("#buttons-container").append('<a class="btn btn-primary" href="{{ route("eventee.menu.create",$id) }}">Create New</a>')
    //setStatus
    $('.parentbox').on('click',function(){
      if($(this).val() == 0){
        $(this).val(1);

        var status = $(this).val();
        var id = $(this).attr('data-id');

        $.ajax({
          url:"{{ route('setStatus') }}",
          method:"get",
          data:{"status":status,"id":id},
          success:function(result){
            alert(result.message);
          },
          error:function(result){
            console.log(500);
          }
        });
      }
      else{
        $(this).val(0);
        var status = $(this).val();
        var id = $(this).attr('data-id');
        // alert(status);
        $.ajax({
          url:"{{ route('setStatus') }}",
          method:"get",
          data:{"status":status,"id":id},
          success:function(result){
            alert(result.message);
          },
          error:function(result){
            console.log(500);
          }
        });
      }
    });

    //Sort Table
    $('.sort').sortable({
      // axis: 'y',
        update: function (event, ui) {
           
            $(this).children().each(function(index) {
              if($(this).attr('data-position') != index +1){
                $(this).attr('data-position',(index +1)).addClass('updated');
              }
            });

            saveNewPoisition();

            function saveNewPoisition(){
              var position = new Array();
              
              $('.updated').each(function() {
                position.push([$(this).attr('data-position'),$(this).attr('id')]);
              });
              // console.log(position);
              $.ajax({
                data: {"position":position},
                method: 'POST',
                url: '{{ route('eventee.menu.store',$id) }}',
                success:function(response){
                  console.log(response.message);
                },
                error:function(response){
                  console.log(403);
                }
               
            });


            }
            // POST to server using $.post or $.ajax
            
        }

    }).disableSelection();

    
    $('.parent').css('font-weight','bold');
        
      $('#parent').attr('disabled',true);
       //edit modal
      $('#editModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var recipient = button.data('id') ; 
        // alert(recipient);
        $.ajax({
          url:'{{ route('eventee.menu.create',$id) }}',
          method:"get",
          data:{"id":recipient},
          success:function(result){
            $('#menu-name').val(result.name);
            $('#menu-link').val(result.link);
            $('#menId').val(result.id);
            if(result.parent_id > 0){
              $('#sub2').attr('disabled',true);
              $('#parent2').append($('<option>',{
                value:result.parent_id,
              }));
              $('#confirm').attr('checked','checked');
            }
            else if(result.sub == 1){
              $('#sub2').prop('checked',true);
              $('#parent2').attr('disabled','disabled');
              $('#confirm2').attr('disabled','disabled');
            }
            else{
              $('#parent2').attr('disabled',true);
            }

            
          },
          error:function(result){
            alert(500);
          }
        });
      });

     $('#deleteModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
        var recipient = button.data('id') ; 
        $.ajax({
          url:'{{ route('delete.savePosition') }}',
          method:'get',
          data:{'id':recipient},
          success:function(result){
            if(result == 0){
              $('.confirmatoin').html("<h5>Are you sure you want to delete this item?</h5>");
              $('#deleteId').val(recipient);
            }
            else{
              $('.confirmatoin').html("<h5>there are "+result +" numbers of child available,if you click delete each and every child will also get deleted</h5>");
              $('#deleteId').val(recipient);
            }
          },
          error:function(result){
            console.log(500);
          }
        });
     });

      // child section

     $('#editModal2').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var recipient = button.data('id') ; 
      // alert(recipient);
      $.ajax({
        url:'{{ route('eventee.menu.create',$id) }}',
        method:"get",
        data:{"id":recipient},
        success:function(result){

          $('#child-name').val(result.name);
          $('#child-link').val(result.link);
          $('#menId2').val(result.id);
          if(result.parent_id > 0){
            $('#child-sub').attr('disabled',true);
            console.log(result.parent_id);
            $('.parent_id').val(result.parent_id);
            $('#child-confirm').attr('checked','checked');
          }
          else if(result.sub == 1){
            $('#child-sub').prop('checked',true);
            $('#parent2').attr('disabled','disabled');
            $('#child-confirm').attr('disabled','disabled');
          }
          else{
            $('#parent2').attr('disabled',true);
          }

          
        },
        error:function(result){
          alert(500);
        }
      });
    });

     $('#deleteChild').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
        var recipient = button.data('id') ; 
        // alert(recipient);
        $.ajax({
          url:'{{ route('delete.savePosition') }}',
          method:'get',
          data:{'id':recipient},
          success:function(result){
            if(result == 0){
              $('.confirmatoin').html("<h5>Are you sure you want to delete this item?</h5>");
              $('#deletechild').val(recipient);
            }
            else{
              $('.confirmatoin').html("<h5>there are "+result +" numbers of child available,if you click delete each and every child will also get deleted</h5>");
              $('#deletechild').val(recipient);
            }
          },
          error:function(result){
            console.log(500);
          }
        });
     });
    

  });

  function checkSel(checkSelect){
      var parent = document.getElementById('parent');
    
      if (checkSelect.checked == true){
        parent.disabled  = false;
        checkSelect.value = 1;
    } else {
         parent.disabled  = true;
         checkSelect.value = 0;
    }     
    }

    function subMenuSEL(status){
      var check = document.getElementById('confirm');
      if(status.checked == true){
        status.value = 1;
        check.disabled = true;
      }
      else{
        status.value = 0;
        check.disabled = false;
      }
    }
    function checkSelected(checkSelect) {
      var parent = document.getElementById('parent2');
      if (checkSelect.checked == true){
        parent.disabled  = false;
        checkSelect.value = 1;
    }else {
         parent.disabled  = true;
         checkSelect.value = 0;
    }     
    }

    function subMenuSelected(status){
      var check = document.getElementById('confirm2');
      var parent = document.getElementById('parent2');
      if(status.checked == true){
        status.value = 1;
        check.disabled = true;
        parent.disabled  = true;
      }
      else{
        status.value = 0;
        check.disabled = false;
        if(check.checked ==true){
          parent.disabled = false;
        }
        
        
      }
    }

    //child section
    function childSelected(checkSelect) {
      var parent = document.getElementById('child');
      if (checkSelect.checked == true){
        parent.disabled  = false;
        checkSelect.value = 1;
    }else {
         parent.disabled  = true;
         checkSelect.value = 0;
    }     
    }

    function subchildSelected(status){
      var check = document.getElementById('child-confirm');
      var parent = document.getElementById('child');
      if(status.checked == true){
        status.value = 1;
        check.disabled = true;
        parent.disabled  = true;
      }
      else{
        status.value = 0;
        check.disabled = false;
        if(check.checked ==true){
          parent.disabled = false;
        }
        
        
      }
    }
</script>
@endsection
