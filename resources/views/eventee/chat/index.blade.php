@extends("layouts.admin")


@section('styles')
@include("includes.styles.fileUploader")

    <link rel="stylesheet" href="https://coderthemes.com/ubold/layouts/assets/libs/spectrum-colorpicker2/spectrum.min.css">
@endsection
@section('page_title')
   Chat Settings 
@endsection

@section('title')
   Chat Settings
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item">Settings</li>
    <li class="breadcrumb-item active">Chat</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('settings.savechat',$id) }}" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Chat Icon Background</label>
                        <input name="docked_layout_icon_background" type="text" class="form-control" id="colorpicker-default" value="{{$settings->style->docked_layout_icon_background}}">
                    </div>
                    <div class="image-uploader" id="imgBg" >
                        <label class="mb-3" for="images">Docked Icon Close</label>
                        <input type="hidden" name="docked_layout_icon_close" class="upload_input" value="{{$settings->style->docked_layout_icon_close}}"  >
                        <input type="file" data-name="docked_layout_icon_close" data-plugins="dropify" data-type="image" data-default-file="{{$settings->style->docked_layout_icon_close}}" />
                     </div>
                    <div class="image-uploader" id="imgBg" >
                        <label class="mb-3" for="images">Docked Icon Open</label>
                        <input type="hidden" name="docked_layout_icon_open" class="upload_input" value="{{$settings->style->docked_layout_icon_open}}" >
                        <input type="file" data-name="docked_layout_icon_open" data-plugins="dropify" data-type="image" data-default-file="{{$settings->style->docked_layout_icon_open}}" />
                     </div>
                    <div class="form-group mb-3">
                        <label for="type">Video Calling</label>
                        <select class="form-control"  name="enable_video_calling" required>
                            <option @if($settings->main->enable_video_calling==="true"||$settings->main->enable_voice_calling===true) selected=true @endif  value=true>Enabled</option>
                            <option @if(!$settings->main->enable_video_calling==="false"||$settings->main->enable_voice_calling===false) selected=true @endif value=false>Disabled</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="type">Voice Calling</label>
                        <select class="form-control"  name="enable_voice_calling" required>
                            <option @if($settings->main->enable_voice_calling==="true"||$settings->main->enable_voice_calling===true) selected=true @endif  value=true>Enabled</option>
                            <option @if($settings->main->enable_voice_calling==="false"||$settings->main->enable_voice_calling===false) selected=true @endif value=false>Disabled</option>
                        </select>
                    </div>

                    <button class="btn btn-primary">Save</button>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')
@include("includes.scripts.fileUploader")

<script src="https://coderthemes.com/ubold/layouts/assets/libs/spectrum-colorpicker2/spectrum.min.js"></script>
<script src="https://coderthemes.com/ubold/layouts/assets/libs/clockpicker/bootstrap-clockpicker.min.js"></script>
<script >
    $(document).ready(function(){
        $("#colorpicker-default").spectrum();
    })
</script>
@endsection