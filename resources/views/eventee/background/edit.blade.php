@extends("layouts.admin")

@section('title')
   Edit Background
@endsection

@section("styles")
    @include("includes.styles.datatables")
@endsection

@section("page_title")
    Edit Background  
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item active"><a href="{{ route("eventee.background",$id) }}">Background</a></li>
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route("eventee.background.update",['id'=>$id,'back_id'=>$back_id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @php
                            $menus = App\Menu::where('event_id',decrypt($id))->get();
                    @endphp
                    <div class="form-group mb-3">
                        <label for="message">Select Menu</label>
                        
                        <select name="menu" class="form-control">
                            <option value="0" disabled>Select One</option>
                            @foreach($menus as $menu)
                                <option value="{{ $menu->id }}" <?php if($menu->id == $background->menu_id){ echo 'selected'; } ?>>{{ $menu->name }}</option>
                            @endforeach
                        </select>
                        @error('message')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <img src="{{ asset($background->location) }}" width="500px" height="300px">
                    </div>
                    <div class="form-group mb-3">
                        <label for="message">Select Image</label>
                        
                        <input type="file" name="image" class="form-control" value="{{ old('image') }}">
                        @error('message')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>

@endsection