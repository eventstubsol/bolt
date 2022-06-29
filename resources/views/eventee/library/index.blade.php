@extends("layouts.admin")


@section('styles')
    @include("includes.styles.fileUploader")
@endsection


@section('title')
    Manage Library
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('library.update', ['id' => $id]) }}" method="post">
                        {{ csrf_field() }}
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-3">Resources</h4>
                                <div class="resource-section">
                                    @foreach($pdfs as $resource)
                                    <div class="row">
                                        <div class="image-uploader mb-3 col-md-4">
                                            <input type="hidden" name="resources[]" class="upload_input" value="{{ $resource->url }}">
                                            <input type="file" data-name="resources" data-plugins="dropify" data-type="/" data-default-file="{{assetUrl($resource->url)}}" />
                                        </div>
                                        <div class="form-group mb-3 col-md-8">
                                            <label for="resourcetitles">Title</label>
                                            <input type="text" id="resourcetitles" name="resourcetitles[]" class="form-control" value="{{ $resource->title }}">
                                            <button class="btn btn-danger mt-2 remove-resource">Remove</button>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
    
                                <div>
                                    <button class="btn btn-primary" id="add-resource">Add Resources</button>
                                    <button class="btn btn-primary">Save</button>
    
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("scripts")
@include("includes.scripts.fileUploader")
<script>
     function removeresource(e) {
        e.preventDefault();
        confirmDelete("Are you sure you want to delete the Resource", "Confirm Resource deletion!").then(confirmation => {
            if (confirmation) {
                $(this).closest(".row").remove();
            }
        })
    }
    
    function bindRemoveButton() {
        $(".remove-resource").unbind().on("click", removeresource);
    }
    function addresource(e) {
        e.preventDefault();
        $(".resource-section").append(`
                <div class="row">
                  <div class="image-uploader mb-3 col-md-4">
                    <input type="hidden" name="resources[]" class="upload_input">
                    <input type="file" data-name="resources" data-plugins="dropify" data-type="/" />
                  </div>
                  <div class="form-group mb-3 col-md-8">
                      <label for="resourcetitles">Title</label>
                      <input type="text"  id="resourcetitles" name="resourcetitles[]" class="form-control" >
                        <button class="btn btn-danger remove-resource mt-2">Remove</button>
                  </div>
                </div>
          `);
        bindRemoveButton();
        initializeFileUploads();
    }
    $(document).ready(function() {
        $("#add-resource").on("click", addresource);
        bindRemoveButton();
    });
</script>
@endsection