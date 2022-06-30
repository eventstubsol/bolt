@extends('layouts.admin')

@section('styles')
    @include('includes.styles.datatables')
    @include('includes.styles.wyswyg')
    <style>
        .hidden {
            display: none;
        }

        .checkbox+.switchbox {
            background-color: #e74c3c;
            border: 1px solid #ccc;
            border-radius: 20px;
            cursor: pointer;
            display: inline-block;
            height: 20px;
            overflow: hidden;
            position: relative;
            width: 40px;
        }

        .checkbox+.switchbox:after {
            background-color: #fff;
            border-radius: 10px;
            content: " ";
            display: block;
            height: 20px;
            position: absolute;
            right: 50%;
            transition: all 0.1s linear;
            width: 50%;
        }

        .checkbox:checked+.switchbox {
            background-color: #2ecc71;
        }

        .checkbox:checked+.switchbox:after {
            right: 0%;
        }

        .label {
            display: flex;
            column-gap: 20px;
        }

        .correct_checkbox_container {
            display: none;
        }

    </style>
@endsection

@section('page_title')
    Edit Poll
@endsection

@section('title')
    Edit Poll
@endsection
@section('breadcrumbs')
    <li class="breadcrumb-item "><a href="{{ route('polls.manage', ['id' => $id]) }}">Form</a></li>
    <li class="breadcrumb-item active">Create</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ route('eventee.polls.update', ['id' => $id,'poll'=>$poll->id]) }}" method="post">
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            <div class="form-group mb-3 col-md-12">
                                <label for="name">Poll Name
                                    <span style="color:red">*</span>
                                </label>
                                <input autofocus value="{{$poll->name}}" type="text" name="name" class="form-control">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class=" room form-group mb-3 col-md-4">
                                <label for="to">Location</label>
                                <select id="location" class="form-control" name="location">
                                    <option @if($poll->location_type ==="all")selected @endif value="all">Entire Event</option>
                                    <option @if($poll->location_type ==="page")selected @endif value="page">Event Room/Page</option>
                                    <option @if($poll->location_type ==="sessionroom")selected @endif value="sessionroom">Session Room</option>
                                </select>
                            </div>
                            <div style="display: none" id="pageSelect" class=" pages form-group mb-3 col-md-4">
                                <label for="to">to(Page)</label>
                                <select value=" " class="form-control" name="pages">
                                    <option  value=" ">Select Page to Redirect to</option>
                                    @foreach ($pages as $page_to)
                                        <option @if($poll->location === $page_to) selected @endif value="{{ $page_to->name }}">{{ $page_to->name }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div style="display: none;" id="roomSelect" class=" room form-group mb-3 col-md-4">
                                <label for="to">to(Session Room)</label>
                                <select value=" " class="form-control" name="rooms">
                                    <option  value=" ">Select Session Room</option>
                                    @foreach ($session_rooms as $room)
                                        <option @if($poll->location === $room) selected @endif value="{{ $room->name }}">{{ $room->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <h2>Poll Questions</h2>
                <button class="btn btn-primary mb-3" id="add_question">Add Question</button>
                <div class="allquestions">
                    @foreach ($poll->questions as $idx=> $question)
                        <div class="card qs-{{$idx}}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group mb-3 col-md-6">
                                        <label for="question">{{$question->question}}
                                            <span style="color:red">*</span>
                                        </label>
                                        <input autofocus type="text" id="question" value="{{$question->question}}" name="question[]" class="form-control">
                                        @error('question')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class=" room form-group mb-3 col-md-4">
                                        <label for="to">Type</label>
                                        <select data-id="0" id="question_type-0" class="form-control changeType"
                                            name="question_type[]">
                                            <option value="poll">POLL</option>
                                            <option @if(isset($question->correct_ans)) selected @endif value="mcq">MCQ</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="allanswers-{{$idx}}" data-test="{{$question->id}}">
                                    @foreach ($question->options as $jdx=> $option)
                                        <div class="form-group mb-3">
                                            <div class="label">
                                                <div class="correct_checkbox_container cb-{{$idx}}" @if(isset($question->correct_ans)) style="display: block;"@endif>
                                                    <input type="radio"  name="correct_ans[{{$idx}}]" id="checkbox-{{$idx}}-{{$jdx}}"  @if($question->correct_ans ===$option->id) checked  @endif value="{{$jdx}}"
                                                        class=" checkbox hidden   m-0">
                                                    <label class="switchbox m-0" for="checkbox-{{$idx}}-{{$jdx}}"></label>
                                                </div>
                                                <label for="name">{{$option->answer}}</label>
                                            </div>
                                            <input type="text" value="{{$option->answer}}" name="ans[{{$idx}}][]" class="form-control answers-0 ">
                                        </div>
                                    @endforeach

                                </div>

                                <button class="btn btn-primary add_ans" data-id="{{$idx}}" >Add Answer</button>
                                <button class="submit btn btn-danger delete_qs" data-id="{{$idx}}" >Delete Question</button>
                            </div>
                        </div>
                    @endforeach
                   
                </div>
                <button class="btn btn-primary">Save</button>
                             
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    @include('includes.scripts.wyswyg')
    <script>
        function DeleteQs(e) {
           e.preventDefault();
           console.log(e)
           let id = e.target.getAttribute("data-id");

           
            confirmDelete("Are you sure you want to DELETE poll?", "Confirm poll Delete").then(confirmation => {
                if (confirmation) {
                    $(".qs-"+id).remove();
                }
            });

        }
        $(document).ready(() => {
            // Location Select Listner
            locationListener();
            $(".delete_qs").unbind().on("click",DeleteQs);

            $(".add_ans").on("click", addAnswer)

            $(".changeType").on("change", changeQuestionType);

            $("#add_question").on("click", addQuestion);
        })

        function changeQuestionType(e) {
            let id = $(e.target).data("id");
            // console.log(e.target.value);
            if (e.target.value == "mcq") {
                $(".cb-" + id).show()
            } else {
                $(".cb-" + id).hide()

            }
        }

        function locationListener() {
            $("#location").on("change", function() {
                if (this.value === "page") {
                    $("#pageSelect").show();
                    $("#roomSelect").hide();
                } else if (this.value === "sessionroom") {
                    $("#pageSelect").hide();
                    $("#roomSelect").show();
                } else {
                    $("#pageSelect").hide();
                    $("#roomSelect").hide();

                }
            });
        }

        function addAnswer(e) {
            e.preventDefault();
            var id = $(e.target).data("id");
            var type = $("#question_type-" + id).val();
            var n = $(".answers-" + id).length;
            console.log({
                id,
                type,
                n
            });
            if (type == "mcq") {

                $("#allanswers-" + id).append(` 
                    <div class="form-group mb-3">
                        <div class="label">

                            <div class=" cb-${id}">
                                <input type="radio" name="correct_ans[${id}]" id="checkbox${id}-${n+1}" value="2"  class=" checkbox hidden  m-0">
                                <label class="switchbox m-0" for="checkbox${id}-${n+1}"></label>
                                </div>
                                <label for="name">Option ${n+1}</label>
                            </div>
                            <input autofocus type="text"   name="ans[${id}][]" class="form-control answers-${id} ">
                    </div>
                `);
            } else {
                $("#allanswers-" + id).append(` 
                    <div class="form-group mb-3">
                        <div class="label">

                            <div class="correct_checkbox_container cb-${id}">
                                <input type="radio" name="correct_ans[${id}]" id="checkbox${id}-${n+1}" value="2"  class=" checkbox hidden  m-0">
                                <label class="switchbox m-0" for="checkbox${id}-${n+1}"></label>
                                </div>
                                <label for="name">Option ${n+1}</label>
                            </div>
                            <input autofocus type="text"   name="ans[${id}][]" class="form-control answers-${id} ">
                    </div>
                `);
            }
        }

        function addQuestion(e) {
            e.preventDefault();
            var n = $(".allquestions .card").length;
            console.log(n);
            $(".allquestions").append(`
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group mb-3 col-md-6">
                                    <label for="question">Question ${n+1}
                                        <span style="color:red">*</span>
                                    </label>
                                    <input autofocus type="text" id="question" name="question[]" class="form-control">
                                    @error('question')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class=" room form-group mb-3 col-md-4">
                                    <label for="to">Type</label>
                                    <select data-id="${n}" id="question_type-${n}" class="form-control changeType"
                                        name="question_type[]">
                                        <option value="poll">POLL</option>
                                        <option value="mcq">MCQ</option>
                                    </select>
                                </div>
                            </div>
                            <div id="allanswers-${n}">

                                <div class="form-group mb-3">
                                    <div class="label">
                                        <div class="correct_checkbox_container cb-${n}">
                                            <input type="radio"  name="correct_ans[${n}]" id="checkbox-${n}-0" value="0"
                                                class=" checkbox hidden  m-0">
                                            <label class="switchbox m-0" for="checkbox-${n}-0"></label>
                                        </div>
                                        <label for="name">Option 1</label>
                                    </div>
                                    <input type="text" name="ans[${n}][]" class="form-control answers-${n} ">
                                </div>
                                <div class="form-group mb-3">
                                    <div class="label">
                                        <div class="correct_checkbox_container cb-${n}">
                                            <input type="radio"  name="correct_ans[${n}]" id="checkbox-${n}-1" value="1"
                                                class=" checkbox  hidden m-0">
                                            <label class="switchbox m-0" for="checkbox-${n}-1"></label>
                                        </div>
                                        <label for="name">Option 2</label>
                                    </div>

                                    <input type="text" name="ans[${n}][]" class="form-control answers-${n} ">
                                </div>
                            </div>

                            <button class="btn btn-primary add_ans" data-id="${n}" >Add Answer</button>
                            <button class="submit btn btn-danger delete_qs" data-id="${n}">Delete Question</button>
                        </div>
                    </div>
            
            `)
            $(".add_ans").unbind().on("click", addAnswer);
            $(".delete_qs").unbind().on("click",DeleteQs);

            $(".changeType").on("change", changeQuestionType);

        }
    </script>
@endsection
