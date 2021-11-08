@extends("layouts.admin")


@section('styles')
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
    FAQ
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item active">FAQ</li>
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title"><i class="fas fa-question-circle"></i>&nbsp;&nbsp;FAQs</h3>
                <div class="float-right"><a href="{{ route('eventee.faq.create',$id) }}" class="btn btn-success">Create FAQ</a></div>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Question</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @if(count($faqs)>0)
                            @foreach ($faqs as $key =>$faq)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $faq->question }}</td>
                                    <td><a href="{{ route('eventee.faq.edit',['id'=>$id,'faq_id'=>$faq->id]) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a></td>
                                </tr>
                            @endforeach
                        @else
                                <tr>
                                    <td colspan="3"><center> No Data Available</center></td>
                                </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
