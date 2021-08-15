@extends("layouts.admin")
@section('styles')
    @include("includes.styles.datatables")
@endsection

@section('page_title')
    Manage Q&A
@endsection

@section('title')
    Manage Q&A
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item active">QnA</li>
@endsection

<style>
    .card-header {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }

</style>

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Questions</h3>
                </div>
                <div class="card-body">
                    <table id="datatable-buttons"
                        class="table datatable table-striped table-hover dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Questions</th>
                                <th>Asked By</th>
                                <th>Answers</th>
                                <th>Answer</th>
                                <th>View</th>
                                <th>Discussion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($questions as $key => $question)
                                <tr>
                                    <td data-id="{{ $question->id }}" data-question="{{ $question->question }}"
                                        style="cursor:pointer" onclick="ShowAnswer(this)"><b>{{ $question->question }}</b></td>
                                    @php
                                        $user = App\User::findOrFail($question->user_id);
                                    @endphp
                                    <td>{{ $user->name }}</td>
                                    @php
                                        $answerCount = App\LiveAnswer::where('question_id', $question->id)->count();
                                    @endphp
                                    <td>{{ $answerCount }}</td>
                                    <td>
                                        <button class="btn btn-primary" onclick="AnswerModal(this)" data-id="{{ $question->id }}" data-question="{{ $question->question }}">
                                            <i class="fa fa-reply"></i>
                                        </button>
                                    </td>
                                    <td>
                                        @if($question->view == 1)
                                            <input type="checkbox" data-id="{{ $question->id }}" data-view="{{ $question->view }}" onclick="viewChecked(this)" checked>
                                        @else
                                            <input type="checkbox" data-id="{{ $question->id }}" data-view="{{ $question->view }}" onclick="viewChecked(this)">
                                        @endif
                                    </td>
                                    <td>
                                        @if($question->discussion == 1)
                                            <input type="checkbox" data-id="{{ $question->id }}" data-discuss="{{ $question->discussion }}" onclick="discussionCheck(this)" checked>
                                        @else
                                            <input type="checkbox" data-id="{{ $question->id }}" data-discuss="{{ $question->discussion }}" onclick="discussionCheck(this)">
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><center>{{ $questions->links() }}</center></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
<!--Answer Live-->
<div class="modal fade theme-modal" id="answerLive-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="display:flexbox;flex-direction:row;position: relative;">
                <div class="modal-title float-left" style="margin-left: 0;margin-top:0">
                    <h3 style="font-weight: 800" id="modalLiveQuestion"></h3>
                </div>
            </div>
            <hr style="width:100%;text-align:left;margin-left:0;border:1px solid grey">
            <div class="modal-body" style="top:0">
                <div class="card mt-4">

                    <div class="card-body" id="Answer">
                        <div class="form-group">
                            <label for="question"><b>Please Give Suitable Answer</b></label>
                            <input type="hidden" id="liveQuestionId">
                            <input type="text" class="form-control" id="liveAns">
                        </div>
                    </div>
                </div>
            </div>
            <hr style="width:100%;text-align:left;margin-left:0;border:1px solid grey">
            <div class="modal-footer">
                <button type="button" onclick="submitAns()" class="btn btn-success">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!--Answers Modal-->
<div class="modal fade theme-modal" id="liveanswer-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="display:flexbox;flex-direction:row;position: relative;">
                <div class="modal-title float-left" style="margin-left: 0">
                    <h3 style="font-weight: 800" id="questionDet"></h3>
                </div>
                <div class="options float-right" style="margin-right: 0;right:0%;margin-top:25px;float: right;">

                </div>
            </div>

            <div class="modal-body" id="auth" style=" overflow-y: scroll;height:500px">


            </div>
            <div class="modal-footer" id="discuss">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

    <script>
        //Update View Status
        function viewChecked(e){
            var id = e.getAttribute('data-id');
            var view = e.getAttribute('data-view');
            var viewValue = 0;
            if(view == 0){
                viewValue = 1;
            }
            else{
                viewValue = 0;
            }
            $.get("{{ route('admin.qna.view') }}",{'id':id,'view':viewValue},function(result){
                if(result.status == 200){
                    console.log(result.message);
                }
                else{
                    alert(result.message);
                }
            });
        }
        //Update Discussion Status
        function discussionCheck(e){
            var id = e.getAttribute('data-id');
            var discussion = e.getAttribute('data-discuss');
            var discuss = 0;
            if(discussion == 0){
                discuss = 1;
            }
            else{
                discuss = 0;
            }
            $.get("{{ route('admin.qna.discussion') }}",{'id':id,'discussion':discuss},function(result){
                if(result.status == 200){
                    console.log(result.message);
                }
                else{
                    alert(result.message);
                }
            });
        }
        //Reply Modal
            function AnswerModal(e){
                var id = e.getAttribute('data-id');
                var question = e.getAttribute('data-question');
                $('#answerLive-modal').modal('toggle');
                $('#modalLiveQuestion').html('<b>'+ question +'</b>');
                $('#liveQuestionId').val(id);
            }
        //submit Answer
            function submitAns(){
                var id = $('#liveQuestionId').val();
                var answer = $('#liveAns').val();
                $.get("{{ route('admin.qna.answer') }}",{'id':id,'answer':answer},function(result){
                                if(result.status == 200){
                                    alert(result.message);
                                    location.reload();
                                }
                                else{
                                    alert(result.message);
                                }
                            });
                        }

                        //Show Answer
                            function ShowAnswer(e){
                                
                                var id = e.getAttribute('data-id');
                                var question = e.getAttribute('data-question');
                                $('#liveanswer-modal').modal('toggle');
                                $('#questionDet').html('<b>'+ question +'</b>');
                                $.get("{{ route('admin.qna.getAnswer') }}", {
                        'id': id
                    }, function(result) {
                        // console.log(result);
                        var countSize = result.length;
                        var i = 0;
                        $.each(result, function(key, value) {
                            if (value.answer == null) {
                                $('#auth').html(
                                    '<div class="card mt-4" style="bottom:50px;"><div class="card-header" style="display: flex;flex-direction:column"> <span style="float:right">Answerd By:None</span> </div><div class="card-body"><b>Solution:</b><br> <strong>Not Answerd Yet</strong></div></div>'
                                )

                            } else if (value.answer != null) {
                                if (value.best == 1) {
                                    $('#auth').append(
                                        '<div class="card mt-4"><div class="card-header" style="display: flex;flex-direction:column"><div class="d-flex justify-content-between align-items-center"><div>Answerd By: ' +
                                        value.author +
                                        '</div><div class="col-md-2 float-right"> </div></div></div><div class="card-body"><b>Solution:</b><br> ' + value
                                        .answer +
                                        ' <i class="fa fa-check-circle" aria-hidden="true" style="color:green"></i></div></div>'
                                        );
                                } else {
                                    $('#auth').append(
                                        '<div class="card mt-4"><div class="card-header" style="display: flex;flex-direction:column"><div class="d-flex justify-content-between align-items-center"><div>Answerd By: ' +
                                        value.author +
                                        '</div><div class="col-md-2 float-right"><button class="btn btn-info" data-id="'+value.id+'" data-best="'+value.best+'" onclick="BestAnswer(this)">Best Answer</button> </div></div></div><div class="card-body"><b>Solution:</b><br> ' + value
                                        .answer +
                                        '</div></div>');
                                }
                            }
                        });
                    });
                }

                function BestAnswer(e){
                    var id = e.getAttribute('data-id');
                    var best = e.getAttribute('data-best');
                    $.get("{{ route('admin.qna.BestAnswer') }}",{'id':id,'best':best},function(result){
                        if(result.status == 200){
                            alert(result.message);
                            location.reload();
                        }
                        else{
                            alert(result.message);
                        }
                    });
                    
                }
    </script>
    

@endsection