@extends("layouts.admin")

<style type="text/css">
	.description{
		text-decoration: none;
		color: black;
		font-family: sans-serif;
	}
	.description:hover{
		color: grey;
	}
</style>

@section("styles")
    @include("includes.styles.datatables")
@endsection

@section("page_title")
    Manage Analytics
@endsection

@section("title")
    Manage Analytics
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item active">Analytics</li>
@endsection


@section("content")

	<div class="row">
	    <div class="col-12">
	        <div class="card">
	        	<div class="card-header" >
	        		@php
	        			$count = App\Api::where('type','analytic')->count();
	        		@endphp
	        		@if($count < 1)
	        		<a href="#" class="btn btn-info" style="float: right;" data-toggle="modal" data-target="#exampleModal">Create</a>
	        		@endif
				</div>
				<div class="card-body">
					<table id="datatable-buttons" class="table datatable   dt-responsive nowrap w-100">
						<thead>
							<th width="20%">Title</th>
							<th width="20%">Track ID</th>
							<th width="20%">View Id</th>
							<th width="20%">File Location</th>
							<th width="5%">Options</th>
						</thead>
						<tbody>

							@if(count($apis) < 1)
								<tr>
									<td colspan="5"><center>No Data Found</center></td>
								</tr>
							@else
								@foreach($apis as $api)
									<tr>
										<td width="20%">{{ $api->title }}</td>
										<td width="20%">{{ env('GA_TRACKING_ID') }}</td>
										@if($api->view_id != null)
											<td width="20%">{{ $api->view_id }}</td>
										@else
											<td width="20%"><center>No Data Found</center></td>
										@endif
										@if($api->file_location != null)
											<td width="20%"><a href="#" class="description" data-toggle = "modal" data-target = "#descriptionModal" data-id= "{{ $api->id }}">{{ Str::limit($api->file_location, 20) }}</a></td>
										@else
											<td width="20%"><center>No Data Found</center></td>
										@endif
										<td class="text-center" width="3">
			                              <label class="switch" >
			                                <a data-id="{{ $api->id }}" href="#" class="edit btn btn-primary " data-toggle="modal" data-target="#editModal"><i class="fe-edit-2" ></i></a>
			                                    <button type="button"  data-placement="top" data-id="{{$api->id}}" title="" data-original-title="Delete" class="delete btn btn-danger ml-1 " data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash-alt"></i></button>        
			                            </td>
									</tr>
								@endforeach
							@endif
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	{{-- Modal Create--}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('analytic.store') }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Title:</label>
            <input type="text" class="form-control" id="recipient-name" name="title">
            @error('title')
            	<small class="text-danger">{{ $message }}</small>
            @enderror
          </div>

     
          <input type="hidden" class="form-control" id="recipient-name" name="type" value="analytic">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">View id</label>
            <input type="number" class="form-control" id="recipient-name" name="view_id">
          </div>
           <div class="form-group">
            <label for="recipient-name" class="col-form-label">Tracking id</label>
            <input type="text" class="form-control" id="recipient-name" name="tracking_id">
          </div>

           <div class="form-group">
            <label for="recipient-name" class="col-form-label">Required File</label>
            <input type="file" class="form-control-file" id="recipient-name" name="file">
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


{{-- Expand Description--}}
<div class="modal fade" id="descriptionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       		<div class="card" style="width: 18rem;">
			  <div class="card-body">
			    <h5 class="title card-title" ></h5>
			    <p class="location card-text border"></p>
			  </div>
			</div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('updateDetails') }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Title:</label>
            <input type="text" class="form-control" id="title" name="title">
            @error('title')
            	<small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <input type="hidden" name="id" id="apiId">
     
          <div class="form-group">
            <label for="message-text" class="col-form-label">Detail</label>
            <textarea class="form-control" name="description" id="detail"></textarea>
            @error('description')
            	<small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <input type="hidden" class="form-control" id="recipient-name" name="type" value="analytic">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">View id</label>
            <input type="number" class="form-control" id="view" name="view_id">
          </div>

           <div class="form-group">
            <label for="recipient-name" class="col-form-label">Required File</label>
            <input type="file" class="form-control-file" id="recipient-name" name="file">
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
       	<h5>Are you sure you want to delete this data?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form action="{{ route('third.delete') }}" method="get">
          <input type="hidden" name="id" id="deleteId">
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
	<script type="text/javascript">
		$(document).ready(function() {
			//printing description	
			$('.description').on('click',function(e) {
				e.preventDefault();
				var data_id= $(this).attr('data-id');
				$.ajax({
					url:"{{ route('detailsApi') }}",
					method:"get",
					data:{'id':data_id},
					success:function(result){
						// console.log(result.description);
						$('.title').html('<b>' + result.title + '</b>');
						$('.detail').html('<b>Script : </b>\n')
						$('.detail').text(result.description);
						$('.location').html('<b>Location : </b>\n'+result.file_location);
					}

				});
			});

			//edit modal
			$('#editModal').on('show.bs.modal', function (event) {
		        var button = $(event.relatedTarget);
		        var recipient = button.data('id') ; 
		        // alert(recipient);
		        $.ajax({
		          url:'{{ route('analytic.create') }}',
		          method:"get",
		          data:{"id":recipient},
		          success:function(result){
		          	console.log(result.id);
		          	$('#apiId').val(result.id);
		            $('#title').val(result.title);
		            $('#detail').text(result.description);
		            $('#view').val(result.view_id);
		            
		          },
		          error:function(response){
		            alert(500);
		          }
		        });
		    });

		    $('#deleteModal').on('show.bs.modal', function (event) {
		      	var button = $(event.relatedTarget);
		        var recipient = button.data('id') ;
		        $('#deleteId').val(recipient); 
		    });
		});
	</script>
@endsection

