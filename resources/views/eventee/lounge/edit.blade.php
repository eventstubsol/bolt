@extends("layouts.admin")

@section("page_title")
Edit Lounge
@endsection


@section("title")
Edit Lounge
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item"><a href="{{ route("eventee.lounge.index",['id'=>$id]) }}">Sessions</a></li>
    <li class="breadcrumb-item active">Update</li>
@endsection

@section("content")
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route("eventee.lounge.update",['table'=>$table->id,'id'=>$id]) }}" method="post">
                    {{ csrf_field() }}
                    @method("PUT")

                    <!-- Session Name -->
                    <div class="form-group mb-3">
                        <label for="name">Title
                            <span style="color:red">*</span>
                        </label>
                        <input required autofocus type="text"  id="name" value="{{$table->name}}" name="name" class="form-control   @error('name') is-invalid @enderror">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                   
                    <!-- Number of Participants   -->

                    <div class="form-group mb-3">
                        
                        <label>Number of Seats
                            <span style="color:red">*</span>
                        </label>
                        <input type="number" value="{{$table->seats}}" name="seats" class="form-control ">
                    </div>

                    <input type="text" value="{{$table->meeting_id}}" name="meetingId" class="form-control " id="meetingId" style="display:none"  >
 


                    <div>
                        <input class="btn btn-primary" type="submit" id="create_session" value="Update" />
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
