@extends("layouts.admin")

@section("styles")
    @include("includes.styles.datatables")
    <style>
        .box{
            display: block;
            float: left;
            width: 25%;
            padding: 10px;
        }
        .box .show{
            width: 100%;

        }
        .box a{
            text-decoration: none;
            
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
                <a href="{{ route('eventee.media.create',$id) }}" class="btn btn-primary" style="float: right">Bulk Upload</a>
            </div>
            <div class="card-body">
                
                    @foreach($urls as $url)
                    <section class="box">
                        @if(isset($url))
                        @if($url->type == 'image')
                            <a href="javajavascript:void(0)"><img class="show" src="{{ assetUrl($url->url) }}"  width="100%" height="100%"></a>
                        @elseif($url->type == 'video')
                            <a href="javajavascript:void(0)"><video autoplay loop class="show" src="{{ assetUrl($url->url) }}" width="100%" height="100%"></video></a>
                        @endif
                        @endif
                    </section>
                @endforeach
                
            </div>
        </div>
    </div>
</div>

@endsection