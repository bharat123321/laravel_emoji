 <!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
     
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>My Project</title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/designs.css') }}">
    <!-- <link href="{{ asset('/css/app.css') }}" rel="stylesheet"> -->
         
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
.total_post{
    color:black;
    float: right;
    position: relative;
    top:-5vw;
    font-size: 2vw;
   }
    @media only screen and (max-width:415px){
  .total_post{
    color:blue;
    float: right;
    position: relative;
    top:-5vw;
    left: 20px;
    font-size: 15px;
   }
 }
   .total_friend{
    color:black;
    float: right;
    position: relative;
    top:-3vw;
    left:4em;
     font-size: 2vw;
   } 
     @media only screen and (max-width:415px){
 .total_friend{
    color:black;
    float: right;
    position: relative;
    top:0vw;
    left:80px;
     font-size:15px;
   } 
 }
 @media only screen and (max-width:320px){
  .take_up{
    position: relative;
    top: -13px;
  }
 }
   
   .fetch_all_photo{
    color:blue;
    text-decoration: none;
    font-size:17px;
    float: left;
    margin: -5px 10px;
   }
   .fetch_all_video{
    color:blue;
    text-decoration: none;
    font-size:17px;
    float: left;
   margin: -5px 10px;
   }
   .fetch_all_friend{
color:darkblue;
    text-decoration: none;
    font-size:17px;
    float: left;
   margin: -5px 10px;
   }
   .fetch_all_mutual_friend{
    color:darkblue;
    text-decoration: none;
    font-size:17px;
    float: left;
   margin: -5px 10px;
   }
   .fetch_all_null_mutual_friend{
    color:darkblue;
    text-decoration: none;
    font-size:17px;
    float: left;
   margin: -5px 10px;
   }
   @media only screen and (max-width:554px){
     
     .fetch_all_mutual_friend{
    color:darkblue;
    text-decoration: none;
    font-size:17px;
    float: left;
   margin: 10px 10px;
   }
   .fetch_all_null_mutual_friend
   {
     color:darkblue;
    text-decoration: none;
    font-size:17px;
    float: left;
   margin: 10px 10px;
   }
 }
 @media only screen and (max-width:320px){
     

     .fetch_all_friend{
    color:darkblue;
    text-decoration: none;
    font-size:17px;
    float: left;
   position: relative;
   top: 10px;
   }
   .fetch_all_mutual_friend{
    color:darkblue;
    text-decoration: none;
    font-size:17px;
    float: left;
   position: relative;
   left: 65px;
   top:-15px;
   }
   .fetch_all_null_mutual_friend{
    color:darkblue;
    text-decoration: none;
    font-size:17px;
    float: left;
   position: relative;
   left: 65px;
   top:-15px;
   }
 }
   .navbar{
    background-color: white;
    height: 50px;
    margin:0px;
   }
   .close{
    position: relative;
    top: -30px;
    right:-20px;
    float: right;
    font-size: 41px;
    line-height: 1;
    color: #000;
    text-shadow: 0 1px 0 #fff;
    opacity: 2;
    filter: alpha(opacity=20);
    cursor: pointer;
}
#fetching_img_vid{
  display: none;
}


/* Set a style for all buttons */
 

/* Extra styles for the cancel button */
#cancelbtn {
   
    padding: 10px 18px;
    background-color: #f44336;
    float: right;
    position: absolute;
    right: 0px;
    bottom: 1px;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 20%;
    border-radius: 10%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}



         </style>

</head>
<body>
 <div id="app">
       <div class="navbar">
           <a href="/showposts" style="color:red;text-decoration: none;"><b style="font-size:28px">&#8592;</b>Back</a> 

       </div>
 
             
        

  
 
 @yield('my_way')
 <div id="id01" class="modal">
 <div class="modal-content animate" enctype="multipart/form-data" id="check_form">
    
 
            <table>
            <div class="fetch_tag">

            </div>
</table>
       
      <input type="button" id="check_submit"  value="Done" style="width:auto;position: relative;bottom:-20px;" class="btn-danger">
      
  
    <div class="container">
   <button type="button" class="btn-btn-primary" style=" float:right;position: relative;right:-20px;bottom:45px;" onclick="document.getElementById('id01').style.display='none'">Cancel</button>
     
    </div>
 </div>
</div>
</div> 
 



    
     <!-- <script src="http://js.pusher.com/3.1/pusher.min.js"></script> -->
 <script type="text/javascript" src="http://laravel/js/jquery-3.4.1.min.js"></script>
       <!-- <script type="text/javascript" src="http://laravel/js/mydesing.js"></script> -->
      <script type="text/javascript" src="{{asset('/js/likesd.js')}}"></script>
      <script type="text/javascript" src="http://laravel/js/comment/comment_submits.js"></script>
      <script type="text/javascript" src="{{asset('http://laravel/js/commented.js')}}"></script>
      <script type="text/javascript" src="{{asset('http://laravel/js/dislike.js')}}" ></script>
      <script type="text/javascript" src="{{asset('js/message_index.js')}}"></script>  <script type="text/javascript" src="{{asset('js/showlikeds.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/searched.js')}}"></script>
       <script type="text/javascript">
    
    var token = '{{Session::token()}}';
    var urlLike = "{{url('liked')}}" ;
  var urldislike = "{{url('dislike')}}"; 
</script>
    <!-- Scripts --> 
     <!-- Scripts for searching --> 
     <script type="text/javascript">
      $(document).ready(function(){
        $('.fetch_all_photo').click(function(){
          var s = $(this).attr('id');
          
                 $.ajax({
                   type:'get',
                   url:'/fetch_all_photo/'+s,
                   data:'',
                   cache:false,
                   beforeSend:function(){
                   $('#fetching_img_vid').css('display','block');
                   },
                   success:function(data){
                 $('#fetch_all_photo').html(data);
                   },
                 })
        });
         $('.fetch_all_video').click(function(){
          var s = $(this).attr('id');
                 $.ajax({
                   type:'get',
                   url:'/fetch_all_video/'+s,
                   data:'',
                   cache:false,
                   beforeSend:function(){
                    $('#fetching_img_vid').css('display','block');
                   },
                   success:function(data){
                 $('#fetch_all_photo').html(data);
                   },
                 })
        });
         $('.fetch_all_friend').click(function(){
            var id = $(this).attr('id');
          
                 $.ajax({
                   type:'get',
                   url:'/fetch_all_user_friend/'+id,
                   data:'',
                   cache:false,
                   beforeSend:function(){
                   window.location = 'http://laravel/fetch_all_user_friend/'+id;
                   },
                   success:function(data){
                 $('#showphoto').html(data);
                   },
                 })
        });
         $('.fetch_all_mutual_friend').click(function(){
            var id = $(this).attr('id');
            alert(id)
                 $.ajax({
                   type:'get',
                   url:'/fetch_all_mutual_friend/'+id,
                   data:'',
                   cache:false,
                   beforeSend:function(){
                   window.location = "http://laravel/fetch_all_mutual_friend/"+id;
                   },
                   success:function(data){
                 $('#showphoto').html(data);
                   },
                 })
        });

   $('.friend_profile').click(function(){
      var id = $(this).attr('value');
      alert(id)
      $.ajax({
        type:'get',
        url:'/showAll_image_ofFriend/'+id,
        data:false,
         before:function(){
           $('#loading').css("display","block");
        },
        complete:function(){
           $('#loading').css("display","none");
          window.location='http://laravel/showAll_image_ofFriend/'+id;
        },
        success:function(data){
          $('#bharat').html(data);
          
        }
      })
    })

      $('.tag_value').click(function(){
        var tag_va = $(this).attr('value');
         $.ajax({
           type:'get',
           url:'/tag_count/'+tag_va,
           data:'',
           cache:false,
           success:function(data){
            $('.fetch_tag').html(data);
           },
         })
      })

      });
    </script>
 
   
</body> 
</html>















