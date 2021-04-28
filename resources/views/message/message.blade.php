 @extends('layouts.my_Use')
 @section('my_use')
 <div class="user_space">
   <div class="col-md-4"> 
     <div class="user-wrapper" onclick="toremove();">
                     <ul class="users">
                  @if(count($users) >0)
                        @foreach($users as $user)
                         
                        <li class="user"  id="{{$user->id}}">
                          
                       <div class="media">
                        <img src="/uploads/avatar/{{$user->avatar}}"  alt="" class="media-object">
                        
                        <div class="media-body">
                            <?php 
                               // $us = DB::table('users')->get();
                               // foreach ($us as $value) {
                                   if(Cache::has('user-is-online'.$user->id)){
                                     
                                   ?>
                                   <span class="online"></span>

                                   <?php
                                   }
                                   else{ 
                                    ?>
                                     <span class="pending"></span>
                                 <?php  }
                               // }
                            ?>
                             
                            <p class = "name">{{$user->firstname}}</p>
                            <p class = "email">{{$user->email}}</p>
                             
                           
 
</div>
</div>
</li>
@endforeach
   @else
   <h1>No Friend</h1>
   @endif
</ul>

     </div>           
    </div>
    
</div>
</div>
   <div class="col-md-6" id = "messages">
     
   </div>
    @endsection