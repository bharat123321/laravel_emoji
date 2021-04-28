 <div class="panel-body">
   @foreach($replies as $replies)
       @if($replies->full_comment_id == $showcomment->id )
         
        <div class="display-comment">
      <h2 style="margin:auto 110px;"><b>
              {{$replies->firstname}} {{$replies->lastname}}</b></h2>
       <img src="/uploads/avatar/{{$replies->avatar}}"  style="height:50px; width: 50px; float:left; border-radius:50%;position:relative;left:50px;top:-45px;">
    
             <h2 style="background:#99CC99;display: inline-block; padding: 10px 20px; border-radius: 20px;color:black;"><b style="color: blue;">{{ucwords($replies->reply_fname)}}{{ucwords($replies->reply_lname)}}</b> </>{{$replies->reply}}</h2>

             <div class="full_replytocomment" data-id="{{$replies->id}}"  style="position: relative;left:40px;top: -10px; text-decoration: none;font-size: 16px;color: gray;cursor: pointer;"><b>Reply</b></div>
             
      </div>
       
       @endif

             @endforeach

           </div>
              