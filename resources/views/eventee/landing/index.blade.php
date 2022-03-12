@extends("layouts.admin")

@section('title')
    Landing Page Settings
@endsection

@section("styles")
    @include("includes.styles.datatables")
    @include("includes.styles.fileUploader")
    <link href="https://coderthemes.com/ubold/layouts/assets/css/config/default/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://coderthemes.com/ubold/layouts/assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />
    <link href="https://coderthemes.com/ubold/layouts/assets/libs/mohithg-switchery/switchery.min.css" rel="stylesheet" type="text/css" />
    <link href="https://coderthemes.com/ubold/layouts/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
   
@endsection

{{-- @section("page_title")
    Landing Page Settings
@endsection --}}

@section("breadcrumbs")
    <li class="breadcrumb-item active"><a href="{{ route("landing.settings",$id) }}">Landing Page Setting</a></li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
               <form action="{{ route('landing.settings.store',$id) }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="landId" value="{{ $landingPage->id }}">
                    <div class="form-group">
                        <div class="image-uploader" id="imgBg" >
                            <label class="mb-3" for="images">Banner Image</label>
                            <input type="hidden" name="bannerImage[]" class="upload_input"  value="{{ $landingPage->banner_image }}" >
                            <input type="file" data-name="bannerImagelogo" data-plugins="dropify" data-type="image" data-default-file={{  assetUrl($landingPage->banner_image) }} />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="image-uploader" id="imgBg" >
                            <label class="mb-3" for="images">First Overview Image</label>
                            <input type="hidden" name="first_logo[]" class="upload_input"  value="{{ $landingPage->first_logo }}" >
                            <input type="file" data-name="first_logo_img" data-plugins="dropify" data-type="image" data-default-file={{  assetUrl($landingPage->first_logo) }} />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="image-uploader" id="imgBg" >
                            <label class="mb-3" for="images">Second Overview Image</label>
                            <input type="hidden" name="second_logo[]" class="upload_input"  value="{{ $landingPage->second_logo }}" >
                            <input type="file" data-name="second_logo_img" data-plugins="dropify" data-type="image" data-default-file={{  assetUrl($landingPage->second_logo) }} />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Tagline</label>
                        <input type="text" class="form-control" name="tagline" @if($landingPage->tagline !== null) value="{{ $landingPage->tagline }}"  @endif>
                    </div>
                    <button type="submit" class="btn btn-success ml-2">Save</button>
               </form>
            </div>
        </div>
    </div>
</div>


<div class="row" >
    <div class="col-12">
        <div class="card">
            <div class="card-body form-check form-switch ml-3">
            @if($landingPage->speaker_status == 1)
                <input type="checkbox" value="1" class="setoption form-check-input" onchange="setopt(this)" checked>
                <label class="form-check-label" for="checkbox_id">Do You Want To Add Speakers?</label>
            @else
                <input type="checkbox" value="0" class="setoption form-check-input" onchange="setopt(this)">
                <label class="form-check-label" for="checkbox_id">Do You Want To Add Speakers?</label>
            @endif
            </div>
            <div class="card-body SetSpeakers" id="SetSpeakers">
                
                <form action="{{ route('landing.settings.speaker',['id'=>$id,'page_id'=>$landingPage->id]) }}" method="POST" enctype="multipart/form-data">
                    <div class="speakerAppend">
                        @if(count($speakers) > 0)
                            @foreach ($speakers as $speaker)
                            <div class="speakers">
                                <div class="form-group">
                                    <label for="text">Speakers</label>
                                    <select name="speaker[]" class="form-control">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}" <?php if($speaker->speaker_id == $user->id) echo 'selected'?>>{{ ($user->name).' ' .($user->last_name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="image-uploader" id="imgBg" >
                                        <label class="mb-3" for="images">Speaker's Image</label>
                                        <input type="hidden" name="speaker_img[]" class="upload_input"  value="{{ $speaker->image }}" >
                                        <input type="file" data-name="speaker_img_det" data-plugins="dropify" data-type="image" data-default-file={{  assetUrl($speaker->image) }} />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Designation</label>
                                    <input type="text" name="designation[]" class="form-control" value="{{ $speaker->designation }}">
                                </div>
                                <div>
                                    <button type="button" class="btn btn-danger mb-2" data-id="{{ $speaker->id }}" onclick="DeleteSpeaker(this)">Delete Speaker</button>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary" onclick="addSpeakerNew()">Add new speaker</button>
                        <button type="submit" class="btn btn-success ml-2">Save</button>
                    </div>
                </form>
               
            </div>
        </div>
    </div>
</div>

<div class="row" >
    <div class="col-12">
        <div class="card">
            <div class="card-body form-check form-switch ml-3">
                <div class="schedule">
                    @if($landingPage->schedule_status == 1)
                        <input type="checkbox" value="1" class="setoption form-check-input" onchange="setschedule(this)" checked>
                        <label class="form-check-label" for="checkbox_id">Do You Want Schedule Section?</label>
                    @else
                        <input type="checkbox" value="0" class="setoption form-check-input" onchange="setschedule(this)">
                        <label class="form-check-label" for="checkbox_id">Do You Want Schedule Section?</label>
                    @endif
                </div>
                <div class="registration mt-2">
                    @if($landingPage->registration_status == 1)
                        <input type="checkbox" value="1" class="setoption form-check-input" onchange="setreg(this)" checked>
                        <label class="form-check-label" for="checkbox_id">Do You Want Registration Section?</label>
                    @else
                        <input type="checkbox" value="0" class="setoption form-check-input" onchange="setreg(this)">
                        <label class="form-check-label" for="checkbox_id">Do You Want Registration Section?</label>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" >
    <div class="col-12">
        <div class="card">
            <div class="card-body form-check form-switch ml-3">
                
                @if($landingPage->section_status == 1)
                    <input type="checkbox" value="1" class="setoption form-check-input" onchange="setsection(this)" checked>
                    <label class="form-check-label" for="checkbox_id">Do You Want Sponsor Section?</label>
                @else
                    <input type="checkbox" value="0" class="setoption form-check-input" onchange="setsection(this)">
                    <label class="form-check-label" for="checkbox_id">Do You Want Sponsor Section?</label>
                @endif
                
            </div>
            <div class="card-body"  @if($landingPage->section_status == 0) style="display: none" @endif>
                <form action="{{ route('landing.settings.sponsor',$landingPage->id) }}" method="POST">

                    @if(count($sections) > 0)
                    
                    @foreach ($sections as  $n => $section)
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" class="form-control" name="title[]" value="{{ $section->section }}">
                        </div>
                        @if(($section->images()->count()) > 0)
                        <div class="imageAppend im-{{ $n }} row">
                            @foreach($section->images()->get() as $image)
                            
                                <div class="image-uploader col-md-4">
                                    <label class="mb-3" for="images">Sponsor Image
                                        <span style="color:red">*</span>
                                    </label>
                                    <input type="hidden" class="upload_input" name="url[{{ $n }}][]"  value="{{$image->url}}">
                                    <input accept="images/*"
                                        type="file"
                                        data-name="background"
                                        data-plugins="dropify"
                                        data-default-file={{assetUrl($image->url)}}
                                        data-type="image"/>
                              
                                </div>
                        
                            
                           @endforeach
                        </div>
                        <button type="button" class="btn btn-success mt-2" onclick="AddImage(this)" data-id="{{ $n }}">Add Image</button>
                        @endif
                    @endforeach

                @endif
                <div id="sponsor">

                </div>
                
                <div class="form-group">
                    <button type="button" class="btn btn-primary mt-4" onclick="AddSponsor()">Add Sponsor</button>
                    <button type="submit" class="btn btn-success mt-4">Save</button>
                </div>

                </form>
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    
</div>
@endsection

@section("scripts")
@include("includes.scripts.fileUploader")
<script src="https://coderthemes.com/ubold/layouts/assets/libs/mohithg-switchery/switchery.min.js"></script>
    <script src="https://coderthemes.com/ubold/layouts/assets/js/vendor.min.js"></script>
    <script src="https://coderthemes.com/ubold/layouts/assets/libs/multiselect/js/jquery.multi-select.js"></script>
    <script src="https://coderthemes.com/ubold/layouts/assets/libs/selectize/js/standalone/selectize.min.js"></script>
    <script src="https://coderthemes.com/ubold/layouts/assets/libs/select2/js/select2.min.js"></script>
<script>
    // $(document).ready(function(){
    let sections = {!!  json_encode($sections) !!};
    let n = (sections.length) - 1;
    function AddImage(e){
        let id = e.getAttribute('data-id');
        let appened = `<div class="image-uploader col-md-4" id="imgBg" >
                      <label class="mb-3" for="images">Sponsor Image
                        <span style="color:red">*</span>
                      </label>
                      <input type="hidden" name="url[${id}][]" class="upload_input" >
                      <input type="file" data-name="url" data-plugins="dropify" data-type="image"  />
                    </div>`;
        $('.im-'+id).append(appened);
        initializeFileUploads();
    }
    function AddSponsor(){
        n += 1;
        let appended = `<div class="parent2"><div class="form-group"><label for="">Title</label><input type="text" class="form-control" name="title[]"></div><div class="imageAppend im-${n} row"></div><button type="button" class="btn btn-success mt-2" onclick="AddImage(this)" data-id="${n}">Add Image</button></div>`;
        $('#sponsor').append(appended);
        
    }
   
    // });
    
</script>
<script>
    $(document).ready(function(){
        if($('.setoption').val() == 1){
            $('.SetSpeakers').show();
        }
        else{
            $('.SetSpeakers').hide();
        }
        
    });

</script>
<script>
    function setopt(e){
        if(e.value == 0){
            e.value = 1;
            $.get("{{ route('landing.settings.setStatus') }}",{'id':"{{ $landingPage->id }}",'status':1},function(res){
                console.log("updated successfully");
            });
            $('.SetSpeakers').show();
        }
        else{
            e.value = 0;
            $.get("{{ route('landing.settings.setStatus') }}",{'id':"{{ $landingPage->id }}",'status':0},function(res){
                console.log("updated successfully");
            });
            $('.SetSpeakers').hide();
        }
    }

    function setschedule(e){
        if(e.value == 0){
            e.value = 1;
            $.get("{{ route('landing.settings.schedule') }}",{'id':"{{ $landingPage->id }}",'status':1},function(res){
                showMessage("Enabled Successfully",'success');
            });
           
        }
        else{
            e.value = 0;
            $.get("{{ route('landing.settings.schedule') }}",{'id':"{{ $landingPage->id }}",'status':0},function(res){
                showMessage("Disabled Successfully",'success');
            });
           
        }
    }

    function setreg(e){
        if(e.value == 0){
            e.value = 1;
            $.get("{{ route('landing.settings.reg') }}",{'id':"{{ $landingPage->id }}",'status':1},function(res){
                showMessage("Enabled Successfully",'success');
            });
           
        }
        else{
            e.value = 0;
            $.get("{{ route('landing.settings.reg') }}",{'id':"{{ $landingPage->id }}",'status':0},function(res){
                showMessage("Disabled Successfully",'success');
            });
           
        }
    }

    function setsection(e){
        if(e.value == 0){
            e.value = 1;
            $.get("{{ route('landing.settings.section') }}",{'id':"{{ $landingPage->id }}",'status':1},function(res){
                showMessage("Enabled Successfully",'success');
            });
            $('#sponsor').show();
           
        }
        else{
            e.value = 0;
            $.get("{{ route('landing.settings.section') }}",{'id':"{{ $landingPage->id }}",'status':0},function(res){
                showMessage("Disabled Successfully",'success');
            });
            $('#sponsor').hide();
        }
    }
    
</script>
<script>
    function addSpeakerNew(){
        
        // var users = <?php echo json_encode($users); ?>;
        
        var appendable =  `<div class='form-group'><label for='text'>Speakers</label><select name='speaker[]' class='form-control speakerClass'> @foreach($users as $user)<option value="{{ $user->id }}" >{{ ($user->name).' ' .($user->last_name) }}</option>
                            @endforeach</select></div><div class='form-group'><div class='image-uploader' id='imgBg' ><label class='mb-3' for='images'>Speaker's Image</label><input type='hidden' name='speaker_img[]' class='upload_input'   ><input type='file' data-name='speaker_img_det' data-plugins='dropify' data-type='image'  /></div></div><div class='form-group'><label >Designation</label><input type='text' name='designation[]' class='form-control'></div>`;
        
        // alert(1);
        $('.speakerAppend').append(appendable);
        initializeFileUploads();
    }
</script>
<script>
    function DeleteSpeaker(e){
        var id = e.getAttribute('data-id');
        var close = e.closest(".speakers");
        confirmDelete("Are you sure you want to DELETE Speaker?","Confirm Speaker Delete").then(confirmation=>{
                if(confirmation){
                    
                    // var data = e.closest('tr');
                    $.get('{{ route("landing.speaker.delete") }}',{'id':id},function(res){
                        if(res.code == 200){
                            showMessage(res.message,'success');
                            close.remove();
                        }
                        else{
                            showMessage(res.message,'error');
                        }
                    });
                }
            });
    }
</script>
@endsection

