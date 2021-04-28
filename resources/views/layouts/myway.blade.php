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
   @media only screen and (max-width:554px){
     
     .fetch_all_mutual_friend{
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
     <div class="nav">
       
      <div class="search">
        <form method="get" id="form-data">
          
         <input type="text" name="search"  onkeyup="document.getElementById('showsearch').style.display='block'" style="width:auto"; placeholder="Search" id="search_people" class="search_che">
         
       </form>
 </div>
 
   <a href="/showAll_image">  <img src="/uploads/avatar/{{Auth::user()->avatar}}" id="profile_design"></a>
 
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
  <img src="/upload/image/ho.jpg"  class="home_design" onclick="homeclick()" onmouseover="homeover()" onmouseout="homeout()"> 
      <!-- <img src="upload/image/home.jpg"  class="home_design" onclick="homeclick()" onmouseover="homeover()" onmouseout="homeout()" >    -->
     <img src="upload/image/addfriend.jpg"  class="add_friend_design" onclick="addclick()" onmouseover="addfriendover()" onmouseout="addfriendout()"> 
     <?php   $v = App\friendship::where('status', Null)->where('acceptor', Auth::user()->id)->count(); ?> 
      <span class="number_of_friend_request"><b> ({{App\friendship::where('status', Null)->where('acceptor', Auth::user()->id)->count()}})  </b> </span>  
      <img src="upload/image/notification.jpg"  class="notification_design" onclick="notifyclick()" onmouseover="notifover()" onmouseout="notifout()">
       
      <span class="number_of_notifcation"><b>
      <?php   $like_count = App\notify::where('like_status',1)->where('replies_user_id',Auth::user()->id)->count();
        $comment_count = App\notify::where('comment_status',1)->where('replies_user_id',Auth::user()->id)->count();
        $add_like_comment = $like_count + $comment_count;
       ?>
       ({{$add_like_comment}}) </b> </span>
             

        <img src="upload/image/mess.jpg"  class="messenger_design" onclick="messengerclick()" onmouseover="messengerover()" onmouseout="messengerout()">  
   
     </div>
 
                            <div id="showsearch"> 
       </div>
       <div class="allMyhome">
      <div class="hellow">

  
 
 @yield('my_way')
  


</div>
</div>
  
<div id="id01" class="modal" >
 <form class="modal-content animate" method="post" action="/post_edit"  id="check_form">
  {{csrf_field()}}
      <table style=" margin: auto 40%;position: relative;top:20px; font-size: 25px;">
          <tr><td style="font-weight: bold"> Edit Post </td></tr>
           <tr>
            <td>
           <select name="edit_post_show">
             <option>public</option>
             <option>private</option>
            </select>
         </td>
           </tr>
</table>
   
    <div class="fetching_data">
 </div>
     <input type="submit"  value="Done" style="width:auto;position: relative;bottom:-20px;" class="btn-danger">
       
    <div class="container">
   <button type="button" class="btn-btn-primary" style=" float:right;position: relative;right:-20px;bottom:45px;" onclick="document.getElementById('id01').style.display='none'">Cancel</button>
     
    </div>
 </form>
</div>
 

 



    
     <!-- <script src="http://js.pusher.com/3.1/pusher.min.js"></script> -->
 <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
       <script type="text/javascript" src="js/mydesings.js"></script>
      <script type="text/javascript" src="{{asset('/js/likesd.js')}}"></script>
      <script type="text/javascript" src="js/comment/comment_submits.js"></script>
      <script type="text/javascript" src="{{asset('/js/commented.js')}}"></script>
      <script type="text/javascript" src="{{asset('/js/dislike.js')}}" ></script>
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
         $('.add_sent').click(function(){
            received = $(this).attr('value');
            
           $vm = $(this);
            $.ajax({
                    type: "get",
                    url: "/addFriend/"+received, // need to create this post route
                    data: '' ,
                    cache: false,
                     beforeSend:function(){
                     $vm.text('Please Wait..');
                    
                 },
                     success: function (data) {
                          // $('.add_sent').html(data);
                          
                    },
                    error: function (jqXHR, status, err) {
                    },
                    complete: function () {
                       
                $vm.text("Sending Req").css('background','gray');
                         
                    },
                     
                });
         });
          $('.delete_sent').click(function(){
           received = $(this).attr('value');
           $vm = $(this);
            $.ajax({
                    type: "get",
                    url: "/unfriend/"+received, // need to create this post route
                    data: '' ,
                    cache: false,
                    beforeSend:function(){
                     
                  // $('.delete_sent').html("please wait......");
                  $vm.text('Please Wait....');
               
                   },
                     success: function (data) {
                          $('.addinfo').html(data);
                          
                    },
                    error: function (jqXHR, status, err) {
                    },
                    complete: function () {
                      // $('.add_sent').text("Add Friend").css('background','blue');

                   $vm.siblings('.add_sent').text("Add Friend").css('background','blue');
                    
                         $vm.text('Delete Friend');
                    },
                     
                });
         });
          $('.block_sent').click(function(){
           received = $(this).attr('value');
           $vm = $(this);
              alert(received)
            $.ajax({
                    type: "get",
                    url: "/block/"+received, // need to create this post route
                    data: '' ,
                    cache: false,
                    beforeSend:function(){
                     
                  // $('.delete_sent').html("please wait......");
                  $vm.text('Please Wait....');
               
                   },
                     success: function (data) {
                          
                    },
                    error: function (jqXHR, status, err) {
                    },
                    complete: function () {
                     $vm.text("UnBlock Friend").css('background','white').css('color','black');
                   },
                     
                });
           });
          $('.unblock_sent').click(function(){
           received = $(this).attr('value');
           $vm = $(this);
              alert(received)
            $.ajax({
                    type: "get",
                    url: "/unblock/"+received, // need to create this post route
                    data: '' ,
                    cache: false,
                    beforeSend:function(){
                     
                  // $('.delete_sent').html("please wait......");
                  $vm.text('Please Wait....');
               
                   },
                     success: function (data) {
                         
                          
                    },
                    error: function (jqXHR, status, err) {
                    },
                    complete: function () {
                     $vm.text("Block Friend").css('background','gray').css('color','white');
                   },
                     
                });
           });
        });

      </script>
     
    <script type="text/javascript">
      $(document).ready(function(){
        $('.fetch_all_photo').click(function(){
          var s = $(this).attr('id');
          alert(s)
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
          alert(id)
                 $.ajax({
                   type:'get',
                   url:'/fetch_all_friend/'+id,
                   data:'',
                   cache:false,
                   beforeSend:function(){
                   window.location = 'http://laravel/fetch_all_friend/'+id;
                   },
                   success:function(data){
                 $('#showphoto').html(data);
                   },
                 })
        });

      });
    </script>
 
   <script type="text/javascript">
      $(document).ready(function(){
        $('.replytocomment').click(function(){
           var name = $(this).attr('value');
            var ats = $(this).attr('data-id'); 
            var datas = "firstname"+name;
             
            $.ajax({
             type:'get',
             url:'/repldesign/'+ats+'/'+name,
             data:datas,
             cache:false,
            success:function(data){
              // alert(data)
              $('#get_reply_form').html(data);
             $('.modal_content').css('display','block').fadeIn(300);
                    $('#close').click(function(){
                 $('.modal_content').css('display','block').fadeOut(300);
              })
           }
           })
        })
         $('.Fromcomment').click(function(){
          
            var id = $(this).attr('id'); 
             
            $.ajax({
             type:'get',
             url:'/commentdesign/'+id,
             data:'',
             cache:false,
            success:function(data){
              $('#get_reply_form').html(data);
              $('.modal_content').css('display','block').fadeIn(300);
               $('#close').click(function(){
                 $('.modal_content').css('display','block').fadeOut(300);
              })
            
           }
           })
        })

                $('.Fromcomment_delete').click(function(){
            var id = $(this).attr('id');
              
             $vm = $(this);
             $.ajax({
                type:'get',
                url:'/comment_delete/'+id,
                data:'',
                cache:false,
                success:function(data){

                  if(data.s = true){ 
                  $vm.siblings('.Delete_comment_from_ajax').text('ljsf');
                    }
                      
                 }
             })

         })
            $('.From_reply_delete').click(function(){
            var id = $(this).attr('id');
              var post_id =$(this).attr('post-rep');
              
             $vm = $(this);
             $.ajax({
                type:'get',
                url:'/reply_delete/'+id,
                data:'',
                cache:false,
                success:function(data){

                    window.location = "http://laravel/comment/"+post_id;
                 }
             })

        })  
          $('.From_full_image_comment').click(function(){
          
            var id = $(this).attr('id'); 
           $.ajax({
             type:'get',
             url:'/commentfulldesign/'+id,
             data:'',
             cache:false,
            success:function(data){
             $('#get_reply_form').html(data);
              $('.modal_content').css('display','block').fadeIn(300);
               $('#close').click(function(){
                 $('.modal_content').css('display','block').fadeOut(300);
              })
            
           }
           })
        })
          
          $('.From_full_image_comment_del').click(function(){
          
            var id = $(this).attr('id'); 
            var video = $(this).attr('post-video');
            var image = $(this).attr('post-image');
                 
           $.ajax({
             type:'get',
             url:'/comment_del_fulldesign/'+id,
             data:'',
             cache:false,
            beforeSend:function(){
               if(image !=''){ 
             window.location = "http://laravel/showfull_image/"+id+"/"+image;
           }
           else{
             window.location = "http://laravel/showfull_image/"+id+"/"+video;
           }

           
           }
           })
        })

          $('.full_replytocomment').click(function(){
           var name = $(this).attr('value');
            var ats = $(this).attr('data-id'); 
            var datas = "firstname"+name;
          
            $.ajax({
             type:'get',
             url:'/full_repldesign/'+ats+'/'+name,
             data:datas,
             cache:false,
            success:function(data){
              // alert(data)
              $('#get_reply_form').html(data);
             $('.modal_content').css('display','block').fadeIn(300);
                    $('#close').click(function(){
                 $('.modal_content').css('display','block').fadeOut(300);
              })
           }
           })
        })


         $('#close').click(function(){
          alert('he')
         });

        //      function deleteComment(){ 
        // alert('he')

        //  }

      })
   </script>

<script type="text/javascript">
  var token = '{{Session::token()}}';
  $(document).ready(function(){
  $('.showliked').on('click',function(event) {
    event.preventDefault();
    postId = event.target.parentNode.parentNode.dataset['postid'];
    var isLike = event.target.previousElementSibling == null;
     receiver_id = $(this).attr('id') ;
       image = $(this).attr('post-image');
        video = $(this).attr('post-video');
        
                 $vm = $(this);
     $.ajax({
            method :'post',
            url:'/likefullimage',
            data:{isLike:isLike,receiver_id:receiver_id,_token:token,image:image,video:video},
             
          
            success:function(data){
               
                $vm.siblings('span.liked').text(" Liked  " + data.result);
               $vm.text('You like this post');
                
              }

     })
     .done(function(){ 
           // event.target.innerText = isLike ?'You like this post':'Like';
          
     });
              
     });
  $('.dislike').on('click',function(event){
  
   event.preventDefault();
  receiver_id = $(this).attr('id');
    var isLike = event.target.previousElementSibling == null;
    action = $(this).data('type');
    image = $(this).attr('post-image');
    video = $(this).attr('post-video');
  $vm = $(this);
  $.ajax({
    method:'post',
    url:'/dislikefullimage',
    data:{receiver_id:receiver_id,_token:token,image:image,video:video},
    success:function(data){

       $vm.siblings('span.liked').text(" Liked  " + data.result);
            
          

       if(action == 'dislike'){
             $vm.siblings('span.showliked').text(" Like");
           // $('span.likessy').text('Like');
           // $('span.likessy').text('Like');
        // $('.likes').remove();
        // $('.likessy').add();
       }
       else{
        
        alert('bhar');
    }
  }
  })
   
   

})

   });
</script>
 <script type="text/javascript">
   $(document).ready(function(){ 
       
         }) 
   function deleteComment($post_id){ 
       var post_id = $post_id;
            
             $vm = $(this);
            $.ajax({
                  type:'get',
                  url:'/comment/'+post_id,
                  data:'',
                  cache:false,
                
                success:function(data){
                    
                    window.location = "http://laravel/comment/"+post_id;

                 }
             })
                            

               }
                 
 </script>
    <script type="text/javascript">
       
       $(document).ready(function(){
        $('.mutual_friend_show').click(function(){

          var id = $(this).attr('id');
          $.ajax({
            type:'get',
            url:'/show_mutual_friend/'+id,
            data:'',
            cache:false,
            beforeSend:function(){
           window.location = "http://laravel/show_mutual_friend/"+id;

            },
           success:function(data){
             
           }
          })

        })
       })

    </script>
    <script type="text/javascript">
      
      $(document).ready(function(){
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
      })

    </script>
    <script type="text/javascript">
     
     $(document).ready(function(){
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
      $('.edit_tag_show').click(function(){
       var post_id = $(this).attr('edit_post');
      
      $.ajax({
           type:'get',
           url:'/edit_tag_show/'+post_id,
           data:'',
           cache:false,
           success:function(data){
           $('.fetching_data').html(data);
           },
         })
         
      })
      $('.edit_tag_show_friend').click(function(){
         var post_id = $(this).attr('edit_post');
         
        $.ajax({
           type:'get',
           url:'/edit_tag_show/'+post_id,
           data:'',
           cache:false,
           success:function(data){
            $('.fetching_data').html(data);
           },
         })
      })
      $('.submit_edit_post').click(function(){
        var post_id = $(this).attr('edit_post');
         
      })

           })
     
 </script>
</body> 
</html>















