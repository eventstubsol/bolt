@extends("layouts.admin")
    
    


@section("page_title")
    Media
@endsection

@section("title")
   Media
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item active">Media</li>
@endsection

@section("content")
   <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('eventee.media.storeVideo',$id) }}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="media">Upload Files  <small style="color: red">(Please Upload Videoes only)</small></label>
                            <input type="file" name="media[]" accept="video/mp4,video/x-m4v,video/avi*" multiple class="form-control-file @error('media') is-invalid @enderror">
                            @error('media')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div>
            </div>
        </div>
   </div>

@endsection