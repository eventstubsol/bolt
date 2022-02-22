    <!-- Font link start -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        .botChat {
            background: transparent;
            width: 60px;
            height: 60px;
            border-radius: 100%;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0px;
            position: fixed;
            bottom: 2%;
            left: 0%;
            cursor: pointer;
        }
        
        .botChat img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .clickAfter {
            position: fixed;
            bottom: 0%;
            left: 1%;
            width: 10%;
            transform: translateY(70%);
            transition: all 500ms ease-in-out;
            cursor: pointer;
        }
        
        .activeDiv {
            transform: translateY(0%);
            cursor: auto;
        }
        
        .clickAfter img {
            max-width: 100%;
            width: auto;
        }
        
        .Textblock {
            position: absolute;
            top: 100%;
            left: 110%;
            background: #000000;
            width: 300px;
            border-radius: 7px 4px 4px;
            padding: 10px;
            font-size: 12px;
            transform: translateY(100%);
            transition: all 500ms ease-in-out;
        }
        
        .ActiveTextblock {
            top: 0;
            transform: translateY(0%);
        }
        
        .Textblock::after {
            content: "";
            position: absolute;
            top: 0px;
            left: -33px;
            background: url(images/arrow-iocn2.png) no-repeat center;
            width: 36px;
            height: 42px;
            opacity: 1;
        }
        
        .closebtn {
            position: absolute;
            right: -5px;
            top: -5px;
            border-radius: 100%;
            border: inherit;
            width: 20px;
            height: 20px;
            display: flex;
            justify-content: center;
            cursor: pointer;
            background: #000000c7;
            color: #ff7b7b;
        }
        
        .HelpText {
            position: absolute;
            top: -35px;
            left: 0;
            background: #fff;
            color: #444;
            font-size: 10px;
            line-height: 12px;
            font-weight: 500;
            padding: 7px 5px;
            border-radius: 3px;
            margin: 0;
            text-align: center;
            min-width: 180px;
            transition: all 500ms ease-in-out;
            opacity: 0;
        }
        
        .clickAfter:hover .HelpText {
            opacity: 1;
        }
        
        .activeDiv:hover .HelpText {
            opacity: 0;
            visibility: hidden;
            background: transparent;
            color: transparent;
        }
        
        .HelpText:after {
            content: "";
            position: absolute;
            bottom: -16px;
            left: 20px;
            background: url(/images/arrow-iocn.png) no-repeat center;
            width: 23px;
            height: 100%;
        }
        
        .typed-cursor {
            display: none;
        }
    </style>


    <div class="clickAfter">
        <!-- Hover Text -->
        <p class="HelpText">Need Help?</p>
        <!-- Character Image -->
        <img src="images/avatar.png" alt="" class="clickImg">
        <div class="Textblock">
            <p id="intro" class="m-0"></p>
            <div class="closebtn">x</div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/1.1.4/typed.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".clickImg").click(function() {
                onboard();
            });
            function onboard(){
                $(".clickAfter").addClass("activeDiv");
                $(".Textblock").addClass("ActiveTextblock");
                $('#intro').typed({
                    strings: [
                        "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever"
                    ],
                    typeSpeed: 5,
                    contentType: 'html'
                });
            }
            $(".closebtn").click(function() {
                $(".clickAfter").removeClass("activeDiv");
                $(".Textblock").removeClass("ActiveTextblock");
            });
        });
    </script>