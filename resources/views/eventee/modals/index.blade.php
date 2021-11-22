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
               
                <table id="datatable-buttons" class="table datatable table-striped dt-responsive nowrap w-100">
                    <thead>
                        <tr class="head">
                            <th class="checks" style="display: none"><input type="checkbox" class="checkall"></th>
                            <th>Page</th>
                            <th class="text-right mr-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($modals as $modal)
                        <tr>
                            <td>{{$modal->name}}</td>
                            <td class="text-right" >
                                <a href="{{ route("eventee.modal.edit", [
                                        "modal" => $modal->id, "id"=>$id,
                                    ]) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit" data-original-title="Edit"><i class="fe-edit-2" ></i></a>
                                <button data-toggle="tooltip" data-placement="top" data-id="{{$modal->id}}" title="" data-original-title="Delete" class="delete btn btn-danger ml-1 "  type="submit"><i class="fas fa-trash-alt"></i></button>        
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

    <script>
           $(document).ready(function(){
            $("#buttons-container").append('<a class="btn btn-primary" href="{{ route("eventee.modal.create",$id) }}">Create New</a>')
           });
        function deleteModal(e){
            var id = e.getAttribute('data-id');
            confirmDelete("Are you sure you want to DELETE Modal?","Confirm Modal Delete").then(confirmation=>{
                        if(confirmation){
                            let deleteUrl = '{{route("eventee.modal.destroy", [ "modal" => ":id" ])}}';
               
                            $.ajax({
                                url:url.replace("_id",id),
                                data: {
                                    "id":id,
                                },
                                method:"POST",
                                success: function(response){
                                    if(response.code == 200){
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

@endsection
