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
    Manage Comet Chat
@endsection

@section("title")
    Manage Comet Chat
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item active">Comet Chat</li>
@endsection


@section("content")

	<div class="row">
	    <div class="col-12">
	        <div class="card">
	        	<div class="card-header" >
	        		@php
	        			$count = App\Api::where('type','comet')->count();
	        		@endphp
	        		@if($count < 1)
	        		<a href="#" class="btn btn-info" style="float: right;" data-toggle="modal" data-target="#exampleModal">Create</a>
	        		@endif
				</div>
				<div class="card-body">
					<table id="datatable-buttons" class="table datatable   dt-responsive nowrap w-100">
						<thead>
							<th width="20%">App ID</th>
							<th width="20%">Region</th>
							<th width="20%">Auth Key</th>
							<th width="20%">API Key</th>
							<th width="10%">Group Type</th>
							<th width="20%">Base Url</th>
							<th width="5%">Options</th>
						</thead>
						<tbody>

							@if(count($apis) < 1)
								<tr>
									<td colspan="7"><center>No Data Found</center></td>
								</tr>
							@else
								@foreach($apis as $api)
									<tr>
										<td width="20%">{{ env('COMET_CHAT_APP_ID') }}</td>
										<td width="20%">{{ env('COMET_CHAT_REGION') }}</td>
										<td width="20%"><a href="#" class="description" data-toggle = "modal" data-target = "#descriptionModal">{{ Str::limit(env('COMET_CHAT_AUTH_KEY'), 20) }}</a></td>
										<td width="20%"><a href="#" class="description" data-toggle = "modal" data-target = "#descriptionModal" >{{ Str::limit(env('COMET_CHAT_API_KEY'), 20) }}</a></td>
										<td>{{ env('COMET_CHAT_GROUP_TYPE') }}</td>
										<td><a href="#" class="description" data-toggle = "modal" data-target = "#descriptionModal" >{{ Str::limit(env('COMET_CHAT_BASE_URL'), 20) }}</a></td>
										<td class="text-right" width="3%">
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
        <form action="{{ route('comet.index') }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Title:</label>
            <input type="text" class="form-control" id="recipient-name" name="title">
            @error('title')
            	<small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
         

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">App ID:</label>
            <input type="text" class="form-control" id="recipient-name" name="appid" value="{{ old('appid') }}">
            @error('appid')
            	<small class="text-danger">{{ $message }}</small>
            @enderror
          </div>

           <div class="form-group">
            <label for="recipient-name" class="col-form-label">Region:</label>
          	<select class="form-control" name="region">
          		<option value="us">USA</option>
          		<option value="eu">Europe</option>
          	</select>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Auth key:</label>
            <input type="text" class="form-control" id="recipient-name" name="auth" value="{{ old('auth') }}">
            @error('auth')
            	<small class="text-danger">{{ $message }}</small>
            @enderror
          </div>



          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Api key:</label>
            <input type="text" class="form-control" id="recipient-name" name="appkey" value="{{ old('appkey') }}">
            @error('appkey')
            	<small class="text-danger">{{ $message }}</small>
            @enderror
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Group Type:</label>
            <input type="text" class="form-control" id="recipient-name" name="gtype" value="{{ old('gtype') }}">
            @error('gtype')
            	<small class="text-danger">{{ $message }}</small>
            @enderror
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Base URL:</label>
            <input type="url" class="form-control" id="recipient-name" name="base" value="{{ old('base') }}">
            @error('base')
            	<small class="text-danger">{{ $message }}</small>
            @enderror
          </div>

     
          <input type="hidden" class="form-control" id="recipient-name" name="type" value="comet">
         
         
        
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
			    <h5 class="title card-text border" >Auth Key : &nbsp;{{ env('COMET_CHAT_AUTH_KEY') }}</h5>
			    <p class="location card-text border">API Key : &nbsp;{{ env('COMET_CHAT_API_KEY') }}</p>
			    <p class="location card-text border">Base URL : &nbsp;{{ env('COMET_CHAT_BASE_URL') }}</p>

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

