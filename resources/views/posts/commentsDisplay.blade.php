 
 <div class="panel-body">
   @foreach($replies as $replies)
       @if($replies->comment_id == $showcomment->id )
         
        <div class="display-comment">
      <h2 style="margin:auto 110px;  font-size:calc(0.7rem + 0.9vw);cursor: pointer;"><b>
              {{ucwords($replies->firstname)}} {{ucwords($replies->lastname)}}</b></h2>
       <img src="/uploads/avatar/{{$replies->avatar}}"  style="height:50px; width: 50px; float:left; border-radius:50%;position:relative;left:50px;top:-45px;">
    
             <h2 style="background:#99CC99;display: inline-block; padding: 10px 20px; border-radius: 20px;color:black;"><b style="color: blue;cursor: pointer;font-size:calc(0.7rem + 0.9vw);"> @if(strlen($replies->reply_name) == 10 ) 
               
               {{ucwords($replies->reply_name)}}@endif</b>{{$replies->reply}}
               <br>
               <b style="position: relative;top:-10px;font-size:10px; ">
        {{\Carbon\Carbon::parse($replies->created_at)->diffForHumans()}}
      </b>
             </h2>
               
             <div class="replytocomment" data-id="{{$replies->id}}"  style="position: relative;left:40px;top: -10px; text-decoration: none;font-size: 16px;color: gray;cursor: pointer;"><b>Reply</b></div>
             <div class="From_reply_delete"  id="{{$replies->id}}" post-rep ="{{$replies->post_id}}" style="position: relative;top:-35px;font-size: 16px;left:90px;color:darkred;cursor: pointer;"><b>Delete</b></div>
             
      </div>
       
       @endif

             @endforeach

           </div>
              