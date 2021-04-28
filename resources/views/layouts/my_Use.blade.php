<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
     
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/designs.css') }}">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
      <!-- <link href="{{ asset('/css/story.css') }}" rel="stylesheet"> -->
     <!-- Scripts -->
      <!-- <link rel="stylesheet" href="{{ asset('/css/ju.css') }}"> -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
         <style>
       
        body{
          background: black;
        }
         

          li {
            list-style: none;
        }

        .user-wrapper, .message-wrapper {
          background: white;
            border: 1px solid #ddd;
            overflow-y: auto;
        }

        .user-wrapper {
            height: 600px;
        }
       
        .user {
            cursor: pointer;
            padding: 5px 0;
            position: relative;
            left:-30px;
        }

        .user:hover {
          margin: 0px;
            background: #eeeeee;
        }

        .user:last-child {
            margin-bottom: 0;
        }

        .pending {
            position: absolute;
            left: 13px;
            top: 9px;
            background: #b600ff;
            margin: 0;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            line-height: 18px;
            padding-left: 5px;
            color: #ffffff;
            font-size: 12px;
        }

        .media-left {
            margin: 0 10px;
        }

        .media-left img {
            width: 64px;
            border-radius: 64px;
        }
        .media-object{
          width: 64px;
            border-radius: 64px;
        }
        .media-body p {
            margin: 6px 0;
           display: flex;
           position: relative;
           left: 10px;

        }
        .media-body p .name{
            font-size: 2.2%;
        }

         .message-wrapper {
            padding: 10px;
            height: 536px;
            background: white;
            border-radius:10px 10px;
        }
         @media only screen and (max-width:991px){  
      .message-wrapper {
             position: relative;
             left: 50px;
            height: 536px;
            background: white;
            border-radius:10px 10px;
      }
      .input_desing{
         position: relative;
             left: 50px;
             
      }
      }
          @media only screen and (max-width:360px){  
      .message-wrapper {
             position: relative;
             left: 20px;
            height: 536px;
            background: white;
            border-radius:10px 10px;
      }
      .input_desing{
         position: relative;
             left: 20px;
             
      }
      }
        .message-wrappered {
            padding: 10px;
            height: 536px;
            background: #eeeeee;
        }

        .messages .message {
            margin-bottom: 15px;
        }

        .messages .messagess{
            margin-bottom: 0;
        }

        .received, .sent {
           display: inline-block;
            padding: 3px 3px;
            border-radius: 20px;
        }

        .received {
            background: black;
            color: white;
            margin-left:40px;
        }

        .sent {
            background:skyblue;
            float: right;
            text-align: right;
        }
        


        .message p {
            margin: 5px 0;
        }

        .date {
            color: #777777;
            font-size: 12px;
        }

        .active {
            background: skyblue;
        }
        .input_desing {
            width: 100%;
            padding: 12px 20px;
            margin: 15px 0 0 0;
            display: inline-block;
            border-radius: 4px;
            box-sizing: border-box;
            outline: none;
            border: 1px solid #cccccc;
        }
        .input_desing .submit {
            width: 100%;
            padding: 12px 20px;
            margin: 15px 0 0 0;
            display: inline-block;
            border-radius: 4px;
            box-sizing: border-box;
            outline: none;
            border: 1px solid #cccccc;
        }

        .input_desing .submit:focus {
            border: 1px solid #aaaaaa;
        }
        .menu ul{
            list-style: none;
        }
       .menu  ul li{
             
            /*background: red;
            border: 1px solid gray;
             width: 120px;
             height: 35px;
             line-height: 35px;
             text-align: center; */

             float: left;
           position: relative;
              
        }
        .menu ul li a{
            text-decoration: none;
             color:white; 
             display: block;
        }
        .menu ul li a:hover{
             border-radius: 20px;
            background: gray;
            cursor: pointer;
            color: black;
        }
        .menu ul li ul{
            color: black;
     position: absolute;
     top: 100%;
    left: 0;
    z-index: 1000;
    display: none;
    min-width: 160px;
     padding: 5px 0;
    margin: 2px 0 0; 
    list-style: none;
    font-size: 14px;
    text-align: left;
    background-color: #fff;
    border: 1px solid #ccc;
    border: 1px solid rgba(0,0,0,.15);
    border-radius: 4px;
    box-shadow: 0 6px 12px rgba(0,0,0,.175);
    background-clip: padding-box
        }
        .menu ul li:hover > ul{

            display: block;
        }
  .closed_messag_box{
    position: absolute;
    top: -30px;
    right: 0px;
    float: right;
    font-size: 41px;
    line-height: 1;
    color: white;
    text-shadow: 0 1px 0 #fff;
    opacity: 2;
    filter: alpha(opacity=20);
    cursor: pointer;
}
         </style>

</head>
<body>
 <div id="app">
   
  
<nav class="navbar navbar-default">  
  <div class="container-fluid">  
    <div class="navbar-header"> 
    <a class="navbar-brand" href="/showposts" style="color:red"><b style="font-size:20px">&#8592;</b>Back</a>   
      <a class="navbar-brand" href="#">Messenger</a>  
    </div> 

</div>
 
</nav>
 @yield('my_use')
</div>





    
     <!-- <script src="http://js.pusher.com/3.1/pusher.min.js"></script> -->
 <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
       <script type="text/javascript" src="js/uptonaves.js"></script>
      <script type="text/javascript" src="{{asset('/js/likes.js')}}"></script>
      <!-- <script type="text/javascript" src="{{asset('js/message_index.js')}}"></script>    -->
      <script type="text/javascript" src="{{asset('js/showlikeds.js')}}"></script>
    <!-- Scripts --> 
     <!-- Scripts for searching --> 
     

 
<script>
    var receiver_id = '';
    var my_id = "{{ Auth::id() }}";
    $(document).ready(function () { 
        //ajax setup form csrf token
         setTimeout(realTime,2000);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
         

                 $('.user').click(function() {
                    $('.user').removeClass('active');
                    $(this).addClass('active');
                    receiver_id = $(this).attr('id');

                    $.ajax({
                type: "get",
                url: "messaged/" + receiver_id, // need to create this route
                data:  '',
                cache: false,
                success: function (data) {
         
                      $('#messages').html(data);
    
                      scrollToBottomFunc();
                    
                }
            });
                 });


        $(document).on('keyup', '.input_desing .submit', function (e) {
            var message = $(this).val();
     // check if enter key is pressed and message is not null also receiver is selected
            if (e.keyCode == 13 && message != '' && receiver_id != '') {
                 
                $(this).val(''); // while pressed enter text box will be empty

                var datastr = "receiver_id=" + receiver_id + "&message=" + message;
                  
                $.ajax({
                    type: "post",
                    url: "/messaged", // need to create this post route
                    data: datastr,
                    cache: false,
                     success: function (data) {
                          $('.message-wrapper').html(data);
                          
                    },
                    error: function (jqXHR, status, err) {
                    },
                    complete: function () {

                        scrollToBottomFunc();
                    },
                     
                });
            }
        });
      function realTime(){
        da = "receiver_id="+receiver_id;

           $.ajax({
             type:'post',
             url:'/chat',
             data:da,
             success:function(data){
                 $('.message-wrapper').html(data);
               
             }
          });
           setTimeout(realTime,2000);
      }

        });

    function scrollToBottomFunc (){
        $('.message-wrapper').animate({
             scrollTop: $('.message-wrapper').get(0).scrollHeight},50);    }
    
</script>
  <script>
// Get the modal
var modal = document.getElementById('story_fetch');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script> 
  <script type="text/javascript">
    $(document).ready(function(){
      // setTimeout(toremove,1000);
      
     })
   function toremove(){
    if(innerWidth < 991)
    {
       document.querySelector('.user-wrapper').style.display = 'none';
      
    }

    else {
      document.querySelector('.user-wrapper').style.display = 'block';
     
   }
      
      setTimeout(toremove,1000);
   
    }

function closed_mess(){
    
  window.location='http://laravel/message';
  
    
 }
$(document).ready(function(){
   $('.closed_messag_box').click(function(){
        alert('he')
       })
})
  </script>
    
</body> 
</html>















