@extends("layouts.admin")

@section("page_title")
Leaderboard Settings
@endsection

@section("title")
Leaderboard Settings
@endsection

@section("styles")
@include("includes.styles.fileUploader")
<link rel="stylesheet" href="https://coderthemes.com/ubold/layouts/assets/libs/spectrum-colorpicker2/spectrum.min.css">
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
                
                
                <div id="formToAppend">
                    <div class="card-title"><h4>Leaderboard Images</h4></div>
                </div>
                <div class="pointsAppend">
                    <div class="card-title"><h4>Leaderboard Points</h4></div>
                </div>

                <button type="button" class="addSection btn btn-primary">Add Images</button>
                <button type="button" class="addPoints btn btn-primary">Add Points</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        @else
            <form action="{{ route("eventee.leaderSetting.update",['id'=>$id,'lead_id'=>$leaderSettings->id]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="color">Select Color</label>
                    <input type="text" class="form-control" id="colorpicker-default"  name="color" value="{{ $leaderSettings->color }}">
                </div>
                
                <div id="form-append">
                    <div class="card-title"><h4>Leaderboard Images</h4></div>
                    @if(App\Image::where('owner',$leaderSettings->id)->count() > 0)
                        @foreach (App\Image::where('owner',$leaderSettings->id)->get() as $key =>$image)
                            <div class="form-group">
                                <div class="image-uploader" id="imgBg" >
                                    <label class="mb-3" for="images">Leaderboard Image {{ $key+1 }}</label>
                                    <input type="hidden" name="leaderboardUrl[]" class="upload_input"  value="{{ $image->url }}" >
                                    <input type="file" data-name="leadimages" data-plugins="dropify" data-type="image" data-default-file={{  assetUrl($image->url) }} />
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="image-button">
                    <button type="button" class="addSection2 btn btn-primary">Add Images</button>
                </div>
                <div id="point-append">
                    <div class="card-title"><h4>Leaderboard Points</h4></div>
                    @if(App\LeadPoint::where('owner',$leaderSettings->id)->count() > 0)
                    @foreach (App\LeadPoint::where('owner',$leaderSettings->id)->get() as $key =>$loadpoint)
                        <div class="form-group point-group">
                            <label for="points">Point {{ $key + 1  }}</label>
                            <div class="input-group-append">
                            <input type="text" name="points[]" class="form-control" value="{{ $loadpoint->point }}">
                            
                               <button type="button" data-id="{{ $loadpoint->id }}" onclick="DeletePoint(this)" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </div>
                        </div>

                    @endforeach
                @endif
                </div>
                
                <button type="button" class="addPoints2 btn btn-primary">Add Points</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        @endif
    </div>
</div>
@endsection


@section("scripts")
@include("includes.scripts.fileUploader")
<script src="https://coderthemes.com/ubold/layouts/assets/libs/spectrum-colorpicker2/spectrum.min.js"></script>
<script src="https://coderthemes.com/ubold/layouts/assets/libs/clockpicker/bootstrap-clockpicker.min.js"></script>
<script >
    $(document).ready(function(){
        $("#colorpicker-default").spectrum();
    })
</script>
<script>
    $(document).ready(function(){
        $('.addSection').on('click',function(){
            var appendable = '<div class="form-group"><div class="image-uploader" id="imgBg" ><label class="mb-3" for="images">Leaderboard Image </label><input type="hidden" name="leaderboardUrl[]" class="upload_input"  ><input type="file" data-name="leadimages" data-plugins="dropify" data-type="image" /></div></div>';
            $('#formToAppend').append(appendable);
            initializeFileUploads();
        });
        $('.addSection2').on('click',function(){
            var appendable = '<div class="form-group"><div class="image-uploader" id="imgBg" ><label class="mb-3" for="images">Leaderboard Image </label><input type="hidden" name="leaderboardUrl[]" class="upload_input"  ><input type="file" data-name="leadimages" data-plugins="dropify" data-type="image" /></div></div>';
            $('#form-append').append(appendable);
            initializeFileUploads();
        });
        $('.addPoints2').on('click',function(){
            var appendable = '<div class="form-group"><label for="points">Point</label><input type="text" name="points[]" class="form-control"></div>';
            $('#point-append').append(appendable);
        });
        $('.addPoints').on('click',function(){
            var appendable = '<div class="form-group"><label for="points">Point</label><input type="text" name="points[]" class="form-control"></div>';
            $('.pointsAppend').append(appendable);
        });
    });
</script>
<script>
    function DeletePoint(e){
       
        var id = e.getAttribute('data-id');
        var data = e.closest('.point-group');
        confirmDelete("Are you sure you want to DELETE Point?","Confirm Point Delete").then(confirmation=>{
                if(confirmation){
                    $.post('{{ route("eventee.leaderboard.points.delete") }}',{'id':id},function(response){
                        if(response.code ==200){
                            showMessage(response.message,'success');
                            data.remove();
                        }
                        else{
                            showMessage(response.message,'error');
                        }
                        
                    });
                }
            });
    }
</script>
@endsection