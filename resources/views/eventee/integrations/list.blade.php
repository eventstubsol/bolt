@extends("layouts.admin")

@section("page_title")
    Integrations
@endsection



@section("title")
   Integrations
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
            <div class="card-header"> <img width="150" src="https://developers.google.com/analytics/images/terms/logo_lockup_analytics_icon_horizontal_black_2x.png" class="img-fluid rounded-circle" alt="">   </div>
            <div class="card-body">
                <form method="POST" action="{{ route("eventee.integrationsUpdate",['id'=>$id]) }}">
                    {{ csrf_field() }}
                    <div class="form-group mb-3">
                        <label for="name">GA TRACKING ID</label>
                        <input  autofocus type="text" value="{{ $envs['GA_TRACKING_ID'] ?? '' }}"  name="GA_TRACKING_ID" class="form-control">
                    </div>
                    <button type="submit"  class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
        {{-- <div class="card">
            <div class="card-header"> <img width="150" src="https://www.pngfind.com/pngs/m/59-590228_capture-it-photobooth-b1-lora-alliance-logo-png.png" class="img-fluid rounded-circle" alt="">   </div>
            <div class="card-body">
                <form method="POST" action="{{ route("eventee.integrationsUpdate",['id'=>$id]) }}">
                    {{ csrf_field() }}
                    <div class="form-group mb-3">
                        <label for="name">Photobooth Gallery </label>
                        <input  autofocus type="text"  value="{{ $envs['photo_booth_gallery'] ?? '' }}" name="photo_booth_gallery" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Photobooth Capture </label>
                        <input  autofocus type="text" value="{{ $envs['photo_booth_capture'] ?? '' }}"  name="photo_booth_capture" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div> --}}
        <div class="card">
            <div class="card-header"> <img width="150" src="https://onlinechat.co.in/wp-content/uploads/2021/08/cometchat-logo-768x401-1.jpg" class="img-fluid rounded-circle" alt="">   </div>
            <div class="card-body">
                <form method="POST" action="{{ route("eventee.integrationsUpdate",['id'=>$id]) }}">
                    {{ csrf_field() }}
                    <div class="form-group mb-3">
                        <label for="name">COMET_CHAT_APP_ID </label>
                        <input  autofocus type="text"  value="{{ $envs['COMET_CHAT_APP_ID'] ?? '' }}" name="COMET_CHAT_APP_ID" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">COMET_CHAT_REGION </label>
                        <input  autofocus type="text"  value="{{ $envs['COMET_CHAT_REGION'] ?? '' }}" name="COMET_CHAT_REGION" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">COMET_CHAT_AUTH_KEY </label>
                        <input  autofocus type="text" value="{{ $envs['COMET_CHAT_AUTH_KEY'] ?? '' }}"  name="COMET_CHAT_AUTH_KEY" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">COMET_CHAT_API_KEY </label>
                        <input  autofocus type="text" value="{{ $envs['COMET_CHAT_API_KEY'] ?? '' }}"  name="COMET_CHAT_API_KEY" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">COMET_CHAT_WIDGET_ID </label>
                        <input  autofocus type="text" value="{{ $envs['COMET_CHAT_WIDGET_ID'] ?? '' }}"  name="COMET_CHAT_WIDGET_ID" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection