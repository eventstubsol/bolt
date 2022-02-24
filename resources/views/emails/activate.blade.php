<html lang="en">
<head> 
    <style>
        .inner_container_c{
            max-width: 600px;
            margin: 0 auto;
        }
        .outer_container_c{
            /* display: flex; */
            /* justify-content: center; */
            /* flex-direction: column; */
            /* align-items: center; */
            background: #228b88;
            color: white;
            padding: 20px 0;
            
            font-family: courier, monospace;
        }
        .mail_heading_c{
            display: block;
            font-weight: 900;
            margin-bottom: 10px;
        }
        .main_image_c{
            margin-bottom: 30px;
        }
        .mail_signoff_c{
            display: block;
            font-weight: 900;
            margin-top: 10px;
        }
        .mail_copyright_c{
            width: 100%;
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>
   <div style="flex-direction: column; align-items: center;" class="outer_container_c">
        <div class="inner_container_c">
            <img class="main_image_c" src="{{ assetUrl(getField('logo')) }}" width="600" alt="">
            <div class="body_container_c" >
            <div class="card">
                <div class="card-header">
                    Dear {{$user->name}},
                </div>
                <div class="card-body">
                    <div class="form-control">
                        <label for="">Click The Button To Activate Your Account</label>
                        <a href="@if($user->type == 'attendee'){{ route("active.account.attendee",['user_id'=>$user->id,"subdomain"=>$subdomain]) }}@else {{ route("active.account",$user->id) }}@endif" class="btn btn-primary">Activate</a>
                    </div>
                </div>
            </div>
            <span class="mail_signoff_c">Thanks & Regards</span>
            <span class="mail_signoff_c">{{ assetUrl(getField('logo')) }}</span>
            </div>
            <div class="mail_copyright_c" >© 2021 EventStub, Inc. </div>
        </div>
   </div>
</body>
</html>
