@extends("layouts.admin")

@section("styles")
    @include("includes.styles.datatables")
    <style>
        .box{
            width: 24%;
            overflow: hidden;
            height: 150px;
            margin: 0 10px 10px 0;
            border-radius: 2px;
        }
        .box img{
            height: 150px;
            width: 100%;
            object-fit: cover;
        }
        .box a{
            text-decoration: none;
        }

        .nav-tabs .nav-link.active{
            background-color: #6658dd !important;
        }

        
    </style>
@endsection

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
            <div class="card-header d-flex">
                
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Images</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Videos</a>
                    </li>
                </ul>
            </div>
            
            <div class="card-body">
                
                
                
                

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card-title">
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('eventee.media.create',$id) }}" class="btn btn-primary">Bulk Upload</a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center flex-wrap">
                            @foreach($images as $url)
                            <section class="box">
                            @if(isset($url))
                                   
                                    <a href="javajavascript:void(0)" class="d-block"><img class="show" src="{{ assetUrl($url->url) }}"  width="100%" height="100%"></a>
                                   
                                    @endif
                                </section>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="card-title">
                            <div class="d-flex justify-content-end flex-wrap">
                                <a href="{{ route('eventee.media.createVideo',$id) }}" class="btn btn-primary">Bulk Upload</a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            @foreach($videoes as $url)
                                <section class="box">
                                @if(isset($url))
                                   
                                    <a href="javajavascript:void(0)" class="d-block"><video muted autoplay loop class="show" src="{{ assetUrl($url->url) }}" width="100%" height="100%"></video></a>
                                   
                                    @endif
                                </section>
                            @endforeach
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

@endsection