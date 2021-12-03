@extends("layouts.admin")

@section("page_title")
Leaderboard Settings
@endsection

@section("title")
Leaderboard Settings
@endsection

@section("styles")
@include("includes.styles.fileUploader")
@endsection

@section("content")
@php
$fields = getAllFields($id);
@endphp
<div class="progress progress-sm upload mb-2">
    <div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<div class="card">
    <div class="card-body">
        @if(App\Leaderboard::where('event_id',$id)->count() < 1)
            <form action="{{ route("eventee.leaderSetting.store",['id'=>$id]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="color">Select Color</label>
                    <input type="color" class="form-control form-control-color" name="color">
                </div>
                <button type="button" class="addSection btn btn-primary">Add Images</button>
                
                <div id="formToAppend">

                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        @else
            <form action="{{ route("eventee.leaderSetting.update",['id'=>$id,'lead_id'=>$leaderSettings->id]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="color">Select Color</label>
                    <input type="color" class="form-control form-control-color" name="color" value="{{ $leaderSettings->color }}">
                </div>
                @foreach (App\Image::where('owner',$leaderSettings->id)->get() as $key =>$image)
                    <div class="form-group">
                        <div class="image-uploader" id="imgBg" >
                            <label class="mb-3" for="images">Leaderboard Image {{ $key+1 }}</label>
                            <input type="hidden" name="leaderboardUrl[]" class="upload_input"  value="{{ $image->url }}" >
                            <input type="file" data-name="leadimages" data-plugins="dropify" data-type="image" data-default-file={{  assetUrl($image->url) }} />
                        </div>
                    </div>
                @endforeach
                <button type="button" class="addSection btn btn-primary">Add Images</button>
                
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        @endif
    </div>
</div>
@endsection


@section("scripts")
@include("includes.scripts.fileUploader")

<script>
    $(document).ready(function(){
        $('.addSection').on('click',function(){
            var appendable = '<div class="form-group"><div class="image-uploader" id="imgBg" ><label class="mb-3" for="images">Leaderboard Image </label><input type="hidden" name="leaderboardUrl[]" class="upload_input"  ><input type="file" data-name="leadimages" data-plugins="dropify" data-type="image" /></div></div>';
            $('#formToAppend').append(appendable)
        });
    });
</script>
@endsection