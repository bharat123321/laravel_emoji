@extends('layouts.app')
@section('content')
 <div class="container">
  <div class="row justify-content-center">
     <div class="col-md-8">
 <div class="panel">  

  				@if($showcomment->count()  > 0)
  				@foreach($showcomment as $showcomment)
  				     
  			   <img src="/uploads/avatar/{{$showcomment->avatar}}"  style="height:50px; width: 50px; float:left; border-radius:50%;">
  			    
  			  
  			    <h2 style="position: relative;top: -20px;"><b>
  			    	{{ ucwords($showcomment->firstname) }}<?php echo ''; ?>{{ ucwords($showcomment->lastname) }}</b></h2>
  			    
  		 <h2 style="background:#99CC99;  padding:3px; border-radius: 20px;text-align: center;color:black; display:inline-block;position: relative;left:50px; top:-20px">{{$showcomment->comment}}</h2>
         
  		 <div class="replyincomment">
  		 <!-- <a href="{{url($showcomment->id)}}" id="replytocomment" style="position: relative;top: -20px;" onclick="document.getElementById('reply_form').style.display='block'">Reply</a> -->
  		<div class="Fromcomment"  id="{{$showcomment->id}}"  style="position: relative;top:-20px;color: gray;cursor: pointer;"><b>Reply</b></div>
  		 </div>
        
  		 @include('posts.commentsDisplay')
  		@endforeach
  	 <div id="get_reply_form" class="modal_content">
          
      </div>
      
  	</div>
  </div>
 
   
                    @else
      <h1 style="color:skyblue">No Comment Yet</h1>
      @endif
                 
</div>
</div>
@endsection