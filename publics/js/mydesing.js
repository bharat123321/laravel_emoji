function homeclick(){
 	 window.location = "http://laravel/showposts";
 }
function homeover()
 {
 	 
 	document.getElementsByClassName("home_design")[0].src="upload/image/light_home.jpg";
 }
 function homeout(){
 	document.getElementsByClassName('home_design')[0].src="upload/image/ho.jpg";
 }
 function addclick(){ 
   
 	 $.ajax({

             type:'get',
             url:'/friend_request',
             data:'',
             beforeSend:function(){
                  $('#loading').css("display","block");
               window.location = "http://laravel/friend_request";
             },  
             complete:function(){
                  // $('#loading').css("display","none");
                    
                $('.allMyindex').remove();

                  // window.history.pushState("","","http://laravel/friend_request");
             },
             success:function(data){
                    
                 $('#bharat').html(data);
                 
                     
                 
                
             }
          });
 	  
 }
function addfriendover()
{
    document.getElementsByClassName( "add_friend_design" )[0].src="upload/image/light_add_friend.jpg";
    
 }

 function addfriendout()
 {
 	document.getElementsByClassName("add_friend_design")[0].src="upload/image/addfriend.jpg";
 }
 function notifyclick(){

   $.ajax({
             type:'get',
             url:'/notification ',
             data:'',
             beforeSend:function(){
                $('#loading').css("display","block");
               window.location.replace('http://laravel/notification');
             },  
             complete:function(){
                $('#loading').css("display","none");
                $('.allMyhome').remove();
            
                 
             },
             success:function(data){
                  $('.number_of_notifcation').remove();
                 $('#bharat').html(data);
                  // window.history.pushState("","","http://laravel/notification");
               // window.location = "http://laravel/message";
                 
                
             }
          });
      

 }
 function notifover() {
 	document.getElementsByClassName('notification_design')[0].src = "upload/image/light_notification.jpg";
 }
 function notifout() {
 	document.getElementsByClassName('notification_design')[0].src = "upload/image/notification.jpg";
 }
 function messengerclick(){
 	 $.ajax({
             type:'get',
             url:'/message',
             data:'',
             beforeSend:function(){
             	  $('#loading').css("display","block");
               
             },  
             complete:function(){
              alert('he')
             	  $('#loading').css("display","none");
                $('.allMyindex').remove();
      window.location.replace('http://laravel/message');
                  // window.history.pushState("","","http://laravel/message");
             },
             success:function(data){
             	    
                 $('#bharat').html(data);
                 
             	 // window.location = "http://laravel/message";s
                 
                
             }
          });
 	    

 }
 function messengerover(){
 	document.getElementsByClassName('messenger_design')[0].src = 'upload/image/ksd.jpg';
 }
 function messengerout(){
 	document.getElementsByClassName('messenger_design')[0].src = 'upload/image/mess.jpg';
 }
function drpdwn(){
	 document.getElementById('mydropdown').style.display = 'block';
}

    const btnpanel = document.querySelector(".panel");
	 const btnnav = document.querySelector(".hellow");
	 const html = document.querySelector("html");
	 btnnav.addEventListener("click",function(e){
          document.getElementById('mydropdown').style.display = 'none';
	 });
	 	 btnpanel.addEventListener("click",function(e){
          document.getElementById('mydropdown').style.display = 'none';
	 });  


	 	 
	 		var mydropdown = document.getElementById('mydropdown');
	 		window.onclick = function(e){
	 			if(e.target.id == mydropdown){
	 				mydropdown.style.display = 'none';
	 			}
	 		}
     
    var count_number = document.querySelector('.count_number_of_video');
    var designvideo =  document.getElementById('count_video');
   var video_click=document.getElementById('video_click');
    if(count_number != null){ 
      count_number.addEventListener("mouseover",function(e){
                   // video_click.style.display="none";
               //     if(designvideo != null){ 
               //    document.querySelector('#count_video').remove();
               // }

        });
	
        count_number.addEventListener("mouseout",function(e){
                   // video_click.style.display="block";
              
                 
               

        });

 }
	 	  