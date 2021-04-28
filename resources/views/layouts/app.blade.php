<!--  In app.blade.php  we have done various things 
  1. top navigation all done in here like login, register, search,profile

      !-->
 
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
    <link rel="icon" type="image/icon" href="upload/image/title_design.jpg">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
      <!-- <link href="{{ asset('/css/story.css') }}" rel="stylesheet"> -->
     <!-- Scripts -->
      <link rel="stylesheet" href="{{ asset('/css/ju.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <style>
         /* width */
        ::-webkit-scrollbar {
            width: 7px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #a7a7a7;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #929292;
        }

        ul {
            
        }

        li {
            list-style: none;
        }

        .user-wrapper, .message-wrapper {
            border: 1px solid #dddddd;
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
            background: #eeeeee;
        }

        .user:last-child {
            margin-bottom: 0;
        }

        .pending {
            position: absolute;
            left: 0px;
            top: 0px;
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
        .online{
          position: absolute;
            left: 0px;
            top: 0px;
            background: green;
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
        .message-wrap{
          padding: 10px;
            height: 536px;
            background: white;
            border-radius:10px 10px;
        }
        .messages .message {
            margin-bottom: 15px;
        }
     
        .messages .messagess{
            margin-bottom: 0;
        }
       .messages .mess{
          margin-bottom: 15px;
        }
        .received, .sent {
             display: inline-block;
            padding: 4px 6px;
            border-radius: 20px;
        }

        .received {
            background: black;
            color: white;
            font-size: 24px;
            text-align: center;
            font-weight: bold;
            margin-left:40px;
        }

        .sent {
            background:skyblue;
            float: right;
            text-align: right;
            color:white;
            font-weight: bold;
            font-size: 24px;
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

        input[type=text] {
            width: 100%;
            padding: 12px 20px;
            margin: 15px 0 0 0;
            display: inline-block;
            border-radius: 4px;
            box-sizing: border-box;
            outline: none;
            border: 1px solid #cccccc;
        }

        input[type=text]:focus {
            border: 1px solid #aaaaaa;
        }
   
       #sear {  
       
   }  
   .showsearched{
    color:blue;
    cursor: pointer;
   }
   .imgstyle{
    position: relative;
    left:20px;
    width: 80px;
    height: 80px;
    border:1px solid gray;
   }
  .story_animate:hover {
width: 100px;
  }
  .replyincomment{
    position: relative;
    top:-10px;
    left:50px;
  }
  .replyincomment a{
    text-decoration: none;
  }
   .replyincomment a:hover{
    color:skyblue;
   }
   #addfriend_sent{
    background: blue;
    text-decoration: none;
    display: inline-block;
    padding:5px;
    border-radius: 50px;
    color:white;
    position: relative;
    top: -10rem;
    cursor: pointer;
   
   }
   #addfriend_sent:hover{
    background-color: darkblue;
   }
  #addfriend_s{
    background: gray;
    text-decoration: none;
    display: inline-block;
    padding:5px;
    border-radius: 50px;
    color:white;
    position: relative;
    top: -10rem;
    cursor: pointer;
     text-align: center;
   }
   #addfriend_s:hover{
    background-color: darkgray;
   }
    #delete_friend_sent{
    background: darkred;
    text-decoration: none;
    display: inline-block;
    padding:5px;
    border-radius: 50px;
    color:white;
    position: relative;
    top: -10rem;
    cursor: pointer;
    text-align: center;
   }
   #delete_friend_sent:hover{
    background-color: brown;
   }
   #block_friend{
     background: gray;
    text-decoration: none;
    display: inline-block;
    padding:5px;
    border-radius: 50px;
    color:white;
    position: relative;
    top: -10rem;
    cursor: pointer;
     text-align: center;
   }
   #block_friend:hover{
    background-color: darkgray;
   }
   #UnBlock{
     background: white;
    text-decoration: none;
    display: inline-block;
    padding:5px;
    border-radius: 50px;
    color:black;
    position: relative;
    top: -10rem;
    cursor: pointer;
     text-align: center;
   }
   #UnBlock:hover{
    background: darkgray;
    color:white;
   }
   
   .name_design{
    color:black;
    margin:10px 5px;
    font-size:2.2vw;
   }
   .total_post{
    color:black;
    float: right;
    position: relative;
    top:-5vw;
    font-size: 2vw;
   }
   .total_friend{
    color:black;
    float: right;
    position: relative;
    top:-3vw;
    left:4em;
     font-size: 2vw;
   } 
   .get_reply_form{
     position: relative;
     bottom: 0px;
   }
   .model{
    
    position: absolute;
     z-index: 1050;
    -webkit-overflow-scrolling: touch;
    outline: 0;
     
}
.modal_content{
  width: 50%;
    position: fixed;
    top: -5px;
     background-color: #fff;
    border: 1px solid #999;
    border: 1px solid rgba(0,0,0,.2);
    border-radius: 6px;
    box-shadow: 0 3px 9px rgba(0,0,0,.5);
    display: none;
   z-index: 50px;
}
#close{
  float: right;
  position: relative;
  top: -60px;
}
   @media only screen and (max-width:1243px ) and (min-width: 992px){
     #delete_friend_sent{
        position: relative;
        top:-9rem;
     }
     #block_friend{
       position: relative;
        top:-9rem;
     }
     #UnBlock{
        position: relative;
        top:-9rem;
     }
   }
   @media only screen and (max-width:390px ){
     #addfriend_sent{
        position: relative;
        top: -8rem;
        left: 2rem;
     }
     #delete_friend_sent{
        position: relative;
        top:-8rem;
        left: 2rem;
     }
     #addfriend_s{
      position: relative;
        top: -8rem;
        left: 2rem;
     }
     #block_friend{
       position: relative;
        top: -8rem;
        left: 2rem;
     }
     #UnBlock{
        position: relative;
         top: -8rem;
        left: 2rem;
     }
   }
   @media only screen and (max-width:360px ) {
    #addfriend_sent{
        position: relative;
        left: 2.5rem;
        font-size: 3vw;
     }
     #addfriend_s{
       position: relative;
        left: 2.5rem;
        font-size: 3vw;
     }
     #delete_friend_sent{
        position: relative;
        left: 2.5rem;
         font-size: 3vw;
     }
      #block_friend{
       position: relative;
        left: 2.5rem;
         font-size: 3vw;
         top: -8rem;
     }
     #UnBlock{
        position: relative;
         left: 2.5rem;
         font-size: 3vw;
         top:-8rem;
     }
   }
  @media only screen and (max-width:900px){
    .aboutdesing{
        position: relative;
        top:-30px;
    }
  }


/* Set a style for all buttons */
/*button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 10%;
}*/

button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
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
       
    <nav class="navbar navbar-inverse navbar-fixedb-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                    <!-- Branding Image 
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>-->
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>
                        
                    <!-- Right Side Of Navbar -->
                    <ul class="nav nav-tabs navbar">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                        
                        <!-- profile image  !-->
                            <a href="/profile">  <img src="/uploads/avatar/{{Auth::user()->avatar}}" style="width:50px; height:50px; float:left; margin-top:5px; border-radius:50%; "></a>
                           
                            <!-- upload image in navigation bar  !-->
                            <a href="/showposts ">  <img src="/upload/image/IMG_20210206_194055.jpg" style="width:50px; height:50px; float:center; margin-top:5px; cursor:pointer;border-radius:20%;"></a>

                        
                               

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"   style="margin-top:5px;">
                                    {{strtoupper(Auth::user()->firstname )}}<span class="caret"></span>
                                </a>
                                    
                                <ul class="dropdown-menu" role="menu">
                                  <li> <a href="{{ url('/change')}}"> <i class="fa fa-btn fa-user"></i> Change</a> </li>
                                   
                                  <li><a href="{{url('/friend_request')}}">My Requests
                                      <span style="color:green; font-weight:bold;
                                       font-size:16px">({{App\friendship::where('status', Null)->where('acceptor', Auth::user()->id)->count()}})</span></a></li>

                                       
                                  <li> <a href="{{ url('/change')}}"> <i class="fa fa-btn fa-user"></i> About Your information</a> </li>
                                  <li> <a href="{{ url('/post')}}"> <i class="fa fa-btn fa-user"></i>Post</a> </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                              
                        @endif
                    </ul>
                </div>
                         
 
            </div>
        </nav>
             
           

        @yield('content')
    </div>

 
   
  
 
  <!-- <script src="http://js.pusher.com/3.1/pusher.min.js"></script> -->
<script type="text/javascript" src="http://laravel/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="http://laravel/js/juall.js"></script>
<script type="text/javascript" src="http://laravel/js/showlike.js"></script>
<script type="text/javascript" src="{{asset('/js/dislike.js')}}" ></script>
 
   <script type="text/javascript">
    
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
 
   </script>

    <!-- Scripts --> 
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
                      $vm.text("Block Friend").css('background','gray').css('color','white').width(100);
                   $('.block_sent').css('display','none');
                          $('.unblock_sent').css('display','block');
                   },
                     
                });
           });
          $('.unblock_sent').click(function(){
           received = $(this).attr('value');
           $vm = $(this);
            
              
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
                         $vm.text("UnBlock Friend").css('background','white').css('color','black').width(100);
                          $('.unblock_sent').css('display','none'); 
                       $('.block_sent').css('display','block');
                             
                
                   },
                     
                });
           });
        });

      </script>
     
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
                   
                   },
                   success:function(data){
                 $('#showphoto').html(data);
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
                   
                   },
                   success:function(data){
                 $('#showphoto').html(data);
                   },
                 })
        });
         $('.fetch_all_friend').click(function(){
                 $.ajax({
                   type:'get',
                   url:'/fetch_all_friend/',
                   data:'',
                   cache:false,
                   beforeSend:function(){
                   
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
    
 <!-- post -->
<script type="text/javascript">
 $(document).ready(function(){
    $('.checkboxs').change(function(){
       var count = $("input[name='tag_name[]']:checked").length;
      
        

    })
    $("#check_submit").on('click',function(){
       $(this).addClass('#id01');
       var token = '{{Session::token()}}';
 var che = new Array();
       var che = $('.checkboxs').attr('value');
      
        var mycheck = new Array();
        var data = {'tag_name[]':[]};
        $('input:checked').each(function(){
             // data['tag_name[]'].push($(this).val());
             mycheck.push($(this).val())
        })
        console.log(mycheck)
          var count = $("input[name='tag_name[]']:checked").length;
         if(count != 0){ 
          $.ajax({
             type:'get',
             url:'/post_caption/'+mycheck,
             data:'',
             success:function(data){
               $('#id01').hide();
              $('.fetch_checkbox').html(data);
             }
          })
        }
        else{
          mycheck = 0;
          $.ajax({
             type:'get',
             url:'/post_caption/'+mycheck,
             data:'',
             success:function(data){
               $('#id01').hide();
              $('.fetch_checkbox').html(data);
             }
          })
        }
    })
 })

</script>

</body>
</html>
