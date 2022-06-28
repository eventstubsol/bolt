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
        .custom_card {
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

<body class="p-0" style="background: white">

    @foreach ($poll->questions as $n => $question)
        <div class="">
            <h2>{{ $question->question }}</h2>
            <div class="row">
                <div class="col-12">
                    @foreach ($question->options as $option)
                        <div class="row mb-3 options option-{{ $option->id }}" data-id="{{ $option->id }}">
                            <button disabled
                                class="btn btn-primary option disabled optionButton-{{ $option->id }} option-{{ $n }}"
                                data-id="{{ $option->id }}"
                                data-question="{{ $question->id }}">{{ $option->answer }} -
                                {{ $option->voteCount }} Votes </button>
                            <div class="progress mb-2 mt-2 w-100 ">
                                <div class="progress-bar option_progress progress-{{ $option->id }} progress-bar-striped"
                                    role="progressbar" style="width: {{ $option->percent ?? 0 }}%"
                                    aria-valuenow="{{ $option->percent ?? 0 }}" aria-valuemin="0" aria-valuemax="100">
                                    {{ $option->percent }}%</div>
                            </div>
                        </div>
                    @endforeach
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div>
    @endforeach


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="{{ asset('assets/js/vendor.min.js') }}?cb=2187236762822"></script>
    <script src="{{ asset('assets/js/app.min.js') }}?cb=2187236762822"></script>

    <script
        src="https://coderthemes.com/ubold/layouts/default/assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js">
    </script>
    <script src="https://coderthemes.com/ubold/layouts/default/assets/js/pages/form-wizard.init.js"></script>

</body>

</html>
