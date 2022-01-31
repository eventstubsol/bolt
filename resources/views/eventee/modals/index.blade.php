@extends("layouts.admin")


@section('styles')
    @include("includes.styles.datatables")
    {{-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet"> --}}
    {{-- <style>
        #eventData .slugInp{
            width: 85%;
            border: 1px solid grey;
            height: calc(1.5rem+ 0.9rem+ 2px);
            padding: 0.45rem 0.9rem;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.2rem;
        }
        #event_link{
            font-weight: 700;
            white-space: nowrap;
        }
    </style> --}}
    <style>
        #buttons-container{
            float: right;
            display: flex;
            justify-content: space-around;
            margin-bottom: 0.5rem;
        }
    </style>
@endsection
@section('page_title')
   Modals  
@endsection

@section('title')
    Modals
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item active">Modals</li>
@endsection

@section('content')


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
                <div id="buttons-container"></div>
               
                <table id="datatable-buttons" class="table datatable   dt-responsive nowrap w-100">
                    <thead>
                        <tr class="head">
                            <th class="checks" style="display: none"><input type="checkbox" class="checkall"></th>
                            <th>Page</th>
                            <th class="text-right mr-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($modals as $modal)
                        <tr class="checkedbox" data-id="{{ $modal->id }}">
                            <td width="5%" class="incheck" style="display: none" ><input type="checkbox"  onclick="checkedValue(this)"  class="inchecked"></td>
                            <td>{{$modal->name}}</td>
                            <td class="text-right" >
                                <a href="{{ route("eventee.modal.edit", [
                                        "modal" => $modal->id, "id"=>$id,
                                    ]) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Edit" data-original-title="Edit"><i class="fe-edit-2" ></i></a>
                                <button data-toggle="tooltip" onclick="deleteModal(this)" data-placement="top" data-id="{{$modal->id}}" title="Delete" data-original-title="Delete" class="delete btn btn-danger ml-1 "  type="submit"><i class="fas fa-trash-alt"></i></button>        
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
      

@endsection

@section('scripts')
@include("includes.styles.datatables")
    <script>
           $(document).ready(function(){
            $("#buttons-container").append('<a class="btn btn-primary" href="{{ route("eventee.modal.create",$id) }}">Create New</a>');
            $("#buttons-container").append('<button type="button" onclick="AddCheckBox(this)" class="addbox btn btn-info" >Bulk Delete</button>');
            $("#buttons-container").append('<button class="deleteBulk btn btn-danger float-right" onclick="BulkDelete()" style="display: none">Delete</button>');
           });
        function deleteModal(e){
            var id = e.getAttribute('data-id');
            confirmDelete("Are you sure you want to DELETE Modal?","Confirm Modal Delete").then(confirmation=>{
                        if(confirmation){
                            let deleteUrl = '{{route("eventee.modal.destroy", [ "modal" => ":id" ])}}';
               
                            $.ajax({
                                url:deleteUrl.replace(":id",id),
                                data: {
                                    "id":id,
                                },
                                method:"DELETE",
                                success: function(response){
                                    console.log(response);
                                    if(response.success){
                                        e.closest("tr").remove();
                                    }
                                    else{
                                        alert("Something Went Wrong");
                                    }
                                   
                                }
                            })
                        }
                    });
        }
    </script>
    <script>
        var incheck = $('.incheck');
        var checks = $('.checks');
        $(document).ready(function(){
            checks.hide();
            incheck.hide();
        });
        var appendcheck = 0;
        var deleteArr = [];
        var deltype = 0;
        function AddCheckBox(e){
            var button = $('.addbox');
           
            // var appended = ' ';
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
               
                $.post("{{ route('eventee.modal.bulkDelete')}}",{'ids': deleteArr},function(response){
                    if(response.code == 200){
                        $('#successAlert').show()
                        showMessage("Deleted Successfully",'success');
                        $('#errorAlert').hide();
                        setTimeout(function(){ location.reload(); }, 2000);
                    }
                    else{
                        $('#errorAlert').show()
                        showMessage("Something Went Wrong",'error');
                        $('#successAlert').hide()
                        $('#errorAlert').html(response.message);
                    }
                });
            }
           }
           else if(deltype == 2){
               $.post("{{ route('eventee.modal.deleteAll') }}",{'id': "{{ $id }}" },function(response){
                    if(response.code == 200){
                            $('#successAlert').show()
                            showMessage("Deleted Successfully",'success');
                            $('#errorAlert').hide();
                            setTimeout(function(){ location.reload(); }, 2000);
                    }
                    else{
                        $('#errorAlert').show()
                        showMessage("Something Went Wrong",'error');
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
