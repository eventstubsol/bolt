@extends("layouts.admin")

@section("page_title")
    Default Settings
@endsection



@section("title")
 Default Settings
@endsection

@section("styles")
    @include("includes.styles.wyswyg")
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
            <div class="card-header">  Privacy Policy    </div>
            <div class="card-body">
                <form method="POST" action="{{ route("eventee.settingsUpdate",['id'=>$id]) }}">
                    <label for="summernote-basic">Privacy Policy</label>
                    <textarea id="summernote-basic" name="tos">{{$event->privacypolicy}}</textarea>
                    <button type="submit"  class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section("scripts")
    @include("includes.scripts.wyswyg")


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
    </script>
@endsection