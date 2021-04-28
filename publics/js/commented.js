 

$('.commented').click(function(){

	var post_id = $(this).attr('id');
      
	 $.ajax({
             
             type:'get',
             url:'/comment/'+post_id,
             data:'',
             success:function(data){
             	   window.location = "http://laravel/comment/"+post_id;
             }
              
	 })
})