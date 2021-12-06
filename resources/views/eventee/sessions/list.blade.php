@extends("layouts.admin")

@section("styles")
    @include("includes.styles.datatables")
@endsection

@section("page_title")
    Sessions Page
@endsection

@section("title")
    Sessions Page
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item active">Sessions</li>
@endsection

@section("content")

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="alert alert-success" role="alert" id="successAlert" style="display: none">
                        Selected Booths Have Deleted Successfully, Please Wait 2 Seconds....
                  </div>
                  <div class="alert alert-danger" role="alert" id="errorAlert" style="display: none">
                    
                </div>
            </div>
            <div class="card-body">
                <table id="datatable-buttons" class="table datatable table-striped dt-responsive nowrap w-100">
                    <thead>
                        <tr class="head">  
                            <th class="checks" style="display: none"><input type="checkbox" class="checkall"></th>
                            <th>Title</th>
                            <th>Room</th>
                            <th>Master Room</th>
                            <th>Timing</th>
                            <th>Status</th>
                            <th class="text-right mr-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($sessions as $session)
                        <tr class="checkedbox" data-id="{{ $session->id }}">
                            <td width="5%" class="incheck" style="display: none" ><input type="checkbox"  onclick="checkedValue(this)"  class="inchecked"></td>
                            <td>{{$session->name}}</td>
                            <th>{{$session->parentroom->name??""}}</th>
                            <th>{{$session->parentroom->master_room??""}}</th>
                            <th>{{$session->start_time}}-{{$session->end_time}}</th>
                            <th>{{$session->isLive?"Live":"Not Live "}}</th>
                            <td class="text-right" >
                                <a href="{{ route("eventee.sessions.edit", [
                                        "session" => $session->id,'id'=>$id
                                    ]) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fe-edit-2" ></i></a>
                                    <button data-toggle="tooltip" data-placement="top" data-id="{{$session->id}}" title="" data-original-title="Delete" class="delete btn btn-danger ml-1 "  type="submit"><i class="fas fa-trash-alt"></i></button>        
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
        var incheck = $('.incheck');
        var checks = $('.checks');
        $(document).ready(function(){
            checks.hide();
            incheck.hide();
        });
        $(document).ready(function(){
            $("#buttons-container").append('<a class="btn btn-primary" href="{{ route("eventee.sessions.create",["id"=>$id]) }}">Create New</a>');
            $("#buttons-container").append('<button type="button" onclick="AddCheckBox(this)" class="addbox btn btn-info" >Bulk Delete</button>');
            $("#buttons-container").append('<button class="deleteBulk btn btn-danger float-right" onclick="BulkDelete()" style="display: none">Delete</button>');
            $("body").on("click",".delete",function(e){
                    t = $(this);
                    let deleteUrl = '{{route("eventee.sessions.destroy", [ "session" => ":id", "id" => $id ])}}';
                    let id = t.data("id");
                    confirmDelete("Are you sure you want to DELETE session?","Confirm session Delete").then(confirmation=>{
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

        var appendcheck = 0;
        var deleteArr = [];
        var deltype = 0;
        function AddCheckBox(e){
            var button = $('.addbox');
            var appended = ' <td width="5%" class="incheck" ><input type="checkbox"  onclick="checkedValue(this)"  class="inchecked"></td>';
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
                // $('.thead').remove();
                // $('.incheck').remove();
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
            
        }
        function BulkDelete(){
            if(deltype == 1){
                if(deleteArr.length < 1){
                    alert("Please Select The CheckBoxe First");
                }
                else{
                
                    $.post("{{ route('eventee.sessions.bulkDelete')}}",{'ids': deleteArr},function(response){
                        if(response.code == 200){
                            $('#successAlert').show()
                            $('#errorAlert').hide();
                            setTimeout(function(){ location.reload(); }, 2000);
                        }
                        else{
                            $('#errorAlert').show()
                            $('#successAlert').hide()
                            $('#errorAlert').html(response.message);
                        }
                    });
                }
            }
            else if(deltype == 2){
                $.post("{{ route('eventee.sessions.deleteAll') }}",{'id': "{{ $id }}" },function(response){
                    if(response.code == 200){
                            $('#successAlert').show()
                            $('#errorAlert').hide();
                            setTimeout(function(){ location.reload(); }, 2000);
                    }
                    else{
                        $('#errorAlert').show()
                        $('#successAlert').hide()
                        $('#errorAlert').html(response.message);
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
