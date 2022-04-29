<html lang="en">
<head> 
    <style>
        .inner_container_c{
            max-width: 600px;
            margin: 0 auto;
        }
       
    </style>
</head>
<body>
   <div style="flex-direction: column; align-items: center;" class="outer_container_c">
        <div class="inner_container_c">
            <h1>New Account Signup</h1>
            <p>There's a new Account Signup in the Application </p><br/>
            <p>Name: {{$user->name}} &nbsp; {{$user->last_name??''}}</p>
            <p>Email: {{$user->email}}</p>
            <p>TimeStamp: {{$user->created_at}}</p>
        </div>
   </div>
</body>
</html>
