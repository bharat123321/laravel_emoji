var postId =0;
var receiver_id  =0;
$('.likessy').on('click',function(event) {

		event.preventDefault();
		postId = event.target.parentNode.parentNode.dataset['postid'];
		var isLike = event.target.previousElementSibling == null;
		 receiver_id = $(this).attr('id') ;
		    var post_body = $(this).attr('data-post');
        var post_user = $(this).attr('data-user');
       alert(receiver_id)
             $vm = $(this);
		 // $.ajax({
   //          method :'post',
   //          url:urlLike,
   //          data:{isLike:isLike,receiver_id:receiver_id,_token:token,post_body:post_body,post_user:post_user},
             
          
   //          success:function(data){
            	 
   //              $vm.siblings('span.liked').text(" Liked  " + data.result);
   //          	  $vm.text('You like this post');
            	  
   //            }

		 // })
		 // .done(function(){ 
   //         // event.target.innerText = isLike ?'You like this post':'Like';
          
		 // });
            	
		 

	 });
 
                    