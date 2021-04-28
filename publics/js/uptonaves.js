 
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
               
             },  
             complete:function(){
                  $('#loading').css("display","none");
                $('.allMyindex').remove();

                  window.history.pushState("","","http://laravel/friend_request");
             },
             success:function(data){
                    
                 $('#bharat').html(data);
                 
                        // window.location = "http://laravel/friend_request";
                 
                
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
             	  $('#loading').css("display","none");
                $('.allMyindex').remove();

                  window.history.pushState("","","http://laravel/message");
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

    

	 



	 	  