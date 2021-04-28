

  $(document).on('keyup','#comments',function(e){
   
     var user_id = $(this).attr('user_id');

     var post_id = $(this).attr('post_id');
     var firstname = $(this).attr('pst_firstname'); 
     var lastname = $(this).attr('pst_lastname');
     var post_body = $(this).attr('pst_body');    
     var comment = $(this).val();
       if (e.keyCode == 13 && comment != '' && post_id != '') {
                 
                $(this).val(''); // while pressed enter text box will be empty
        
      $.ajax({
      	 type:'post',
      	  url:'/comment_sub',
         data:{user_id:user_id,post_id:post_id,firstname:firstname,lastname:lastname,post_body:post_body,comment:comment,_token:token},
         success:function(data){
          window.location="/comment/"+post_id;
         }
      })
}
      })

   