@extends("layouts.admin")

@section("page_title")
    Default Settings
@endsection



@section("title")
 Default Settings
@endsection

@section("styles")
    @include("includes.styles.wyswyg")
    <link rel="stylesheet" href="https://coderthemes.com/ubold/layouts/assets/libs/spectrum-colorpicker2/spectrum.min.css">
@endsection    

@section("content")
    
<div class="row">
    <div class="col-12">
        {{-- <div class="card">
            <div class="card-header"> <img width="150" src="https://www.google.com/recaptcha/about/images/reCAPTCHA-enterprise.png" class="img-fluid rounded-circle" alt="">   </div>
            <div class="card-body">
                <form method="POST" action="{{ route("eventee.integrationsUpdate",['id'=>$id]) }}">
                    {{ csrf_field() }}
                    <div class="form-group mb-3">
                        <label for="name">RECAPTCHA SITE KEY</label>
                        <input  autofocus type="text" value="{{ $envs['RECAPTCHA_SITE_KEY'] ?? '' }}"  name="RECAPTCHA_SITE_KEY" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">RECAPTCHA SECRET KEY</label>
                        <input  autofocus type="text" value="{{ $envs['RECAPTCHA_SECRET_KEY'] ?? '' }}" name="RECAPTCHA_SECRET_KEY" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div> --}}
        <div class="card">
            <div class="card-header">  Default Home Page    </div>
            <div class="card-body">
                <form method="POST" action="{{ route("eventee.settingsUpdate",['id'=>$id]) }}">
                    {{ csrf_field() }}
                   
                    <div class="form-group mb-3 col-md-4">
                        <label for="type">type</label>
                        <select required class="form-control type" data-index=""  name="type" >
                            @foreach(HOME_PAGE_TYPES as $type)
                                <option @if($event->home_type===$type) selected=true @endif  value="{{$type}}">{{$type}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div @if($event->home_type !== "page") style="display: none;" @endif  class="pages- pages form-group mb-3 col-md-4">
                        <label for="to">to(Page)</label>
                        <select     class="form-control" name="pages">
                            @foreach($pages as $page_to)
                                <option @if($event->home_page === 'page/'.$page_to->name) selected @endif value="{{$page_to->name}}">{{$page_to->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    
                    <div @if($event->home_type !=="session_room") style="display: none;" @endif class="room- room form-group mb-3 col-md-4">
                        <label for="to">to(Session Room)</label>
                        <select class="form-control" name="rooms" >
                            @foreach($session_rooms as $room)
                                <option @if($event->home_page  === 'sessionroom/'.$room->name) selected @endif value="{{$room->name}}">{{$room->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit"  class="btn btn-primary">Save</button>
                </form>

            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="card-title">Default Colors</div>
            </div>  
            <div class="card-body">
               <form action="{{ route('eventee.settingscolorUpdate',$id) }}" method="POST">
                    <div class="form-group mb-3 col-md-4">
                        <label for="primary Color">Primary Color</label>
                        <input type="text" name="primary_color" class="form-control colorpicker-default" value="{{ $event->primary_color }}">
                    </div>
                    <div class="form-group mb-3 col-md-4">
                        <label for="primary Color">Secondary Color</label>
                        <input type="text" name="secondary_color" class="form-control colorpicker-default" value="{{ $event->secondary_color }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
               </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header">  Privacy Policy    </div>
            <div class="card-body">
                <form method="POST" action="{{ route("eventee.settingsUpdate",['id'=>$id]) }}">
                    <label for="summernote-basic">Privacy Policy</label>
                    <textarea id="summernote-basic" name="tos">{{$event->privacypolicy}}</textarea>
                    <button type="submit"  class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header">  
                
                <div class="d-flex" >
                    <h5>Loaders</h5>    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="{{ route('eventee.loader.create',$id) }}" class="btn btn-primary float-right" >Add New Loader</a>
                </div>
            </div>

            <div class="card-body">
                @foreach ($loaders as $loader)
                    <div class="d-flex justify-content-between">
                        @if($loader->id == $event->def_loader)
                            <input name="laoder_id" type="radio" checked class="radioCheck form-check-input" onchange="radioCheck(this)" data-id="{{ $loader->id }}">
                            <div style="width:8rem;height:8rem;background:white;">
                                <img src="{{ assetUrl($loader->load_class) }}" alt="no" width="100%" height="100%">
                            </div>
                            
                        @else
                            <input name="laoder_id" type="radio" class="radioCheck form-check-input" onchange="radioCheck(this)" data-id="{{ $loader->id }}">
                            <div style="width:5rem;height:5rem;background:white;">
                                <img src="{{ assetUrl($loader->load_class) }}" alt="no" width="100%" height="100%" >
                            </div>
                        @endif
                
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section("scripts")
    @include("includes.scripts.wyswyg")
    <script src="https://coderthemes.com/ubold/layouts/assets/libs/spectrum-colorpicker2/spectrum.min.js"></script>
    <script src="https://coderthemes.com/ubold/layouts/assets/libs/clockpicker/bootstrap-clockpicker.min.js"></script>
    <script >
        $(document).ready(function(){
            $(".colorpicker-default").spectrum();
        })
    </script>

    <script>
        $(document).ready(function(){

            $(".type").on("change",toggleVisibility);
        });

        function toggleVisibility(e){
        
        const selectbox = $(e.target);
     
        
        $(".room").hide();
        $(".pages").hide();

        switch(selectbox.val()){
            case "session_room":
                $(".room").show();
                break;
            case "page":
                $(".pages").show();
                break;
        }
        // console.log(val);
    }
    function radioCheck(e){
        let loader_id = e.getAttribute('data-id');
        let event_id = "{{ $event->id }}";
        $.post("{{ route('eventee.loader.update') }}",{'loader_id':loader_id,'event_id':event_id},function(res){
            if(res.code == 200){
                showMessage(res.message,'success');
            }
            else{
                showMessage(res.message,'error');
            }
        });
    }
    </script>
@endsection