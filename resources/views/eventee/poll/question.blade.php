@extends("layouts.admin")
@section('title')
Manage Polls
@endsection
@section("styles")
@include("includes.styles.datatables") 
@endsection
@section("page_title")
Manage Polls
@endsection
@section("breadcrumbs")
<li class="breadcrumb-item active">Polls</li>
@endsection
@section('content')
<div class="row">
   <div class="col-12">
      <div id="message" style="display: none" role="alert" class="alert alert-info mb-1"></div>
   </div>
</div>
<div class="row">
   <div class="col-12">
      <div class="card">
         <div class="card-header ">
            <div class="float-left">
               <legend>
                  Polls 
               </legend>
            </div>
            <div class="dropdown float-right">
               <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Create New<span class="caret"></span></button>
               <ul class="dropdown-menu ">
                  <a href="#"  data-toggle="modal" data-target="#mcqModal">
                     <li class="list-group-item list-group-item-action"><i class="fas fa-poll" style="size: 14px"></i>&nbsp;MCQ</li>
                  </a>
                  <a href="#" data-toggle="modal" data-target="#wcModal">
                     <li class="list-group-item list-group-item-action"><i class="fa fa-cloud" aria-hidden="true"></i>&nbsp;Word Cloud</li>
                  </a>
                  <a href="#" data-toggle="modal" data-target="#quizModal">
                     <li class="list-group-item list-group-item-action"><i class="fa fa-question" aria-hidden="true"></i>&nbsp;Quiz</li>
                  </a>
                  <a href="#"  data-toggle="modal" data-target="#ratingModal">
                     <li class="list-group-item list-group-item-action"><i class="fa fa-star" aria-hidden="true"></i> &nbsp;Rating</li>
                  </a>
                  <a href="#" data-toggle="modal" data-target="#surveyModal">
                     <li class="list-group-item list-group-item-action"><i class="fas fa-align-left"></i>&nbsp;Survey</li>
                  </a>
               </ul>
            </div>
         </div>
         <div class="card-body">
            <fieldset>
               <legend></legend>
               <table class="table datatable table-striped dt-responsive nowrap w-100">
                  <thead>
                     <th>Current Polls</th>
                     <th>Actions</th>
                  </thead>
                  @if(count($questions)>0)
                  <tbody>
                     @foreach($questions as $key =>$question)
                     @php
                     $count = App\UserAnswer::where('question_id',$question->id)->count();
                     @endphp
                     <tr>
                        @if($question->status == 1)
                        @if($question->type == 'mcq')
                        <td bgcolor="green" style="color: white" data-question="{{ $question->question }}" data-target="#mcqShowModal" data-toggle="modal" data-count="{{ $count }}" data-id="{{ $question->id }}"> 
                           <strong>Multiple Choice Quesiton.</strong>&nbsp;{{ $question->question }}&nbsp;&nbsp;(<b>{{ $count }} Votes</b>) &nbsp;<small><i class="fa fa-check-circle" aria-hidden="true" style="color: green"></i></small>
                        </td>
                        @elseif($question->type == 'wc')
                        <td bgcolor="green" data-question="{{ $question->question }}" style="color: white" data-toggle="modal" data-target="#wcShowModal" data-id="{{ $question->id }}" data-count ="{{ $count }}">
                           <strong>Word Cloud.</strong>&nbsp;{{ $question->question }}&nbsp;&nbsp; (<b>{{ $count }} Votes</b>) &nbsp; <small><i class="fas fa-check"></i></small>
                        </td>
                        @elseif($question->type == 'quiz')
                        <td bgcolor="green" data-question="{{ $question->question }}" style="color: white" data-target="#mcqShowModal" data-toggle="modal" data-count="{{ $count }}" data-id="{{ $question->id }}"> 
                           <strong>Quiz.</strong>&nbsp;{{ $question->question }}&nbsp;&nbsp; (<b>{{ $count }} Votes</b>)&nbsp;<small><i class="fa fa-check-circle" aria-hidden="true" style="color: green"></i></small>
                        </td>
                        @elseif($question->type == 'surv')
                        <td bgcolor="green" data-question="{{ $question->question }}" style="color: white" data-target="#mcqShowModal" data-toggle="modal" data-count="{{ $count }}" data-id="{{ $question->id }}"> 
                           <strong>Survey.</strong>&nbsp;{{ $question->question }}&nbsp; &nbsp;(<b>{{ $count }} Votes</b>)&nbsp; <small><i class="fa fa-check-circle" aria-hidden="true" style="color: green"></i></small>
                        </td>
                        @elseif($question->type == 'rate')
                        <td bgcolor="green" data-question="{{ $question->question }}" style="color: white" data-toggle="modal" data-target="#rateShowModal"  data-id="{{ $question->id }}" data-count ="{{ $count }}"> 
                           <strong>Rating.</strong>&nbsp;{{ $question->question }}&nbsp;&nbsp;(<b>{{ $count }} Votes</b>)&nbsp; <small><i class="fa fa-check-circle" aria-hidden="true" style="color: green"></i></small>
                           @endif
                        </td>
                        @else
                        @if($question->type == 'mcq')
                        <td bgcolor="grey" style="color: black" data-question="{{ $question->question }}" data-target="#mcqShowModal" data-toggle="modal" data-count="{{ $count }}" data-id="{{ $question->id }}"> 
                           <strong>Multiple Choice Quesiton.</strong>&nbsp;{{ $question->question }}&nbsp;&nbsp;(<b>{{ $count }} Votes</b>) &nbsp;
                        </td>
                        @elseif($question->type == 'wc')
                        <td bgcolor="grey" style="color: black"  data-question="{{ $question->question }}" data-toggle="modal" data-target="#wcShowModal" data-id="{{ $question->id }}" data-count ="{{ $count }}">
                           <strong>Word Cloud.</strong>&nbsp;{{ $question->question }}&nbsp;&nbsp; (<b>{{ $count }} Votes</b>) &nbsp; 
                        </td>
                        @elseif($question->type == 'quiz')
                        <td bgcolor="grey" style="color: black" data-question="{{ $question->question }}" data-target="#mcqShowModal" data-toggle="modal" data-count="{{ $count }}" data-id="{{ $question->id }}"> 
                           <strong>Quiz.</strong>&nbsp;{{ $question->question }}&nbsp;&nbsp; (<b>{{ $count }} Votes</b>)&nbsp;
                        </td>
                        @elseif($question->type == 'surv')
                        <td bgcolor="grey" style="color: black" data-question="{{ $question->question }}" data-target="#mcqShowModal" data-toggle="modal" data-count="{{ $count }}" data-id="{{ $question->id }}"> 
                           <strong>Survey.</strong>&nbsp;{{ $question->question }}&nbsp; &nbsp;(<b>{{ $count }} Votes</b>)&nbsp; 
                        </td>
                        @elseif($question->type == 'rate')
                        <td bgcolor="grey" style="color: black" data-toggle="modal" data-question="{{ $question->question }}" data-target="#rateShowModal"  data-id="{{ $question->id }}" data-count ="{{ $count }}"> 
                           <strong>Rating.</strong>&nbsp;{{ $question->question }}&nbsp;&nbsp;(<b>{{ $count }} Votes</b>)&nbsp; 
                           @endif
                        </td>
                        </td>
                        @endif
         </div>
      </div>
      @if($question->status == 1)
      <td><center>
      <div class="dropdown float-left"><center>
      <button class="btn btn-secondary dropdown-toggle float-right" style="background-color: green" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Options
      </button><br><br>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
      @if($question->type == 'mcq' || $question->type == 'quiz')
      <a class="dropdown-item"  id="editData" data-toggle="modal" data-target="#editModalCenter" data-id = "{{ $question->id }}"><i class="fa fa-pencil" style="color: blue"></i>&nbsp;Edit
      </a>
      @elseif($question->type == 'surv')
      <a class="dropdown-item"  id="editData" data-toggle="modal" data-target="#editModalCenter3" data-id = "{{ $question->id }}"><i class="fa fa-pencil" style="color: blue"></i>&nbsp;Edit
      </a>
      @elseif($question->type == 'rate')
      <a cclass="dropdown-item"  id="editData" data-toggle="modal" data-target="#editModalCenter4" data-id = "{{ $question->id }}"><i class="fa fa-pencil" style="color: blue"></i>&nbsp;Edit
      </a>
      @elseif($question->type == 'wc')
      <a class="dropdown-item"  id="editData" data-toggle="modal" data-target="#editModalCenter2" data-id = "{{ $question->id }}"><i class="fa fa-pencil" style="color: blue"></i>&nbsp;Edit
      </a>
      @endif
      @if($question->status == 1)
      <span id="play">
      <input type="hidden" class="status" value="{{ $question->status }}">
      <input type="hidden" class="idstat" value="{{ $question->id }}">
      <a class="dropdown-item" aria-hidden="true" id="off" data-id="{{ $question->id }}" onclick="offStat(this)"><i class="fa fa-stop-circle" style="color: red"></i>&nbsp;Stop</a>
      </span>
      @else
      <span id="stop">
      <input type="hidden" class="status" value="{{ $question->status }}">
      <input type="hidden" class="idstat" value="{{ $question->id }}">
      <a class="dropdown-item" id="on" data-id="{{ $question->id }}" onclick="onStat(this)"><i class="fa fa-play-circle" style="color: green"></i>&nbsp;Play</a>
      </span>
      @endif
      <a  data-toggle = "modal" data-target = "#deleteChild"  data-placement="top" data-id="{{$question->id}}" title="" data-original-title="Delete "class="delete dropdown-item" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-o" style="color: red"></i>&nbsp;Delete</a>
      </center>
      </div></center></td>
      @else
      <td><center>
      <div class="dropdown float-left"><center>
      <button class="btn btn-secondary dropdown-toggle float-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Options
      </button><br><br>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
      @if($question->type == 'mcq' || $question->type == 'quiz')
      <a href="#" class="dropdown-item"  id="editData" data-toggle="modal" data-target="#editModalCenter" data-id = "{{ $question->id }}"><i class="fa fa-pencil" style="color: blue"></i>&nbsp;Edit
      </a>
      @elseif($question->type == 'surv')
      <a href="#" class="dropdown-item"  id="editData" data-toggle="modal" data-target="#editModalCenter3" data-id = "{{ $question->id }}"><i class="fa fa-pencil" style="color: blue"></i>&nbsp;Edit
      </a>
      @elseif($question->type == 'rate')
      <a href="#"class="dropdown-item"  id="editData" data-toggle="modal" data-target="#editModalCenter4" data-id = "{{ $question->id }}"><i class="fa fa-pencil" style="color: blue"></i>&nbsp;Edit
      </a>
      @elseif($question->type == 'wc')
      <a href="#" class="dropdown-item"  id="editData" data-toggle="modal" data-target="#editModalCenter2" data-id = "{{ $question->id }}"><i class="fa fa-pencil" style="color: blue"></i>&nbsp;Edit
      </a>
      @endif
      @if($question->status == 1)
      <span id="play">
      <input type="hidden" class="status" value="{{ $question->status }}">
      <input type="hidden" class="idstat" value="{{ $question->id }}">
      <a class="dropdown-item" aria-hidden="true" id="off" data-id="{{ $question->id }}" onclick="offStat(this)"><i class="fa fa-stop-circle" style="color: red"></i>&nbsp;Stop</a>
      </span>
      @else
      <span id="stop">
      <input type="hidden" class="status" value="{{ $question->status }}">
      <input type="hidden" class="idstat" value="{{ $question->id }}">
      <a class="dropdown-item" id="on" data-id="{{ $question->id }}" onclick="onStat(this)"><i class="fa fa-play-circle" style="color: green"></i>&nbsp;Play</a>
      </span>
      @endif
      <a  data-toggle = "modal" data-target = "#deleteChild"  data-placement="top" data-id="{{$question->id}}" title="" data-original-title="Delete "class="delete dropdown-item" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-o" style="color: red"></i>&nbsp;Delete</a>
      </center>
      </div></center></td>
      @endif
      @endforeach
      <tr>
      <td colspan="2"><span class="float-right">{{ $questions->links() }}</span> </td>
      </tr>
      </tbody>
      @else
      <tbody>
      <tr>
      <td colspan="2" rowspan="3"><center>
      <a href="#"  data-toggle="modal" data-target="#mcqModal" class="btn btn-success"><i class="fas fa-poll" style="size: 14px"></i>&nbsp; Create MCQ</a>
      <a href="#" data-toggle="modal" data-target="#wcModal" class="btn btn-secondary">  <i class="fa fa-cloud" aria-hidden="true"></i>&nbsp;Word Cloud</a>
      <a href="#" data-toggle="modal" data-target="#quizModal" class="btn btn-primary"><i class="fa fa-question" aria-hidden="true"></i>&nbsp;Quiz</a>
      <a href="#"  data-toggle="modal" data-target="#ratingModal" class="btn btn-info"><i class="fa fa-star" aria-hidden="true"></i> &nbsp;Rating</a>
      <a href="#" data-toggle="modal" data-target="#surveyModal" class="btn btn-light"><i class="fas fa-align-left"></i>&nbsp;Survey </a>  
      </center></td>
      </tr>
      </tbody>
      @endif
      </table>
      </fieldset>
      </div> <!-- end card body-->
      </div> <!-- end card -->
   </div>
   <!-- end col-->
</div>
<!-- end row-->
{{-- Modal Edit 2--}}
<div class="modal fade" id="editModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Question</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form action="{{ route('mcq.edit') }}" method="post">
               {{ csrf_field() }}
               <input type="hidden" name="id" id="menId2">
               <input type="hidden" name="correct" id="correctEdit">
               <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Question:</label>
                  <input type="text" class="form-control" id="questionMcq" name="question">
               </div>
               <fieldset>
                  <legend>Options</legend>
                  <ul class="list-group" id="appendQuestion">
                     {{-- <button type="button" class="addinp btn btn-success float-right" onclick="editNewLine(this)"> Add new Field </button><br> --}}
                  </ul>
               </fieldset>
               <button type="submit" class="btn btn-primary float-right">Save</button>
            </form>
         </div>
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
   </div>
</div>
</div>
</div>
<!--delete child-->
<div class="modal fade" id="deleteChild" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Question</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="confirmatoin modal-body">
            Are You Sure?
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <form action="{{ route('question.delete') }}" method="post">
               <input type="hidden" name="id" id="deletequestion">
               <button type="submit" class="btn btn-danger">Delete</button>
            </form>
         </div>
      </div>
   </div>
</div>
<!--MCQ QUESTION-->
<div class="modal fade" id="mcqModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-poll" style="size: 14px"></i>&nbsp;Multiple Choice Question</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form id="mcq" action="{{ route('eventee.poll.mcq',$id) }}" method="post">
               <input type="hidden" name="poll_id" value="{{ $poll->id }}">
               <input type="hidden" name="event_id" value="{{ decrypt($id) }}">
               <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Question:</label>
                  <input type="hidden" name="correct" id="correct" class="correct">
                  <input type="hidden" name="type" value="mcq">
                  <input type="text" class="mcqque form-control" id="mcqque" name="question">
               </div>
               @php
                  $sessions = App\EventSession::where('event_id',decrypt($id))->orderBy('created_at','desc')->get();
               @endphp
               @if(App\EventSession::where('event_id',decrypt($id))->count() > 0)
               <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Session Room:</label>
                  <select name="mcq_event_id" id="mcq_event_id" class="form-control">
                     @foreach ($sessions as $session)
                        <option value="{{ $session->id }}">{{ $session->room }}</option>
                     @endforeach
                  </select>
               </div>
               @endif
               <fieldset>
                  <legend>Options</legend>
                  <ul class="addli list-group" id="allLi">
                     <style>
                        .addinp{
                        float:right;
                        width: 30%;
                        position: relative;
                        }
                     </style>
                     <button type="button" class="addinp btn btn-success float-right" onclick="newLi(this)"> Add new Field </button><br>
                     <li class="list-group-item">
                        <input type="checkbox" id = "0" class="correct col-md-2" id="mcqcorrect" name="correct2[]">
                        <input type="text" class="col-md-8" name = "answers[]">
                     </li>
                  </ul>
               </fieldset>
               <br>
               <input type="submit" class="form btn btn-primary float-right" value="Save">
            </form>
         </div>
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
   </div>
</div>
</div>
<!--Quiz QUESTION-->
<div class="modal fade" id="quizModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-question" aria-hidden="true"></i>&nbsp;Quiz</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form id="mcq" action="{{ route('eventee.poll.mcq',$id) }}" method="post">
               <input type="hidden" name="poll_id" value="{{ $poll->id }}">
               <input type="hidden" name="event_id" value="{{ decrypt($id) }}">
               <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Question:</label>
                  <input type="hidden" name="correct" id="correct" class="correct">
                  <input type="hidden" name="type" value="quiz">
                  <input type="text" class="mcqque form-control" id="mcqque" name="question">
               </div>
               @if(App\EventSession::where('event_id',decrypt($id))->count() > 0)
               <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Session Room:</label>
                  <select name="mcq_event_id" id="mcq_event_id" class="form-control">
                     @foreach ($sessions as $session)
                        <option value="{{ $session->id }}">{{ $session->room }}</option>
                     @endforeach
                  </select>
               </div>
               @endif
               <fieldset>
                  <legend>Options</legend>
                  <ul class="addli list-group" id="allLi2">
                     <style>
                        .addinp{
                        float:right;
                        width: 30%;
                        position: relative;
                        }
                     </style>
                     <button type="button" class="addinp btn btn-success float-right" onclick="newLine(this)"> Add new Field </button><br>
                     <li class="list-group-item">
                        <input type="checkbox" id = "0" class="correct col-md-2" id="mcqcorrect" name="correct2[]">
                        <input type="text" class="col-md-8" name = "answers[]">
                     </li>
                  </ul>
               </fieldset>
               <br>
               <input type="submit" class="form btn btn-primary float-right" value="Save">
            </form>
         </div>
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
   </div>
</div>
</div>
<!--Word Cloud-->
<div class="modal fade" id="wcModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-cloud" aria-hidden="true"></i>&nbsp;Word Cloud</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form id="mcq" action="{{ route('eventee.wordcloud',$id) }}" method="post">
               <input type="hidden" name="poll_id" value="{{ $poll->id }}">
               <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Question:</label>
                  <input type="hidden" name="correct" id="correct" class="correct" >
                  <input type="hidden" name="type" value="wc">
                  <input type="text" class="mcqque form-control" id="mcqque" name="question" placeholder="Ask Your Question Here">
               </div>
               @if(App\EventSession::where('event_id',decrypt($id))->count() > 0)
               <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Session Room:</label>
                  <select name="wc_event_id" id="wc_event_id" class="form-control">
                     @foreach ($sessions as $session)
                        <option value="{{ $session->id }}">{{ $session->name }}</option>
                     @endforeach
                  </select>
               </div>
               @endif
               <br>
               <input type="submit" class="form btn btn-primary float-right" value="Save">
            </form>
         </div>
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
   </div>
</div>
</div>
<!--Rating-->
<div class="modal fade" id="ratingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-star" aria-hidden="true"></i> &nbsp;Rating</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form id="mcq" action="{{ route('eventee.rating',$id) }}" method="post">
               <input type="hidden" name="poll_id" value="{{ $poll->id }}">
               <input type="hidden" name="event_id" value="{{ decrypt($id) }}">
               <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Question:</label>
                  <input type="hidden" name="correct" id="correct" class="correct" >
                  <input type="hidden" name="type" value="rate">
                  <input type="hidden" name="rate" id="rate">
                  <input type="text" class="mcqque form-control" id="mcqque" name="question" placeholder="Ask Your Question Here">
               </div>
               @if(App\EventSession::where('event_id',decrypt($id))->count() > 0)
               <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Session Room:</label>
                  <select name="rate_event_id" id="rate_event_id" class="form-control">
                     @foreach ($sessions as $session)
                        <option value="{{ $session->id }}">{{ $session->name }}</option>
                     @endforeach
                  </select>
               </div>
               @endif
               <fieldset>
                  <Legend id="appe">Rate Here</Legend>
                  <center>
                     <div class="rating-box" >
                        <i class="fa fa-star" aria-hidden="true" id="s1" style="font-size: 30px;" onclick="star1()"></i>
                        <i class="fa fa-star" aria-hidden="true" id="s2" style="font-size: 30px;" onclick="star2()"></i>
                        <i class="fa fa-star" aria-hidden="true" id="s3" style="font-size: 30px;" onclick="star3()"></i>
                        <i class="fa fa-star" aria-hidden="true" id="s4" style="font-size: 30px;" onclick="star4()"></i>
                        <i class="fa fa-star" aria-hidden="true" id="s5" style="font-size: 30px;" onclick="star5()"></i>
                     </div>
                  </center>
               </fieldset>
               <br>
               <input type="submit" class="form btn btn-primary float-right" value="Save">
            </form>
         </div>
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
   </div>
</div>
</div>
<!--Survey-->
<div class="modal fade" id="surveyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-align-left"></i>&nbsp;Survey</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form id="mcq" action="{{ route('eventee.survey',$id) }}" method="post">
               <input type="hidden" name="poll_id" value="{{ $poll->id }}">
               <input type="hidden" name="evemt_id" value="{{ decrypt($id) }}">
               <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Question:</label>
                  <input type="hidden" name="type" value="surv">
                  <input type="text" class="mcqque form-control" id="mcqque" name="question">
               </div>
               @if(App\EventSession::where('event_id',decrypt($id))->count() > 0)
               <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Session Room:</label>
                  <select name="surv_event_id" id="surv_event_id" class="form-control">
                     @foreach ($sessions as $session)
                        <option value="{{ $session->id }}">{{ $session->room }}</option>
                     @endforeach
                  </select>
               </div>
               @endif
               <fieldset>
                  <legend>Options</legend>
                  <ul class="addli list-group" id="allLi3">
                     <style>
                        .addinp{
                        float:right;
                        width: 30%;
                        position: relative;
                        }
                     </style>
                     <button type="button" class="addinp btn btn-success float-right" onclick="newLineM(this)"> Add new Field </button><br>
                     <li class="list-group-item">
                        <input type="text" class="form-control" class="col-md-8" name = "answers[]">
                     </li>
                  </ul>
               </fieldset>
               <br>
               <input type="submit" class="form btn btn-primary float-right" value="Save">
            </form>
         </div>
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
   </div>
</div>
</div>
<!--edit modal 2-->
<div class="modal fade" id="editModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Word Cloud</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form action="{{ route('wc.edit') }}" method="post">
               {{ csrf_field() }}
               <input type="hidden" name="id" id="wcId">
               <input type="hidden" name="event_id" value="{{ decrypt($id) }}">
               <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Question:</label>
                  <input type="text" class="form-control" id="wcquest" name="question">
               </div>
               <button type="submit" class="btn btn-primary float-right">Save</button>
            </form>
         </div>
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
   </div>
</div>
<!--edit modal 3-->
<div class="modal fade" id="editModalCenter3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Survey</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form action="{{ route('surv.edit') }}" method="post">
               {{ csrf_field() }}
               <input type="hidden" name="id" id="survId">
               <input type="hidden" name="event_id" value="{{ decrypt($id) }}">
               <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Question:</label>
                  <input type="text" class="form-control" id="survQuestion" name="question">
               </div>
               <fieldset>
                  <legend>Options</legend>
                  <ul class="list-group" id="survLi"></ul>
               </fieldset>
               <button type="submit" class="btn btn-primary float-right">Save</button>
            </form>
         </div>
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
   </div>
</div>
<!--edit modal 4-->
<div class="modal fade" id="editModalCenter4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-star" aria-hidden="true"></i> &nbsp;Rating</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form id="mcq" action="{{ route('poll.rating') }}" method="post">
               <input type="hidden" name="poll_id" value="{{ $poll->id }}">
               <input type="hidden" name="event_id" value="{{ decrypt($id) }}">
               <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Question:</label>
                  <input type="hidden" name="id" id="rateId" class="rateId" >
                  <input type="hidden" name="rate" id="rating">
                  <input type="text" class="mcqque form-control" id="rateques" name="question" placeholder="Ask Your Question Here">
               </div>
               <fieldset>
                  <Legend id="appe">Rate Here</Legend>
                  <center>
                     <div class="rating-box" >
                        <i class="fa fa-star" aria-hidden="true" id="s1edit" style="font-size: 30px;" onclick="star1edit()"></i>
                        <i class="fa fa-star" aria-hidden="true" id="s2edit" style="font-size: 30px;" onclick="star2edit()"></i>
                        <i class="fa fa-star" aria-hidden="true" id="s3edit" style="font-size: 30px;" onclick="star3edit()"></i>
                        <i class="fa fa-star" aria-hidden="true" id="s4edit" style="font-size: 30px;" onclick="star4edit()"></i>
                        <i class="fa fa-star" aria-hidden="true" id="s5edit" style="font-size: 30px;" onclick="star5edit()"></i>
                     </div>
                  </center>
               </fieldset>
               <br>
               <input type="submit" class="form btn btn-primary float-right" value="Save">
            </form>
         </div>
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
   </div>
</div>
</div>
<!--MCQ SHOW Modal -->
<!--Rate SHOW Modal -->
<div class="modal fade" id="rateShowModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="showTitle2"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <table class="table table-sm" id="mcModTable2">
               <thead>
                  <tr>
                     <th>User</th>
                     <th>Rate Chosen</th>
                  </tr>
               </thead>
               <tbody id="mcqbody2">
               </tbody>
            </table>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
<!--WC SHOW Modal -->
<div class="modal fade theme-modal" id="wcShowModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="showTitle3"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div id="showQuestion2"></div>
            <center>
               <div id="donutchart" style="width: 900px; height: 500px;font-size:50px;"></div>
            </center>
         </div>
         <div class="modal-footer">
         </div>
      </div>
   </div>
</div>
<!--mcq show-->
<div class="modal fade theme-modal" id="mcqShowModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="showTitle"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div id="showQuestion"></div>
            <div id="barchart_values" style="width: 1200px; height: 300px; margin-left:25%"></div>
            <div id="rightOption"></div>
         </div>
         <div class="modal-footer">
         </div>
      </div>
   </div>
</div>
@endsection
@section("scripts")
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
   google.charts.load('upcoming', {'packages': ['vegachart']}).then(drawChart);
   google.charts.setOnLoadCallback(drawChart);
   function drawChart(result) {
         const dataTable = new google.visualization.DataTable();
         dataTable.addColumn({type: 'string', 'id': 'category'});
         dataTable.addColumn({type: 'number', 'id': 'amount'});
         // dataTable.addRows([
         //   ['A', 28],
         //   ['B', 55],
         //   ['C', 43],
         //   ['D', 91],
         //   ['E', 81],
         //   ['F', 53],
         //   ['G', 19],
         //   ['H', 87],
         // ]);
         var ico = document.createElement('i');
         ico.className = 'fas fa-check-circle';
         ico.style.color = 'green';
         $.each(result,function(key,value){
    // var percent = ;
         if(value.correct == 1){
           dataTable.addRows([
             [value.alpha,parseFloat($.trim(value.per))],
           ]);
         }
         else{
           dataTable.addRows([
             [value.alpha,parseFloat($.trim(value.per))],
           ]);
         }
         });
   
         const options = {
           "vega": {
             "$schema": "https://vega.github.io/schema/vega/v4.json",
             "width": 400,
             "height": 200,
             "padding": 5,
             "bar":{'barThickness':10},
   
             'data': [{'name': 'table', 'source': 'datatable'}],
   
             "signals": [
               {
                 "name": "tooltip",
                 "value": {},
                 "on": [
                   {"events": "rect:mouseover", "update": "datum"},
                   {"events": "rect:mouseout",  "update": "{}"}
                 ]
               }
             ],
   
             "scales": [
               {
                 "name": "xscale",
                 "type": "band",
                 "domain": {"data": "table", "field": "category"},
                 "range": "width",
                 "padding": 0.05,
                 "round": true,
               },
               {
                 "name": "yscale",
                 "domain": {"data": "table", "field": "amount"},
                 "nice": true,
                 "range": "height"
               }
             ],
   
             "axes": [
               { "orient": "bottom", "scale": "xscale" },
               { "orient": "left", "scale": "yscale" }
             ],
   
             "marks": [
               {
                 "type": "rect",
                 "from": {"data":"table"},
                 "encode": {
                   "enter": {
                     "x": {"scale": "xscale", "field": "category"},
                     "width": {"scale": "xscale", "band": 1,'barThickness':10},
                     "y": {"scale": "yscale", "field": "amount"},
                     "y2": {"scale": "yscale", "value": 0}
                   },
                   "update": {
                     "fill": {"value": "steelblue"}
                   },
                   "hover": {
                     "fill": {"value": "red"}
                   }
                 }
               },
               {
                 "type": "text",
                 "encode": {
                   "enter": {
                     "align": {"value": "center"},
                     "baseline": {"value": "bottom"},
                     "fill": {"value": "#333"}
                   },
                   "update": {
                     "x": {"scale": "xscale", "signal": "tooltip.category", "band": 0.5},
                     "y": {"scale": "yscale", "signal": "tooltip.amount", "offset": -2},
                     "text": {"signal": "tooltip.amount"},
                     "fillOpacity": [
                       {"test": "datum === tooltip", "value": 0},
                       {"value": 1}
                     ]
                   }
                 }
               }
             ]
           }
         };
   
         const chart = new google.visualization.VegaChart(document.getElementById('barchart_values'));
         chart.draw(dataTable, options);
       }
   
</script>
@include("includes.scripts.datatables")
<script>
   function searchToObject() {
       var pairs = window.location.search.substring(1).split("&"),
           obj = {},
           pair,
           i;
   
       for ( i in pairs ) {
           if ( pairs[i] === "" ) continue;
   
           pair = pairs[i].split("=");
           obj[ decodeURIComponent( pair[0] ) ] = decodeURIComponent( pair[1] );
       }
   
       return obj;
   }
   
</script>
<script>
   $(document).ready(function(){
       $("#buttons-container").append('')
       let data = searchToObject();
       if(data.message) {
           $("#message").text(data.message)
           $("#message").show()
       }
       
   });
       
   });
</script>
<script>
   var id= 0; 
   var click = 0;
     $('#editModalCenter').on('show.bs.modal', function (e) {
   
             var questionId = $(e.relatedTarget).attr('data-id');
             console.log((questionId));
             $.ajax({
                 url:"{{ route('poll.question.edit') }}",
                 method:"POST",
                 data:{'_token':"{{ csrf_token() }}", 'id':questionId},
                 success:function(result){
                     console.log(result.answer);
                     $('#questionMcq').val(result.question.question);
                     $('#menId2').val(result.question.id);
                     $.each(result.answer,function(key,value){
                       if(value.correct == 1){
                         var element = $(' <li class="list-group-item"><input type="checkbox" id = "'+key+'" class="editcorrect col-md-2"  name="correct2[]" checked><input type="text" class="col-md-8" name="answers[]" value="'+value.answer+'"><input type="hidden" class="col-md-8" name="answerid[]" value="'+value.id+'"></li>');
                       
                       }
                       else{
                         var element = $(' <li class="list-group-item"><input type="checkbox"  class="editcorrect col-md-2"   id = "'+key+'"  name="correct2[]"><input type="text" name="answers[]" class="col-md-8" value="'+value.answer+'"><input type="hidden" class="col-md-8" name="answerid[]" value="'+value.id+'"></li>');
       
                       }
                       id += 1;
                       if(click < 4){
                         $('#appendQuestion').append(element);
                       }
                       click++;
   
                     });
                     
                     // console.log(end_date);
                     // $('#poll-name').val(result.name);
                     // $('#start_date').val((start_date));
                     // $('#end_date').val((end_date)); 
                     // $('#poll-id').val(result.id); 
                 }
   
             });
         });
       $(document).ready(function(){
         $(document).on('click','.editcorrect',function(){
           if($(this).is(':checked')){
             $('#correctEdit').val($(this).attr('id'));
           }
           else{
             $('#correctEdit').val(0);
           }
         });
   
       });
</script>
<script>
   //MCQ MODAL DATA
   $(document).ready(function(){
     // $('.addinp').on('click',function(e){
     //   e.preventDefault();
     //   $('.addli').append('<li class="list-group-item"><input type="radio" class="correct col-md-2" id="mcqcorrect" name = "correct[]" value="0"><input type="text" class="col-md-8" name = "answers[]"></li>');
     // });
     $(document).on('click', '.correct', function () {
         if($(this).is(':checked')){
           var id = $(this).attr('id');
           $('.correct').val(id);
           
         } else {
           // $(this).val(0);
           $('.correct').val(0);
         }
     });
     $(document).on('input','.mcqque',function(){
       console.log($(this).val());
     });
   
     // $('.remove').click(function(e){
     //   e.preventDefault();
     //   console.log($(this).closet('li'));
     // });
   });
   var i = 0;
   var j = 0;
   var k = 0;
   function newLi(event){
     i += 1;
     var ul = document.getElementById('allLi');
     var li = document.createElement('li');
     li.className = 'list-group-item';
     li.innerHTML = ' <input type="checkbox" id='+i+' class="correct col-md-2" id="mcqcorrect" name="correct2[]"><input type="text" class="col-md-8" name = answers[]">';
     ul.appendChild(li);
   }
   
   
   function editNewLine(event){
     id += 1;
     var ul = document.getElementById('appendQuestion');
     var li = document.createElement('li');
     li.className = 'list-group-item';
     li.innerHTML = ' <input type="checkbox" id='+id+' class="editcorrect col-md-2"  name="correct2[]"><input type="text" class="col-md-8" name = answers[]">';
     ul.appendChild(li);
   }
   
   
   function newLine(event){
     j += 1;
     var ul = document.getElementById('allLi2');
     var li = document.createElement('li');
     li.className = 'list-group-item';
     li.innerHTML = ' <input type="checkbox" id='+j+' class="correct col-md-2" id="mcqcorrect" name="correct2[]"><input type="text" class="col-md-8" name = answers[]">';
     ul.appendChild(li);
   }
   function newLineM(event){
     var ul = document.getElementById('allLi3');
     var li = document.createElement('li');
     li.className = 'list-group-item';
     
     li.innerHTML = '<input type="text" class="form-control" name = answers[]">';
     ul.appendChild(li);
   }
</script>
<script>
   //Rating
   var check = 0;
   var rate = 0;
   function star1(){
     var s1 = document.getElementById('s1');
     var s2 = document.getElementById('s2');
     var s3 = document.getElementById('s3');
     var s4 = document.getElementById('s4');
     var s5 = document.getElementById('s5');
     var inprate = document.getElementById('rate');
     
     // var app = document.getElementById('rateVal');
     
     
     if(check == 0){
       rate +=1;
       inprate.value = rate; 
       legen.appendChild(div);
       div.append(rate);
       check +=1;
       s1.style.color = 'yellow';
       s2.style.color = 'grey';
       s3.style.color = 'grey';
       s4.style.color = 'grey';
       s5.style.color = 'grey';
     }
     else{
       check =0;
       rate = 0;
       
       s1.style.color = 'grey';
       s2.style.color = 'grey';
       s3.style.color = 'grey';
       s4.style.color = 'grey';
       s5.style.color = 'grey';
     } 
     
   }
   
   function star2(){
     var s1 = document.getElementById('s1');
     var s2 = document.getElementById('s2');
     var s3 = document.getElementById('s3');
     var s4 = document.getElementById('s4');
     var s5 = document.getElementById('s5');
     var inprate = document.getElementById('rate');
     
     if(check == 0){
       rate +=2; 
       check +=1;
       inprate.value = rate; 
       s1.style.color = 'yellow';
       s2.style.color = 'yellow';
       s3.style.color = 'grey';
       s4.style.color = 'grey';
       s5.style.color = 'grey';
     }
     else{
       check =0;
       rate = 0;
       inprate.value = rate; 
       s1.style.color = 'grey';
       s2.style.color = 'grey';
       s3.style.color = 'grey';
       s4.style.color = 'grey';
       s5.style.color = 'grey';
     } 
     
   }
   
   function star3(){
     var s1 = document.getElementById('s1');
     var s2 = document.getElementById('s2');
     var s3 = document.getElementById('s3');
     var s4 = document.getElementById('s4');
     var s5 = document.getElementById('s5');
     var inprate = document.getElementById('rate');
     
     if(check == 0){
       rate +=3; 
       check +=1;
       inprate.value = rate; 
       s1.style.color = 'yellow';
       s2.style.color = 'yellow';
       s3.style.color = 'yellow';
       s4.style.color = 'grey';
       s5.style.color = 'grey';
     }
     else{
       check =0;
       rate = 0;
       inprate.value = rate; 
       s1.style.color = 'grey';
       s2.style.color = 'grey';
       s3.style.color = 'grey';
       s4.style.color = 'grey';
       s5.style.color = 'grey';
     } 
     
   }
   
   function star4(){
     var s1 = document.getElementById('s1');
     var s2 = document.getElementById('s2');
     var s3 = document.getElementById('s3');
     var s4 = document.getElementById('s4');
     var s5 = document.getElementById('s5');
     var inprate = document.getElementById('rate');
     
     if(check == 0){
       rate +=4; 
       check +=1;
       inprate.value = rate; 
       s1.style.color = 'yellow';
       s2.style.color = 'yellow';
       s3.style.color = 'yellow';
       s4.style.color = 'yellow';
       s5.style.color = 'grey';
     }
     else{
       check =0;
       rate = 0;
       inprate.value = rate; 
       s1.style.color = 'grey';
       s2.style.color = 'grey';
       s3.style.color = 'grey';
       s4.style.color = 'grey';
       s5.style.color = 'grey';
     } 
     
   }
   
   function star5(){
     var s1 = document.getElementById('s1');
     var s2 = document.getElementById('s2');
     var s3 = document.getElementById('s3');
     var s4 = document.getElementById('s4');
     var s5 = document.getElementById('s5');
     var inprate = document.getElementById('rate');
     
     if(check == 0){
       rate +=5; 
       check +=1;
       inprate.value = rate; 
       s1.style.color = 'yellow';
       s2.style.color = 'yellow';
       s3.style.color = 'yellow';
       s4.style.color = 'yellow';
       s5.style.color = 'yellow';
     }
     else{
       check =0;
       rate = 0;
       inprate.value = rate; 
       s1.style.color = 'grey';
       s2.style.color = 'grey';
       s3.style.color = 'grey';
       s4.style.color = 'grey';
       s5.style.color = 'grey';
     } 
     
   }
   
   
   
   //Edit Rating 
   
   
   function star1edit(){
     var s1 = document.getElementById('s1edit');
     var s2 = document.getElementById('s2edit');
     var s3 = document.getElementById('s3edit');
     var s4 = document.getElementById('s4edit');
     var s5 = document.getElementById('s5edit');
     var inprate = document.getElementById('rate');
     
     // var app = document.getElementById('rateVal');
     
     
     if(check == 0){
       rate +=1;
       inprate.value = rate; 
       legen.appendChild(div);
       div.append(rate);
       check +=1;
       s1.style.color = 'yellow';
       s2.style.color = 'grey';
       s3.style.color = 'grey';
       s4.style.color = 'grey';
       s5.style.color = 'grey';
     }
     else{
       check =0;
       rate = 0;
       
       s1.style.color = 'grey';
       s2.style.color = 'grey';
       s3.style.color = 'grey';
       s4.style.color = 'grey';
       s5.style.color = 'grey';
     } 
     
   }
   
   function star2edit(){
     var s1 = document.getElementById('s1edit');
     var s2 = document.getElementById('s2edit');
     var s3 = document.getElementById('s3edit');
     var s4 = document.getElementById('s4edit');
     var s5 = document.getElementById('s5edit');
     var inprate = document.getElementById('rate');
     
     if(check == 0){
       rate +=2; 
       check +=1;
       inprate.value = rate; 
       s1.style.color = 'yellow';
       s2.style.color = 'yellow';
       s3.style.color = 'grey';
       s4.style.color = 'grey';
       s5.style.color = 'grey';
     }
     else{
       check =0;
       rate = 0;
       inprate.value = rate; 
       s1.style.color = 'grey';
       s2.style.color = 'grey';
       s3.style.color = 'grey';
       s4.style.color = 'grey';
       s5.style.color = 'grey';
     } 
     
   }
   
   function star3edit(){
     var s1 = document.getElementById('s1edit');
     var s2 = document.getElementById('s2edit');
     var s3 = document.getElementById('s3edit');
     var s4 = document.getElementById('s4edit');
     var s5 = document.getElementById('s5edit');
     var inprate = document.getElementById('rate');
     
     if(check == 0){
       rate +=3; 
       check +=1;
       inprate.value = rate; 
       s1.style.color = 'yellow';
       s2.style.color = 'yellow';
       s3.style.color = 'yellow';
       s4.style.color = 'grey';
       s5.style.color = 'grey';
     }
     else{
       check =0;
       rate = 0;
       inprate.value = rate; 
       s1.style.color = 'grey';
       s2.style.color = 'grey';
       s3.style.color = 'grey';
       s4.style.color = 'grey';
       s5.style.color = 'grey';
     } 
     
   }
   
   function star4edit(){
     var s1 = document.getElementById('s1edit');
     var s2 = document.getElementById('s2edit');
     var s3 = document.getElementById('s3edit');
     var s4 = document.getElementById('s4edit');
     var s5 = document.getElementById('s5edit');
     var inprate = document.getElementById('rate');
     
     if(check == 0){
       rate +=4; 
       check +=1;
       inprate.value = rate; 
       s1.style.color = 'yellow';
       s2.style.color = 'yellow';
       s3.style.color = 'yellow';
       s4.style.color = 'yellow';
       s5.style.color = 'grey';
     }
     else{
       check =0;
       rate = 0;
       inprate.value = rate; 
       s1.style.color = 'grey';
       s2.style.color = 'grey';
       s3.style.color = 'grey';
       s4.style.color = 'grey';
       s5.style.color = 'grey';
     } 
     
   }
   
   function star5(){
     var s1 = document.getElementById('s1edit');
     var s2 = document.getElementById('s2edit');
     var s3 = document.getElementById('s3edit');
     var s4 = document.getElementById('s4edit');
     var s5 = document.getElementById('s5edit');
     var inprate = document.getElementById('rate');
     
     if(check == 0){
       rate +=5; 
       check +=1;
       inprate.value = rate; 
       s1.style.color = 'yellow';
       s2.style.color = 'yellow';
       s3.style.color = 'yellow';
       s4.style.color = 'yellow';
       s5.style.color = 'yellow';
     }
     else{
       check =0;
       rate = 0;
       inprate.value = rate; 
       s1.style.color = 'grey';
       s2.style.color = 'grey';
       s3.style.color = 'grey';
       s4.style.color = 'grey';
       s5.style.color = 'grey';
     } 
     
   }
</script>
<script>
   //Delete Modal
   $('#deleteChild').on('shown.bs.modal', function(e) { 
     var questionId = $(e.relatedTarget).attr('data-id');
     $('#deletequestion').val(questionId);
   
   });
</script>
<script>
   $('#editModalCenter3').on('show.bs.modal', function (e) {
   
     var questionId = $(e.relatedTarget).attr('data-id');
     console.log((questionId));
     $.ajax({
         url:"{{ route('poll.question.edit') }}",
         method:"POST",
         data:{'_token':"{{ csrf_token() }}", 'id':questionId},
         success:function(result){
             console.log(result.answer);
             $('#survQuestion').val(result.question.question);
             $('#survId').val(result.question.id);
             $.each(result.answer,function(key,value){
               if(value.correct == 1){
                 var element = $(' <li class="list-group-item"><input type="text" class="form-control" name="answers[]" value="'+value.answer+'"><input type="hidden" class="col-md-8" name="answerid[]" value="'+value.id+'"></li>');
               
               }
               else{
                 var element = $(' <li class="list-group-item"><input type="text" name="answers[]" class="form-control" value="'+value.answer+'"><input type="hidden" class="col-md-8" name="answerid[]" value="'+value.id+'"></li>');
   
               }
               id += 1;
               if(click < 4){
                 $('#survLi').append(element);
               }
               click++;
   
             });
             
             // console.log(end_date);
             // $('#poll-name').val(result.name);
             // $('#start_date').val((start_date));
             // $('#end_date').val((end_date)); 
             // $('#poll-id').val(result.id); 
         }
   
     });
   });
   
   
   $('#editModalCenter2').on('show.bs.modal', function (e) {
   
     var questionId = $(e.relatedTarget).attr('data-id');
     console.log((questionId));
     $.ajax({
         url:"{{ route('poll.question.edit') }}",
         method:"POST",
         data:{'_token':"{{ csrf_token() }}", 'id':questionId},
         success:function(result){
             console.log(result.answer);
             $('#wcquest').val(result.question.question);
             $('#wcId').val(result.question.id);
         }
   
     });
   });
   
   $('#editModalCenter4').on('show.bs.modal', function (e) {
   
   var questionId = $(e.relatedTarget).attr('data-id');
   console.log((questionId));
   $.ajax({
       url:"{{ route('poll.question.edit') }}",
       method:"POST",
       data:{'_token':"{{ csrf_token() }}", 'id':questionId},
       success:function(result){
           console.log(result.answer);
           $('#rateques').val(result.question.question);
           $('#rateId').val(result.question.id);
           if(result.rate == 1){
             $('#s1edit').css('color','yellow');
           }
           else if(result.rate == 2){
             $('#s1edit').css('color','yellow');
             $('#s2edit').css('color','yellow');
           }
           else if(result.rate == 3){
             $('#s1edit').css('color','yellow');
             $('#s2edit').css('color','yellow');
             $('#s3edit').css('color','yellow');
            
           }
           else if(result.rate == '4'){
             var s1 = document.getElementById('s1Edit');
             s1.style.color = 'yellow';
             // s2.style.color = 'yellow';
             // s3.style.color = 'yellow';
             // s4.style.color = 'yellow';
             // s5.style.color = 'yellow';
             
           }
           else if(result.rate == 5){
             $('#s1edit').css('color','yellow');
             $('#s2edit').css('color','yellow');
             $('#s3edit').css('color','yellow');
             $('#s4edit').css('color','yellow');
             $('#s5edit').css('color','yellow');
           }
       }
   
   });
   });
       
</script>
<script>
   function onStat(event){
    
    var status = $('.status').val();
    var id = $(event).attr('data-id');
    $.ajax({
      url:"{{ route('ques.status') }}",
      method:"get",
      data:{'id':id,'status':1},
      success:function(result){
        console.log(result.message);
        location.reload();
      }
    });
   }
   
   function offStat(event){
    var id = $(event).attr('data-id');
    $.ajax({
      url:"{{ route('ques.status') }}",
      method:"get",
      data:{'id':id,'status':0},
      success:function(result){
        console.log(result.message);
        location.reload();
      }
    });
   }
</script>
<script>
   // $('#mcqShowModal').on('show.bs.modal', function (e) {
   //   var questionId = $(e.relatedTarget).attr('data-id');
   //   var dataCount = $(e.relatedTarget).attr('data-count');
   //   $("#mcModTable > tbody"). empty();
   //   $('#showTitle').html('User Vote ('+dataCount+' Votes)')
   //   // alert(questionId);
   //   $.get("{{ route('mcq.showData') }}",{'id':questionId},function(result){
   //       $.each(result,function(key,value){
           
   //         $('#mcqbody').append('<tr id="mcData"><td>'+value.name+'</td><td>'+value.aplha+'</td></tr>');
   //       });
   //   });
   // });
   $('#rateShowModal').on('show.bs.modal', function (e) {
     var questionId = $(e.relatedTarget).attr('data-id');
     var dataCount = $(e.relatedTarget).attr('data-count');
     $("#mcModTable2 > tbody"). empty();
     $('#showTitle2').html('User Vote ('+dataCount+' Votes)')
     // alert(questionId);
     $.get("{{ route('rate.showData') }}",{'id':questionId},function(result){
       console.log(result);
         $.each(result,function(key,value){
           if(value.rate == 1){
             $('#mcqbody2').append('<tr id="mcData"><td>'+value.name+'</td><td><i class="fas fa-star" style="color:#D3BE10;"></i></td></tr>');
           }
           if(value.rate == 2){
             $('#mcqbody2').append('<tr id="mcData"><td>'+value.name+'</td><td><i class="fas fa-star"style="color:#D3BE10;"></i><i class="fas fa-star"style="color:#D3BE10;"></i></td></tr>');
           }
           if(value.rate == 3){
             $('#mcqbody2').append('<tr id="mcData"><td>'+value.name+'</td><td><i class="fas fa-star"style="color:#D3BE10;"></i><i class="fas fa-star"style="color:#D3BE10;"></i><i class="fas fa-star"style="color:#D3BE10;"></i></td></tr>');
           }
           if(value.rate == 4){
             $('#mcqbody2').append('<tr id="mcData"><td>'+value.name+'</td><td><i class="fas fa-star"style="color:#D3BE10;"></i><i class="fas fa-star"style="color:#D3BE10;"></i><i class="fas fa-star"style="color:#D3BE10;"></i><i class="fas fa-star"style="color:#D3BE10;"></i></td></tr>');
           }
           if(value.rate == 5){
             $('#mcqbody2').append('<tr id="mcData"><td>'+value.name+'</td><td><i class="fas fa-star"style="color:#D3BE10;"></i><i class="fas fa-star"style="color:#D3BE10;"></i><i class="fas fa-star"style="color:#D3BE10;"></i><i class="fas fa-star"style="color:#D3BE10;"></i><i class="fas fa-star"style="color:#D3BE10;"></i></td></tr>');
           }
          
         });
     });
   });
   $('#wcShowModal').on('show.bs.modal', function (e) {
     var questionId = $(e.relatedTarget).attr('data-id');
     var dataCount = $(e.relatedTarget).attr('data-count');
     $('#showTitle3').html('User Vote ('+dataCount+' Votes)')
     // alert(questionId);
     $.get("{{ route('wc.showData') }}",{'id':questionId},function(result){
       console.log(result);
         drawDonut(result);
     });
   });
</script>
<script>
   $('#mcqShowModal').on('show.bs.modal', function (e) {
   var questionId = $(e.relatedTarget).attr('data-id');
   var question =  $(e.relatedTarget).attr('data-question');
   // alert(questionId);
   var dataCount = $(e.relatedTarget).attr('data-count');
   $("#showQuestion"). html('<b>'+question+'</b><br />');
   $('#showTitle').html('User Vote ('+dataCount+' Votes)')
   // alert(questionId);
   $('#rightOption').empty();
   $.get("{{ route('mcq.showData') }}",{'id':questionId},function(result){
   drawChart(result);
   $.each(result,function(key,value){
     if(value.correct == 1){
       $('#rightOption').html('<b>The Right Option Is : <strong>' +value.alpha +'</strong></b>');
     }
   });
   });
   });
</script>
<script>
   google.charts.load("current", {packages:["corechart"]});
       google.charts.setOnLoadCallback(drawDonut);
       function drawDonut(result) {
         var data = google.visualization.arrayToDataTable([
           ['Task', 'Hours per Day'],
           ['Word Cloud',     0],
         ]);
         $.each(result,function(key,value){
           data.addRows([[value.answer,value.same]]);
         });
         var options = {
           title: '',
           pieHole: 1,
         };
   
         var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
         chart.draw(data, options);
       }
</script>
@endsection
