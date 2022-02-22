@extends("layouts.admin")


@section("styles")
    @include("includes.styles.fileUploader")
    @include("includes.styles.wyswyg")
@endsection

@section("page_title")
    Create Poll
@endsection

@section("title")
    Create Poll
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item"><a href="">Poll</a></li>
    <li class="breadcrumb-item active">Create</li>
@endsection

@section("content")
    <div class="row">
        <div class="col-12">
            <form action="{{ route("polls.store",$id) }}" method="post" data-parsley-validate="">
                @csrf
                <div class="card">
                    <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="question">Question</label>
                                <input autofocus type="text"  id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old("title") }}" required>
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="title">Options</label>
                                <input  placeholder="Enter Options" type="text" name="options" class="select_new selectize-close-btn select-${n}" value="">
                              
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="title">Select Group</label>
                                <select name="group" class="form-control">
                                    @foreach($groups as $group)
                                        <option value="{{$group->name}}">{{$group->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="title">Select Poll Leader</label>
                                <select name="user_id" class="form-control">
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->getFullName()}}</option>
                                    @endforeach
                                </select>
                            </div>

                            

                    </div>
                </div>


            <div class="card col-12">
                <button class="btn btn-primary m-3 submit">Create</button>
            </div>
            </form>
        </div>
    </div>


@endsection

@section("scripts")
    @include("includes.scripts.fileUploader")
    @include("includes.scripts.wyswyg")
    <script>
        function initSelect(){
            // console.log(".selectize-close-btn"+(n!==""?'-'+n:''));
            $(".select_new").selectize({plugins:["remove_button"],persist:!1,create:!0,render:{item:function(e,a){return'<div>"'+a(e.text)+'"</div>'}},onDelete:function(e){return confirm(1<e.length?"Are you sure you want to remove these "+e.length+" items?":'Are you sure you want to remove "'+e[0]+'"?')}})
            $(".select_new").removeClass("select_new");
        }    
        function addimage(e) {
            e.preventDefault();
            $(".image-section").append(`<div class="image-uploader mb-3 col-md-3">
                            <input type="hidden" class="upload_input " name="imageurl[]">
                            <input
                                    accept="images/*"
                                    type="file"
                                    data-name="imageurl"
                                    data-plugins="dropify"
                                    data-type="image"/>
                        </div>`);
            initializeFileUploads();
        }

        $(document).ready(function(){
            $("#add-image").on("click", addimage);
            initSelect();
        })
    </script>
@endsection