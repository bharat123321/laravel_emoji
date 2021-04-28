 @extends('layouts.mydesign')
 @section('my_design')
  <div class="col-md-6" style="float: right;margin:5px;" id = "messages">
     
   </div>
  <div class="col-md-3">
    
       <div class="user-wrapper">
                    <ul>
                        @foreach($users as $user)
                        <li class="user" id="{{$user->id}}">
                             
                       <div class="media">
                        <div class="media-left">
                            <img src="/uploads/avatar/{{$user->avatar}}"  alt="" class="media-object">
                        </div>
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
   
</ul>

                
    </div>
    
</div>

  
   
 
 @endsection