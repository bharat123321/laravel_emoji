function addfriendover()
{
    document.getElementsByClassName( "add_friend_design" )[0].src="light_add_friend.jpg";
    
 }

 function addfriendout()
 {
 	document.getElementsByClassName("add_friend_design")[0].src="addfriend.jpg";
 }
 function homeover()
 {
 	document.getElementsByClassName("home_design")[0].src="light_home.jpg";
 }
 function homeout(){
 	document.getElementsByClassName('home_design')[0].src="home.jpg";
 }
 function notifover() {
 	document.getElementsByClassName('notification_design')[0].src = "light_notification.jpg";
 }
 function notifout() {
 	document.getElementsByClassName('notification_design')[0].src = "notification.jpg";
 }
 function messengerover(){
 	document.getElementsByClassName('messenger_design')[0].src = 'ksd.jpg';
 }
 function messengerout(){
 	document.getElementsByClassName('messenger_design')[0].src = 'mess.jpg';
 }
function drpdwn(){
	 document.getElementById('mydropdown').style.display = 'block';
}
    const btnpanel = document.querySelector(".panel");
	 const btnnav = document. querySelector(".hellow");
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


	 	  