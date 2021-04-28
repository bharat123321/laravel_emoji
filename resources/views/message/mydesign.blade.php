          <div>
        <ul class="messages">
           
          @foreach($message as $message)
             <li class="message clearfix">
              <!-- if message user_request ed_id is equal to the auth id then it is sent by logged in user -->
                  <!-- <div class="{{ $message->user_requested_id == Auth::id() ?'sent':'received'}}"> -->
                      @if($message->user_requested_id == Auth::id())
             <div class ="{{($message->user_requested_id == Auth::id()?'sent':'null')}}" > 
            
                {{$message->message}}
                                  </div> 
                
             @else 
              
                 <div class ="{{ ($message->user_requested_id == Auth::id()?'null':'received')}}"> 
                    <?php
                         $us = DB::table('users')->where('id',$message->user_requested_id)->get();
                    ?>
                  @foreach($us as $users)
                <img src="/uploads/avatar/{{$users->avatar}}" style="height:40px; width: 40px; float:left; border-radius:50%;margin-left:-55px; margin-top:9px;"> 
                @endforeach   
                   <p>{{$message->message}}</p>
                   
              </div>
               
                  
              @endif

             </li> 
             @endforeach
        
          
             

         </ul>
         </div>
    


