@extends("layouts.admin")

@section("styles")
    @include("includes.styles.datatables")
    <style>
        .inchecked{
            padding:6rem 15rem;
            width: 50%
            height:50rem;
        }
    </style>
@endsection

@section("page_title")
    Booths Page
@endsection

@section("title")
    Booths Page
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item active">Booths</li>
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
{{--                <div class="float-right d-none d-md-inline-block">--}}
{{--                    <div class="btn-group mb-2">--}}
{{--                        <a class="btn btn-primary" href="{{ route("booth.create") }}">Create New</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <table id="datatable-buttons" class="table datatable   dt-responsive nowrap w-100">
                    <thead>
                        <tr class="head">
                            <th class="checks" style="display: none">#</th>
                            <th>Name</th>
                            <th>Admins</th>
                            <th class="text-right mr-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($booths as $booth)
                        <tr class="checkedbox" data-id="{{ $booth->id }}">
                          <td width="5%" class="incheck" style="display: none" ><input type="checkbox"  onclick="checkedValue(this)"  class="inchecked"></td>
                          <td>{{$booth->name ?? ""}}</td>
                          <td>{!!
                            implode("<Br/>",$booth->admins->map(function($user){
                                return $user->name;
                            })->toArray())
                          !!}</td>
                            <td class="text-right" >
                                <a href="{{ route("eventee.booth.edit", [
                                        "booth_id" => $booth->id,"id"=>$id
                                    ]) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fe-edit-2" ></i></a>   
                             <a href="{{ route("eventee.duplicate", [
                                "object" => $booth ,"type"=>"booth"
                            ]) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="duplicate" data-original-title="duplicate"><i class="fe-copy" ></i></a>
                                <button data-toggle="tooltip" data-placement="top" data-id="{{$booth->id}}" title="" data-original-title="Delete" class="btn btn-danger ml-1 delete"  type="submit"><i class="fas fa-trash-alt"></i></button>
                                <a href="{{ route("exhibiter.edit", [
                                        "booth" => $booth->id, "id"=>$id
                                    ]) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Contents"><i class="fe-edit-2" ></i></a>

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
         var deleteArr = [];
        $(document).ready(function(){
            $("#buttons-container").append('<button class="btn btn-primary" id="sync-account">Sync with Chat</button>');
            $("#buttons-container").append('<a class="btn btn-primary" href="{{ route("eventee.booth.create",$id) }}">Create New</a>');
            $("#buttons-container").append('<button type="button" onclick="AddCheckBox(this)" class="addbox btn btn-info" >Bulk Delete</button>');
            $("#buttons-container").append('<button class="deleteBulk btn btn-danger float-right" onclick="BulkDelete()" style="display: none">Delete</button>');
            $("body").on("click",".delete",function(e){
                t = $(this);
                let deleteUrl = '{{route("eventee.booth.destroy", ["id"=> $id , "booth" => ":id"])}}';
                let id = t.data("id");
                confirmDelete("Are you sure you want to DELETE Booth?","Confirm Booth Delete").then(confirmation=>{
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

            $("#sync-account").click(function(){
                $(this).attr("disabled", "true");
                $(this).addClass("disabled");
                $(this).text("Syncing")

                $.ajax({
                    url: '{{ route("sync-groups",$id) }}',
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    method: "GET",
                    success() {
                        $("#sync-account").removeAttr("disabled");
                        $("#sync-account").removeClass("disabled");
                        $("#sync-account").text("Done");
                        setTimeout(()=>{
                            $("#sync-account").text("Sync with Chat")
                }, 2000);
                    }
                })
            });
        });
       
        var appendcheck = 0;
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
            if(deleteArr.indexOf(data_id) == -1){
                deleteArr.push(data_id);
               
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
            if(deleteArr.length < 1){
                alert("Please Select The CheckBoxe First");
            }
            else{
               
                $.post("{{ route('eventee.booth.bulkDelete')}}",{'ids': deleteArr},function(response){
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

       
        
    </script>
@endsection
