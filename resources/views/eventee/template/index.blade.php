@extends("layouts.admin")

@section("styles")
    @include("includes.styles.wyswyg");
@endsection

@section("page_title")
    Manage Template
@endsection

@section("title")
    Manage Template
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item active">Mail Template</li>
@endsection

@section("content")

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4><i class="fa fa-envelope" aria-hidden="true"></i> Registration Mail Template</h4>
            </div>
            <div class="card-body">
               <form action="{{ route('eventee.mail.template.post',$id) }}" method="POST">
                    <div class="form-group">
                        <label for="#subject">Subject</label>
                        <input type="text" id="subject" name="subject" class="form-control @error('subject') is-invalid @enderror" value="{{ $template->subject }}" placeholder="Please Enter A Subject">
                        @error('subject')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="subject">Message<span style="color:red">*</span></label>
                        <div class="card-header"> <a href="javascript: void(0);" id="user_name_set" class="btn btn-light" onclick="CopyUserName(this)">{user.name}</a> <a href="javascript: void(0);" id="user_email_set" class="btn btn-light" onclick="CopyEmail(this)">{user.email}</a></div>
                        <div class="alert alert-success" role="alert" style="display:none" id="successCopy">Copied Successfully</div>
                        <textarea name="message" id="summernote-basic" class="message form-control  @error('message') is-invalid @enderror" cols="500" rows="1000" >{{ $template->message }}</textarea>
                        @error('message')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
               </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    @include("includes.scripts.wyswyg");
    <script>
        function CopyUserName(e){
            let name = "{user.name}"
            navigator.clipboard.writeText(name);
            $('#user_name_set').removeClass('btn-light');
            $('#user_name_set').addClass('btn-success');
            $('#successCopy').show();
            setTimeout(function(){
                $('#successCopy').hide();
            }, 2000);
            if($('#user_email_set').hasClass('btn-success')){
                $('#user_email_set').addClass('btn-light');
                $('#user_email_set').removeClass('btn-success');
            }
        }
        function CopyEmail(e){
            let name = "{user.email}"
            navigator.clipboard.writeText(name);
            $('#user_email_set').removeClass('btn-light');
            $('#user_email_set').addClass('btn-success');
            $('#successCopy').show();
            setTimeout(function(){
                $('#successCopy').hide();
            }, 2000);
            if($('#user_name_set').hasClass('btn-success')){
                $('#user_name_set').addClass('btn-light');
                $('#user_name_set').removeClass('btn-success');
            }
        }
    </script>
@endsection