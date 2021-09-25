@php
$questions = App\LiveQuestion::where('view', 1)
    ->where('event_id',$event_id)
    ->orderBy('created_at', 'desc')
    ->get();
@endphp
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
<!--Main Modal-->
<div class="modal fade theme-modal" id="qna-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="display:flexbox;flex-direction:row;position: relative;">
                <div class="modal-title float-left" style="margin-left: 0">
                    <h3 style="font-weight: 800">Frequestly Asked Questions</h3>
                </div>
                <div class="options float-right" style="margin-right: 0;right:0%;margin-top:25px;float: right;">
                    <div style="font-size: 13px"><button type="button" class="btn btn-info"
                            style="padding: 10px 7px;border-radius:15px" onclick="createQna()">Ask New
                            Questions</button></div>
                    <div><a style="text-decoration: none;font-size:13px;padding:7px 5px;cursor: pointer;"
                            onclick="askedQues()">Your Questions</a></div>
                </div>
            </div>

            <div class="modal-body">
                @if (count($questions) < 1)
                    <div style="width: 100%;height:100%;align-items:center;justify-content:center">
                        <center><span style="font-weight: 600;padding:5px 5px;">No Question
                                Available</span><br><br><button type="button" class="btn btn-info"
                                style="padding: 10px 7px;border-radius:15px" onclick="createQna()">Ask New
                                Questions</button></center>
                    </div>
                @else
                    <table id="qna_table" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Author</th>
                                <th>Question</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($questions as $question)
                                @php
                                    $user = App\User::findOrFail($question->user_id);
                                @endphp

                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td onclick="showModal(this)" style="cursor: pointer" data-modal="qna"
                                        data-diss="{{ $question->discussion }}"
                                        data-question="{{ $question->question }}" data-id="{{ $question->id }}">
                                        {{ $question->question }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
            <div class="modal-footer">
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
                    <button onclick="retModal()" style="margin-bottom: 45px" class="btn btn-dark">Back</button>
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

<!--Create QNA-->
<div class="modal fade theme-modal" id="create-qna-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="display:flexbox;flex-direction:row;position: relative;">
                <div class="modal-title float-left" style="margin-left: 0">
                    <h3 style="font-weight: 800">Create New Question</h3>
                </div>
                <div class="options float-right" style="margin-right: 0;right:0%;margin-top:25px;float: right;">
                    <button onclick="NewModal()" class="btn btn-dark">Back</button>
                </div>
            </div>

            <div class="modal-body">
                <div class="card mt-4">

                    <div class="card-body" id="Answer">
                        <div class="form-group">
                            <label for="question">Question</label>
                            <input type="text" class="form-control" id="question">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="submitQuestion()" class="btn btn-success">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!--User QNA-->
<div class="modal fade theme-modal" id="user-qna-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="display:flexbox;flex-direction:row;position: relative;">
                <div class="modal-title float-left" style="margin-left: 0">
                    <h3 style="font-weight: 800">Asked Questions</h3>
                </div>
                <div class="options float-right" style="margin-right: 0;right:0%;margin-top:25px;float: right;">
                    <button onclick="UserBack()" style="margin-bottom: 45px" class="btn btn-dark">Back</button>
                </div>
            </div>

            <div class="modal-body">
                @php
                    $userQuestion = App\LiveQuestion::where('user_id', Auth::id())
                        ->orderBy('id', 'desc')
                        ->get();
                @endphp
                @if (count($userQuestion) < 1)
                    <div style="width: 100%;height:100%;align-items:center;justify-content:center">
                        <center><span style="font-weight: 600;padding:5px 5px;">No Question
                                Available</span><br><br><button type="button" class="btn btn-info"
                                style="padding: 10px 7px;border-radius:15px" onclick="createQna()">Ask New
                                Questions</button></center>
                    </div>
                @else
                    <table id="qna_table" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>

                                <th width="80%">Question</th>
                                <th width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($userQuestion as $question)

                                <tr>
                                    <td onclick="showModal(this)" style="cursor: pointer"
                                        data-question="{{ $question->question }}"
                                        data-diss="{{ $question->discussion }}" data-modal="user"
                                        data-id="{{ $question->id }}">{{ $question->question }}</td>
                                    <td style="padding: 5px;align-items:center">
                                        <center>
                                            <button type="button" class="btn btn-info" onclick="EditQuestion(this)"
                                                data-id="{{ $question->id }}">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger" onclick="liveDelete(this)"
                                                data-id="{{ $question->id }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </center>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!--Edit QNA-->
<div class="modal fade theme-modal" id="edit-qna-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="display:flexbox;flex-direction:row;position: relative;">
                <div class="modal-title float-left" style="margin-left: 0">
                    <h3 style="font-weight: 800">Edit Question</h3>
                </div>
                <div class="options float-right" style="margin-right: 0;right:0%;margin-top:25px;float: right;">
                    <button onclick="EditBackModal()" class="btn btn-dark">Back</button>
                </div>
            </div>

            <div class="modal-body">
                <div class="card mt-4">

                    <div class="card-body" id="Answer">
                        <div class="form-group">
                            <label for="question">Question</label>
                            <input type="hidden" id="quesId">
                            <input type="text" class="form-control" id="editquestion">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="submitEditQuestion()" class="btn btn-success">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="liveDeleteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Are You Sure?</strong></p>
                <input type="hidden" id="deleteId">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" onclick="confirmDeleteModal()">Delete</button>
            </div>
        </div>
    </div>
</div>

<!--Answer Live-->
<div class="modal fade theme-modal" id="answerLive-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="display:flexbox;flex-direction:row;position: relative;">
                <div class="modal-title float-left" style="margin-left: 0">
                    <h3 style="font-weight: 800" id="modalLiveQuestion"></h3>
                </div>
                <div class="options float-right" style="margin-right: 0;right:0%;margin-top:25px;float: right;">
                    <button onclick="LiveBack()" class="btn btn-dark">Back</button>
                </div>
            </div>

            <div class="modal-body">
                <div class="card mt-4">

                    <div class="card-body" id="Answer">
                        <div class="form-group">
                            <label for="question">Please Give Suitable Answer</label>
                            <input type="hidden" id="liveQuestionId">
                            <input type="text" class="form-control" id="liveAns">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="submitAns()" class="btn btn-success">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    var cur = '';

    function createQna() {
        $('#qna-modal').modal('toggle');
        $('#create-qna-modal').modal('toggle');
    }

    function NewModal() {
        $('#qna-modal').modal('toggle');
        $('#create-qna-modal').modal('toggle');
    }

    function askedQues() {
        $('#qna-modal').modal('toggle');
        $('#user-qna-modal').modal('toggle');

    }

    function UserBack() {
        $('#qna-modal').modal('toggle');
        $('#user-qna-modal').modal('toggle');
    }

    function showModal(event) {
        $('#auth').empty();
        $('#questionDet').empty();
        $('#discuss').empty();
        var questionId = event.getAttribute('data-id');
        var mod = event.getAttribute('data-modal');
        var question = event.getAttribute('data-question');
        var discuss = event.getAttribute('data-diss');
        if (discuss == 1) {
            
            $('#discuss').append('<button type="button" class="btn btn-primary" data-dismiss="modal" data-question="' +
                question + '" data-id="' + questionId +
                '" onclick="AnswerLive(this)">Answer</button><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>'
            );
        } else {
            
            $('#discuss').append('<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>');
        }
        $('#questionDet').html('<strong>' + question + '</strong>');
        cur = mod;
        $.get("{{ route('qna.Show') }}", {
            'id': questionId
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
                            '<div class="card mt-4"><div class="card-header" style="display: flex;flex-direction:column"> <span style="float:right">Answerd By: ' +
                            value.author +
                            '</span> </div><div class="card-body"><b>Solution:</b><br> ' + value
                            .answer +
                            ' <i class="fa fa-check-circle" aria-hidden="true" style="color:green"></i></div></div>'
                            );
                    } else {
                        $('#auth').append(
                            '<div class="card mt-4"><div class="card-header" style="display: flex;flex-direction:column">  <span style="float:right">Answerd By: ' +
                            value.author +
                            '</span> </div><div class="card-body"><b>Solution:</b><br> ' + value
                            .answer + '</div></div>');
                    }
                }
            });



        });
        $('#qna-modal').modal('hide');
        $('#user-qna-modal').modal('hide');
        $('#liveanswer-modal').modal('toggle');
    }




    function submitQuestion() {
        var question = $('#question').val();
        var event_id = "{{ $event_id }}";
        alert(event_id);
        $.get("{{ route('qna.Save') }}", {
            'question': question,
            'event_id' : event_id,
        }, function(result) {

            if (result.status == 200) {
                console.log(result.message);
                location.reload();
            } else {
                alert(result.message);
            }
        });
    }

    function retModal() {
        if (cur == 'user') {
            $('#user-qna-modal').modal('toggle');
            $('#liveanswer-modal').modal('toggle');
            // alert(1);
        } else if (cur == 'qna') {
            $('#liveanswer-modal').modal('toggle');
            $('#qna-modal').modal('toggle');
        }
    }
</script>

<script>
    function EditQuestion(event) {

        var questionId = event.getAttribute('data-id');
        $('#user-qna-modal').modal('toggle');
        $('#edit-qna-modal').modal('toggle');
        $.get("{{ route('qna.Edit') }}", {
            'id': questionId
        }, function(result) {
            $('#editquestion').val(result.question);
            $('#quesId').val(result.id);
        });
    }

    function EditBackModal() {
        $('#user-qna-modal').modal('toggle');
        $('#edit-qna-modal').modal('toggle');
    }

    function submitEditQuestion() {
        var id = $('#quesId').val();
        var question = $('#editquestion').val();
        $.get("{{ route('qna.Update') }}", {
            'id': id,
            'question': question
        }, function(result) {
            if (result.status == 200) {
                console.log(result.message);
                location.reload();

            } else {
                alert(result.message);
            }
        });
    }

    //Delete Question
    function liveDelete(e) {
        var id = e.getAttribute('data-id');
        $('#user-qna-modal').modal('toggle');
        $('#liveDeleteModal').modal('toggle');
        $('#deleteId').val(id);
    }

    function confirmDeleteModal() {
        var id = $('#deleteId').val();
        $.get("{{ route('qna.Delete') }}", {
            'id': id
        }, function(result) {
            if(result.status == 404){
                alert(result.message);
                $('#liveDeleteModal').modal('toggle');
            }
            else if (result.status == 200) {
                console.log(result.message);
                location.reload();

            } else {
                alert(result.message);
            }
        });
    }

    function AnswerLive(e) {
        var questionId = e.getAttribute('data-id');
        var question = e.getAttribute('data-question');
        $('#modalLiveQuestion').html('<b>' + question + '</b>');
        $('#liveQuestionId').val(questionId);
        $('#answerLive-modal').modal('toggle');
        $('#liveanswer-modal').modal('toggle');
    }

    function LiveBack() {
        $('#answerLive-modal').modal('toggle');
        $('#liveanswer-modal').modal('toggle');
    }

    function submitAns() {
        var questionId = $('#liveQuestionId').val();
        var answer = $('#liveAns').val();
        $.get("{{ route('qna.Answer') }}", {
            'id': questionId,
            'answer': answer
        }, function(result) {
            if (result.status == 200) {
                console.log(result.message);
                location.reload();

            } else {
                alert(result.message);
            }
        });
    }
</script>
