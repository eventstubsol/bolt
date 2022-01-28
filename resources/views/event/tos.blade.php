<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Privacy Policy / Terms & Conditions</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css">
    <link rel="shortcut icon" href="{{assetUrl(getField("favicon"))}}">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}" type="text/css">
    <style>
    h2{
        margin-top: 30px !important;
    }
    </style>
</head>

<body>
    <div class="wrapper my-5">
        <div class="page">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Privacy Policy</h1>
                            {!! html_entity_decode($tos) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>