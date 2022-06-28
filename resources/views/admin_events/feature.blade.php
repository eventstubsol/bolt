@extends("layouts.admin")
{{-- @section('page_title')
    Events  
@endsection --}}

@section('title')
    Events Feature
@endsection

@section("styles")
@include("includes.styles.datatables")
<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet">
    <link href="{{asset('/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet">
    <link href="https://coderthemes.com/ubold/layouts/default/assets/css/config/default/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://coderthemes.com/ubold/layouts/default/assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />
    <link href="https://coderthemes.com/ubold/layouts/default/assets/libs/mohithg-switchery/switchery.min.css" rel="stylesheet" type="text/css" />
    <link href="https://coderthemes.com/ubold/layouts/default/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item active" ><a href="{{ route("admin.event.feature",$id) }}">Events Feature</a></li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Event Feature
            </div>
            <div class="card-body">
                <table id="datatable-buttons" class="table datatable   dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Menu</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($features as $feature)
                            <tr>
                                <td>{{ $feature->name }}</td>
                                <td>
                                    <div class="form-check form-switch">
                                    <input @if($feature->status === 1) checked @endif type="checkbox" data-id="{{ $feature->id }}" name="defaults_enabled[]"   class="form-check-input" value="@if($feature->status === 1) 1 @else 0 @endif" onchange="SetOptions(this)">
                                  
                                </div> </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection

@section("scripts")
@include("includes.scripts.datatables")
<script src="https://coderthemes.com/ubold/layouts/default/assets/libs/mohithg-switchery/switchery.min.js"></script>
    <script src="https://coderthemes.com/ubold/layouts/default/assets/js/vendor.min.js"></script>
    <script src="https://coderthemes.com/ubold/layouts/default/assets/libs/multiselect/js/jquery.multi-select.js"></script>
    <script src="https://coderthemes.com/ubold/layouts/default/assets/libs/selectize/js/standalone/selectize.min.js"></script>
    <script src="https://coderthemes.com/ubold/layouts/default/assets/libs/select2/js/select2.min.js"></script>
<script>
    function SetOptions(e){
        let val = e.value;
        let id = e.getAttribute('data-id');
        if(val == 0){
            e.value = 1;
            $.get("{{ route('admin.event.options') }}",{"id":id,'status':1},function(res){

                if(res.code == 200){
                    showMessage(res.message, "success");
                }
                else{
                    showMessage(res.message, "error");
                }
            });
        }
        else{
            e.value = 0;
            $.get("{{ route('admin.event.options') }}",{"id":id,'status':0},function(res){
                if(res.code == 200){
                    showMessage(res.message, "success");
                }
                else{
                    showMessage(res.message, "error");
                }
            });
        }
    }
</script>
@endsection