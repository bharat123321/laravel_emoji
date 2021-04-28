<!--  In app.blade.php  we have done various things 
  1. top navigation all done in here like login, register, search,profile

      !-->
 <!DOCTYPE html>
<html>
<head>
  <title>My first design</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/designs.css') }}">
    <!-- <link href="{{ asset('/css/app.css') }}" rel="stylesheet"> -->
</head>
 
  
    <style>
       
          li {
            list-style: none;
        }

        .user-wrapper, .message-wrapper {
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

        .media-body p {
            margin: 6px 0;
           display: flex;
           position: relative;
           left: 20px;

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
            width: 45%;
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

         </style>

</head>
<body>
     
        <div class="nav">

      <div class="search">
         <input type="text" name="search" placeholder="Search" class="search_che">
 </div>
 
<img src="/uploads/avatar/{{Auth::user()->avatar}}" id="profile_design" class="user_profile" value="{{Auth::user()->id}}">     
 <a href="#" class="dropbtn" onclick="document.getElementById('mydropdown').style.display = 'block'"> @if(strlen(Auth::user()->firstname) <=10) {{ucwords(Auth::user()->firstname )}}@else {{substr(ucwords(Auth::user()->firstname ),0,10)}}..  @endif<span class="caret"></span> </a>
   <div class="dropdown" id="mydropdown">

<!-- friend request -->
    <a href="{{url('/friend_request')}}">My Requests  <span style="color:green; font-weight:bold;font-size:16px">({{App\friendship::where('status', Null)->where('acceptor', Auth::user()->id)->count()}})</span></a>
    <!-- ending friend request -->
    <a href="{{ url('/post')}}">Post</a> 
    <a href="{{ url('/profile')}}">Change Profile</a>
    <!-- logout -->
    <a href="{{ route('logout') }}" onclick="event.preventDefault();
   document.getElementById('logout-form').submit();"> Logout  </a>

   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">  {{ csrf_field() }}  </form>
<!-- ending logout --> 
   </div>
      <img src="upload/image/ho.jpg"  class="home_design" onclick="homeclick()" onmouseover="homeover()" onmouseout="homeout()" >   
     <img src="upload/image/addfriend.jpg"  class="add_friend_design" onclick="addclick()" onmouseover="addfriendover()" onmouseout="addfriendout()"> 
     <?php   $v = App\friendship::where('status', Null)->where('acceptor', Auth::user()->id)->count(); ?> 
      <span class="number_of_friend_request"><b>@if($v > 0) ({{App\friendship::where('status', Null)->where('acceptor', Auth::user()->id)->count()}}) @endif</b> </span>  
      <img src="upload/image/notification.jpg"  class="notification_design" onmouseover="notifover()" onmouseout="notifout()">
        <img src="upload/image/mess.jpg"  class="messenger_design" onclick="messengerclick()" onmouseover="messengerover()" onmouseout="messengerout()">  

     </div>
 <div class="allMyhome">
      <div class="hellow">
        @yield('my_notification');

 </div>
</div>

 
     <script type="text/javascript" src="http://laravel/js/jquery-3.4.1.min.js"></script>
       <script type="text/javascript" src="http://laravel/js/mydesing.js"></script>
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

   </body>
   </html>    