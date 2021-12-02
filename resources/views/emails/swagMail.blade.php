<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html data-editor-version="2" class="sg-campaigns" xmlns="http://www.w3.org/1999/xhtml">
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
      <style type="text/css">
        body, p, div {
          font-family: courier, monospace;
          font-size: 16px;
        }
        body {
          color: #ffffff;
        }
        body a {
          color: #fe5d61;
          text-decoration: none;
        }
        p { margin: 0; padding: 0; }
        table.wrapper {
          width:100% !important;
          table-layout: fixed;
          -webkit-font-smoothing: antialiased;
          -webkit-text-size-adjust: 100%;
          -moz-text-size-adjust: 100%;
          -ms-text-size-adjust: 100%;
        }
        img.max-width {
          max-width: 100% !important;
        }
        .column.of-2 {
          width: 50%;
        }
        .column.of-3 {
          width: 33.333%;
        }
        .column.of-4 {
          width: 25%;
        }
        ul ul ul ul  {
          list-style-type: disc !important;
        }
        ol ol {
          list-style-type: lower-roman !important;
        }
        ol ol ol {
          list-style-type: lower-latin !important;
        }
        ol ol ol ol {
          list-style-type: decimal !important;
        }
        @media screen and (max-width:480px) {
          .preheader .rightColumnContent,
          .footer .rightColumnContent {
            text-align: left !important;
          }
          .preheader .rightColumnContent div,
          .preheader .rightColumnContent span,
          .footer .rightColumnContent div,
          .footer .rightColumnContent span {
            text-align: left !important;
          }
          .preheader .rightColumnContent,
          .preheader .leftColumnContent {
            font-size: 80% !important;
            padding: 5px 0;
          }
          table.wrapper-mobile {
            width: 100% !important;
            table-layout: fixed;
          }
          img.max-width {
            height: auto !important;
            max-width: 100% !important;
          }
          a.bulletproof-button {
            display: block !important;
            width: auto !important;
            font-size: 80%;
            padding-left: 0 !important;
            padding-right: 0 !important;
          }
          .columns {
            width: 100% !important;
          }
          .column {
            display: block !important;
            width: 100% !important;
            padding-left: 0 !important;
            padding-right: 0 !important;
            margin-left: 0 !important;
            margin-right: 0 !important;
          }
          .social-icon-column {
            display: inline-block !important;
          }
        }
        h5, p{
            margin-left: 3rem;
        }
        .last-body{
            margin-bottom: 3rem;
        }
      </style>
          <!--user entered Head Start-->
    
         <!--End Head user entered-->
    </head>
    <body>
        @php
            $logo = App\Content::where('event_id',$event->id)->where('name','logo');
            if($logo->count() < 1){
                $logo = App\ContentMaster::where('name','logo');
            }
        @endphp
            <div class="row">
                <div class="wrapper">
                    <div class="card">
                        <div class="card-header">
                            <center> <img src="{{ assetUrl($logo->first()->value) }}" alt="No Image" width="300"></center>
                        </div>
                        <div class="card-body">
                            <h5><strong>Dear {{ $user->name }} {{ $user->last_name }},</strong></h5>
                             <p>Here are your {{ $event->name }}  SwagBag resources.  Please click on the title to download the resources to your PC or Smart Tablet:</p>
                             <ul>
                                @foreach ($resources as $resource)
                                <li>{{ $resource['title'] }} <a href="{{ $resource['link'] }}" download="download">Download</a></li>
                                @endforeach  
                            </ul>
                            <hr>
                            <p>Be on the lookout for our e-mails as we’ll keep you posted on The {{ $event->name }} updates.</p>
                            <p>If you want to know more or just want to say hi, drop us a mail at info@globalcioforum.com and our team will get back to you in no time.</p>
                            <p>Thank you for attending The {{ $event->name }} </p>   
                            <p class="last-body">
                                Thanks & Regards,<br>
                                {{ $event->name }}
                            </p>    
                        </div>
                        <hr>
                        <div class="card-footer">
                           <center>© 2021 Eventstub. </center> 
                        </div>
                    </div>
                </div>
            </div>
      

    </body>
