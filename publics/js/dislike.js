$('.dislike').on('click',function(event){
  
   event.preventDefault();
  receiver_id = $(this).attr('id');
  	var isLike = event.target.previousElementSibling == null;
  	action = $(this).data('type');
  
  $vm = $(this);
  $.ajax({
  	method:'post',
  	url:urldislike,
  	data:{receiver_id:receiver_id,_token:token},
  	success:function(data){
  		 $vm.siblings('span.liked').text(" Liked  " + data.result);
            
          

  		 if(action == 'dislike'){
  		 	     $vm.siblings('span.likessy').text(" Like");
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