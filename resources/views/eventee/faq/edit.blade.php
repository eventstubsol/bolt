@extends("layouts.admin")


@section('styles')
    @include("includes.styles.wyswyg")
    @include("includes.styles.datatables")
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <style>
        #eventData .slugInp{
            width: 85%;
            border: 1px solid grey;
            height: calc(1.5rem+ 0.9rem+ 2px);
            padding: 0.45rem 0.9rem;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.2rem;
        }
        #event_link{
            font-weight: 700;
            white-space: nowrap;
        }
    </style>
@endsection
@section('page_title')
   FREQUESTLY ASKED QUESTION(FAQ)  
@endsection

@section('title')
   EDIT FAQ
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item">FAQ</li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                
                    <form action="{{ route('eventee.faq.update',['id'=>$id,'faq_id'=>$faq->id]) }}" method="POST">
                        <div class="form-group">
                            <label for="Question">Question</label>
                            <input type="text" name="question" class="form-control" value="{{ $faq->question }}" required>
                        </div>
                        <div class="form-group">
                            <label for="answer">Answer</label>
                            <textarea name="answer" id="summernote-basic" class="form-control" cols="500" rows="1000">{{ $faq->answer }}</textarea>
                        </div>
                        <div class="form-group">
                            <span style="float: right"><button type="submit" class="btn btn-success">Update</button></span>
                        </div>
                    </form>
               
            </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')
@include("includes.scripts.wyswyg")
@endsection