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
            background: #910cff;
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
            <span class="mail_heading_c">Dear {{$user->name}},</span>
            {!! $password !!}
            <span class="mail_signoff_c">Thanks & Regards</span>
            <span class="mail_signoff_c">Eventstub 2022</span>
            </div>
            <div class="mail_copyright_c" >© 2021 Eventstub, Inc. </div>
        </div>
   </div>
</body>
</html>
