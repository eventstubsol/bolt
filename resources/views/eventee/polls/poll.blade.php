<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}?cb=2187236762822" type="text/css">
    <link rel="stylesheet" href="{{ asset('event-assets/css/app.css') }}?cb=2187236762822">
    <style>
        .custom_card{
            height: 100vh;
            display: flex;
            justify-content: center;
            flex-direction: column;
            /* align-items: center; */
            /* width: 100%; */
            text-align: center;
        }
    </style>
    {{-- <link href="https://coderthemes.com/ubold/layouts/assets/css/config/default/app.min.css" rel="stylesheet" type="text/css" id="app-style"/> --}}
</head>

<body class="p-0">
    <div class="card custom_card m-0">
        <div class="card-body flex-auto">
            <div id="progressbarwizard">

                <ul class="nav nav-pills bg-light nav-justified form-wizard-header mb-3" style="display: none;">
                    @foreach ($poll->questions as $n => $question)
                        <li class="nav-item">
                            <a href="#question-{{ $n }}" data-bs-toggle="tab" data-toggle="tab"
                                class="nav-link rounded-0 pt-2 pb-2 @if ($n == 0) active @endif">
                                <i class="mdi mdi-account-circle me-1"></i>
                                <span class="d-none d-sm-inline">{{ $question->question }}</span>
                            </a>
                        </li>
                    @endforeach

                </ul>

                <div class="tab-content b-0 mb-0 pt-0">
                    @if (count($poll->questions) > 1)
                        <div id="bar" class="progress mb-3" style="height: 7px;">
                            <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success"
                                style="width: 33.3333%;"></div>
                        </div>
                    @endif
                    @foreach ($poll->questions as $n => $question)
                        <div class="tab-pane @if ($n == 0) active @endif"
                            id="question-{{ $n }}">
                            <h2>{{ $question->question }}</h2>
                            <div class="row">
                                <div class="col-12">
                                    @foreach ($question->options as $option)
                                        <div class="row mb-3 options option-{{ $option->id }}"
                                            data-id="{{ $option->id }}">
                                            <button
                                                class="btn w-100 btn-primary option optionButton-{{ $option->id }} option-{{ $n }}"
                                                data-id="{{ $option->id }}"
                                                data-question="{{ $question->id }}">{{ $option->answer }}</button>
                                            <div class="progress option_progress mb-2 mt-2 w-100 hidden">
                                                <div class="progress-bar  progress-{{ $option->id }} progress-bar-striped"
                                                    role="progressbar" style="width: 10%" aria-valuenow="10"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
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
                        @if (count($poll->questions) > 1)
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

    <script src="{{ asset('assets/js/vendor.min.js') }}?cb=2187236762822"></script>
    <script src="{{ asset('assets/js/app.min.js') }}?cb=2187236762822"></script>

    <script
        src="https://coderthemes.com/ubold/layouts/default/assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js">
    </script>
    <script src="https://coderthemes.com/ubold/layouts/default/assets/js/pages/form-wizard.init.js"></script>

    <script>
        $(document).ready(function() {
            $(".option").on("click", function() {
                var id = $(this).data("id");
                var n = $(this).data("n");
                var question = $(this).data("question");
                console.log("hello")
                console.log($(this).data("id"))
                console.log($(this).data("question"))
                vote(id, question, n)
            })
            $(".next").on("click", () => {
                $(".option_progress").addClass("hidden");

                $(".option").removeClass("disabled");
                $(".option").attr("disabled", false);;
            })

            function vote(id, question, n) {
                window.n = n;
                var poll = "{{ $poll->id }}";
                $.ajax({
                    url: '{{ route('eventee.vote', ['id' => $id, 'poll' => $poll->id]) }}',
                    method: "POST",
                    data: {
                        option: id,
                        question
                    },
                    success: (response) => {
                        // if(response)
                        console.log(JSON.parse(response))
                        $(".option").addClass("disabled");
                        $(".option").attr("disabled", true);;
                        $(".option_progress").removeClass("hidden");
                        let res = JSON.parse(response);
                        let results = res.results;
                        let vote = res.yourVote;
                        let options = $(".options");

                        options.each((index, option) => {
                            option = $(option);
                            let opId = option.data("id");
                            if (results[opId]) {

                                let button = $(".optionButton-" + opId);
                                let percent = $(".progress-" + opId);
                                // console.log(opId);
                                if (opId == vote) {
                                    button.removeClass('btn-primary');
                                    button.addClass('btn-success');
                                }
                                let result = results[opId];
                                console.log({
                                    result,
                                    percent
                                })
                                // percent.attr("aria-valuenow",result.percent);
                                percent.css({
                                    width: `${result.percent}%`
                                })
                                button.parent().append(`<span>${result.voteCount}</span>`)
                            }
                        });

                        // console.log({response,test:this})
                    }
                });
            }
        })
    </script>
</body>

</html>
