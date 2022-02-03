@extends("layouts.admin")

@section("page_title")
Edit Lounge
@endsection


@section("title")
Edit Lounge
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item"><a href="{{ route("eventee.lounge.index",['id'=>$id]) }}">Sessions</a></li>
    <li class="breadcrumb-item active">Update</li>
@endsection
@section('styles')
@include("includes.styles.fileUploader")
@endsection
@section("content")
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route("eventee.lounge.update",['table'=>$table->id,'id'=>$id]) }}" method="post">
                    {{ csrf_field() }}
                    @method("PUT")

                    <!-- Session Name -->
                    <div class="form-group mb-3">
                        <label for="name">Title
                            <span style="color:red">*</span>
                        </label>
                        <input required autofocus type="text"  id="name" value="{{$table->name}}" name="name" class="form-control   @error('name') is-invalid @enderror">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                   
                    <!-- Number of Participants   -->

                    <div class="form-group mb-3">
                        
                        <label>Number of Seats
                            <span style="color:red">*</span>
                        </label>
                        <select name="seats" class="form-control @error('seats') is-invalid @enderror">
                            @switch($table->seats)
                                @case(2)
                                    <option value="2" checked>2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="16">16 (Grand Table)</option>
                                @break
                                @case(3)
                                    <option value="2">2</option>
                                    <option value="3" checked>3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="16">16 (Grand Table)</option>
                                @break
                                @case(4)
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4" checked>4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="16">16 (Grand Table)</option>
                                @break
                                @case(5)
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5" checked>5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="16">16 (Grand Table)</option>
                                @break
                                @case(6)
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6" checked>6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="16">16 (Grand Table)</option>
                                @break
                                @case(7)
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7" checked>7</option>
                                    <option value="8">8</option>
                                    <option value="16">16 (Grand Table)</option>
                                @break
                                @case(16)
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="16" checked>16 (Grand Table)</option>
                                @break      
                                @default
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7" >7</option>
                                    <option value="8" checked>8</option> 
                                    <option value="16">16 (Grand Table)</option>
                                                     
                            @endswitch
                        </select>
                        @error('seats')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="image-uploader" id="imgBg" >
                            <label class="mb-3" for="images">Logo <small style="color:red"><b>(Optional)</b></small></label>
                            <input type="hidden" name="logo_url" class="upload_input"  value="{{ $table->logo }}" >
                            <input type="file" data-name="logo" data-plugins="dropify" data-type="image" data-default-file={{  assetUrl($table->logo) }} />
                        </div>
                    </div>

                    <div>
                        <input class="btn btn-primary" type="submit" id="create_session" value="Update" />
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@include("includes.scripts.fileUploader")
@endsection
