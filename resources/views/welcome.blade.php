<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
  <link rel="icon" type="image/icon" href="upload/image/title_design.jpg">
   <!-- <link href="{{ asset('/css/app.css') }}" rel="stylesheet"> -->
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 50vh;
                margin: 0;
            }

            .full-height {
                height: 50vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 16px;
            }
           .top-left{
            position: absolute;
            left: 10px;
            top: -5px;
           }
            
            
            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .text{
                 position: absolute;
                 top:220px;
                 left:450px;
                 font-size:50px;
                 color:white;
            }
       .content {
                text-align: center;
                color:black;
                position: absolute;
                top:190px;
                left: 190px;
                font-size:27px;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
            .upside{
                position: relative;
                top: -35vh;
            }
                .blue_chat{
                    width:100%;
                    background: blue;
                   position: absolute;
                   top:450px;
                   margin: 0px;
                } 
           .col-md-10{
  width: 100%;
 }
  .col-md-11{
  width: 100%;
  
 }
               .col-md-9{
  width: 60%;
 }
             .mySlides {
                display: none
            }
             .panel{
    
    background-color:white;
    border: 1px solid transparent;
    border-radius: 4px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05)
    padding: 15px;
    position: relative;
    top: -220px;
    left: 0px;
    margin:10px auto;
    box-sizing: border-box;
  
 }
       .panelwritten{
    
    background-color:darkblue;
    border: 1px solid transparent;
    border-radius: 4px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05)
    padding: 15px;
    position: relative;
    top: -220px;
    left: 0px;
    margin:10px auto;
    box-sizing: border-box;
  
 }
 .panel_footer_up{
    
    background-color:darkblue;
    border: 1px solid transparent;
    border-radius: 4px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05)
    padding: 15px;
    position: relative;
    top: -220px;
    left: 0px;
    margin:10px auto;
    box-sizing: border-box;
  
 }
  .panelfooter{
    background-color:black;
    border: 1px solid transparent;
    border-radius: 4px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05)
    padding: 15px;
    margin-top:-200px;
    box-sizing: border-box;
    color: white;
     
 }
      .slideshow-container {
      width: 100%;
       position: absolute;
      top: 100px;
      margin:0px;
      }
 @media only screen and (max-width:1070px){
    .text{
               position: absolute;
                 top:220px;
                 left:350px;
                 font-size:40px;
                 color:white;
    }
 }
 @media only screen and (max-width:900px){
    .text{
               position: absolute;
                 top:220px;
                 left:250px;
                 font-size:40px;
                 color:white;
    }
 }
 @media only screen and (max-width:740px){
    .text{
               position: absolute;
                 top:150px;
                 left:200px;
                 font-size:40px;
                 color:white;
    }
 }
 @media only screen and (max-width:625px){
    .text{
               position: absolute;
                 top:120px;
                 left:150px;
                 font-size:30px;
                 color:white;
    }
 }
 @media only screen and (max-width:450px){
    .text{
               position: absolute;
                 top:120px;
                 left:100px;
                 font-size:20px;
                 color:white;
    }
 }
      @media only screen and (max-width:700px){
        .slideshow-container {
      width: 100%;
       position: absolute;
      top: 80px;
      margin:0px;
      }
      }
      @media only screen and (max-width:500px){
        .slideshow-container {
      width: 100%;
       position: absolute;
      top: 50px;
      margin:0px;
      }
      }
      @media  only screen and (max-width:1024px ){
       .content {
                
                text-align: center;
                color:black;
                position: absolute;
                top:120px;
                left: 190px;
                font-size:22px;
            
            }
      }
      @media only screen and (max-width:800px){
       .content {
                text-align: center;
                color:black;
                position: absolute;
                top:20px;
                left: 20px;
            }
      }
      @media only screen and (max-width:500px){
       .content {
                text-align: center;
                color:black;
                position: absolute;
                top:20px;
                left: 20px;
                font-size:16px;
            }
      }
        </style>
    </head>
    <body>
          
        <div class="flex-center position-ref full-height">

             
                <div class="top-left" id="img_style">
                  <img src="upload/image/bluedisgn.jpg" width="20%" height="20%">
                </div>
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/showposts') }}">Home</a>

                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
                
            @endif
             </div>
            <div class="col-md-10">
                 <div class="panel">
         <div class="mySlides fade">
        <!-- <div class="numbertext">1 / 5</div> -->
        <img src="upload/image/laptop.jpg" style="width:100%;">
         <div class="text">
            <h1 style="color:green">Welcome</h1>
         </div>
       </div>
      <div class="mySlides fade">
        <!-- <div class="numbertext">2 / 5</div> -->
        <img src="upload/image/laptop1.jpg" style="width:100%">
         <div class="text">
            <h1 style="color:yellow">Welcome</h1>
         </div>
        </div>
      <div class="mySlides fade">
        <!-- <div class="numbertext">3 / 5</div> -->
        <img src="upload/image/laptop2.jpg" style="width:100%">
        <div class="text">
            <h1 style="color:white">Welcome</h1>
         </div>
         </div>
        
        </div>
    </div>
      
    <div class="col-md-10">
    <div class="panelwritten">
        <h2 style="color:white;font-weight: bold;">Get Started</h2>
        <h4 style="color: white;font-size:14px;">To start this site you have to<a href="/login" style="text-decoration: none;"> <b style="color:red;cursor: pointer;font-size:16px;"> login </b></a> and <a href="/register" style="text-decoration: none;"> <b style="color:red;cursor: pointer;font-size:16px;">resigter</b></a><br>It's chance to meet new someone new,a chance for them to introduce you to people, places and things that you never knew about that </h4>
    </div>
</div>
 <div class="col-md-10">
    <div class="panelwritten">
         <img src="/upload/image/chatmessage.jpg" height="100%"; width="100%";>
         <div class="content">
             <h1 style ="color:red">Communication</h1>
             <h3>Chat,send data and share your photos and videos</h3>
         </div>
    </div>
</div>
 
             <div class="col-md-11">
    <div class="panelfooter">
          <h1 style="color:skyblue;font-family: Cooper;padding-left:30px;">BO Chatting</h1>
          <h2><a href="/login" style="text-decoration:none;color:white;padding-left:20px;">Sign In</a></h2>
           <h2><a href="/register" style="text-decoration:none;color:white;padding-left:20px;">Sign Up</a></h2> 
          <h2> <a href="/about" style="text-decoration:none;color:white;padding-left:20px">About</a></h2> 
    </div>
</div>
<script>
      var slideIndex = 0;
      showSlides();
      
      function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var upsidedesign = document.getElementById("img_style");
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none"; 
        }

        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1} 
        slides[slideIndex-1].style.display = "block"; 
        setTimeout(showSlides, 5000); // Change image every 2 seconds

      }
    </script>
     
    </body>
</html>
