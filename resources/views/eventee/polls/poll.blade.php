<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    <link href="https://coderthemes.com/ubold/layouts/assets/css/config/default/app.min.css" rel="stylesheet" type="text/css" id="app-style"/>
</head>
<body>
    <div class="card">
        <div class="card-body">
                <div id="progressbarwizard">

                    <ul class="nav nav-pills bg-light nav-justified form-wizard-header mb-3" style="display: none;">
                        @foreach ($poll->questions as $n => $question)

                            <li class="nav-item">
                                <a href="#question-{{$n}}" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2 @if($n==0) active @endif">
                                    <i class="mdi mdi-account-circle me-1"></i>
                                    <span class="d-none d-sm-inline">{{$question->question}}</span>
                                </a>
                            </li>
                      
                        @endforeach

                    </ul>
                
                    <div class="tab-content b-0 mb-0 pt-0">
                        @if(count($poll->questions)>1)
                            <div id="bar" class="progress mb-3" style="height: 7px;">
                                <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success" style="width: 33.3333%;"></div>
                            </div>
                        @endif
                        @foreach ($poll->questions as $n=> $question)
                
                            <div class="tab-pane @if($n == 0) active @endif" id="question-{{$n}}">
                                <h2>{{ $question->question}}</h2>
                                <div class="row">
                                    <div class="col-12">
                                        @foreach ($question->options as $option)

                                            <div class="row mb-3">
                                                <button class="btn btn-primary option option-{{$n}}" data-id="{{$option->id}}" data-question="{{$question->id}}">{{$option->answer}}</button>
                                                {{-- <div class="progress mb-2 mt-2">
                                                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div> --}}
                                            </div>
                                        @endforeach    
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                            </div>
                        @endforeach

                        <ul class="list-inline mb-0 wizard">
                            {{-- <li class="previous list-inline-item disabled">
                                <a href="javascript: void(0);" class="btn btn-secondary">Previous</a>
                            </li> --}}
                            @if(count($poll->questions)>1)
                                <li class="next list-inline-item float-end">
                                    <a href="javascript: void(0);" class="btn btn-secondary">Next</a>
                                </li>
                            @endif
                        </ul>

                    </div> <!-- tab-content -->
                </div> <!-- end #progressbarwizard-->

        </div> <!-- end card-body -->
    </div>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    
    <script src="https://coderthemes.com/ubold/layouts/assets/js/vendor.min.js"></script>
    <script src="https://coderthemes.com/ubold/layouts/assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
    <script src="https://coderthemes.com/ubold/layouts/assets/js/pages/form-wizard.init.js"></script>
    <script src="https://coderthemes.com/ubold/layouts/assets/js/app.min.js"></script>
    
    <script>
        $(document).ready(function(){
            $(".option").on("click",function(){
                var id = $(this).data("id");
                var n = $(this).data("n");
                var question = $(this).data("question");
                console.log("hello")
                console.log($(this).data("id"))
                console.log($(this).data("question"))
                vote(id,question,n)
            })

            function vote(id,question,n) {
                window.n = n;
                var poll = "{{$poll->id}}";
                $.ajax({
                    url: '{{route("eventee.vote",["id"=>$id,"poll"=>$poll->id])}}',
                    method: "POST",
                    data: {
                        option:id,
                        question
                    },
                    success: (response) =>  {
                        // if(response)
                        console.log(JSON.parse(response))
                        // console.log({response,test:this})
                    }
                });
            }
        })
    </script>
</body>
</html>