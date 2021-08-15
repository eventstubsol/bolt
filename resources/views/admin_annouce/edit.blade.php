@extends("layouts.admin")
@section('styles')
    @include("includes.styles.datatables")
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('page_title')
    Manage Announcements
@endsection

@section('title')
    Manage Announcements    
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item active">Announcements &nbsp;> &nbsp;Edit</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title"><i class="fa fa-bullhorn" aria-hidden="true"></i>&nbsp;Announcements Edit</h3>
                <div class="float-right"><a href="{{ route('admin.announce') }}" class="btn btn-dark">Back</a></div>
            </div>
            <form action="{{ route('admin.announce.update') }}" method="post">
                @csrf
            <div class="card-body">
                <input type="hidden" name="id" value="{{ $announce->id }}">
                <div class="form-group">
                    <label for="question">Subject</label>
                    <input type="text" class="form-control" name="anncounce" value="{{ $announce->subject }}" required>
                </div>
                <div class="form-group">
                    <label for="question">Announcement</label>
                    <textarea class="form-control" name="anncounce" id="announce"  required>{{ $announce->annoucement }}</textarea>
                </div>
                <div class="form-group">
                    <label for="question">Send To</label>
                    <select class="form-control" name="user_id" required>
                        <option value="all">All</option>
                        @foreach(App\User::where('type','attendee')->get() as  $user)
                            <option value="{{ $user->id }}" <?php if($announce->user_id == $user->id){echo 'selected';} ?>>{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right">Save</button>
            
            </div>
        </form>
        </div>
    </div>
</div>
@endsection


@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function(){
      $('#announce').summernote({
          height: 200,
          toolbar: [
      // [groupName, [list of button]]
      ['style', ['bold', 'italic', 'underline', 'clear']],
      ['link'],
    ]
      });
    });
  </script>

@endsection