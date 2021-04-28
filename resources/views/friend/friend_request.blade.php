@extends('layouts.app')
@section('content')
  @if($FriendRequests->count()>0) 
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Friend Request</div>

                <div class="panel-body">
                    <div class="col-sm-12 col-md-12">
                         @if ( session()->has('msg') )
                         <p class="alert alert-success">
                                      {{ session()->get('msg') }}
                                       
                                   </p>
                                @endif
                               
                        @foreach($FriendRequests as $uList)

                        <div class="row">
                            <div class="col-md-6 pull-left">
                                <img src="{{url('../')}}/uploads/avatar/{{$uList->avatar}}" width="80px" height="80px" class="img-rounded"/>
                            </div>

                            <div class="col-md-7 pull-left">
                                <h3 style="margin:0px;"><u><b style="color:blue;">{{ucwords($uList->firstname)}}</b></u></h3>

                                <p><b>Gender:</b> {{$uList->gender}}</p>
                                   <p><b>Email:</b> {{$uList->email}}</p>

                            </div>

                            <div class="col-md-3 pull-right">

                                     <p>
                                        <a href="{{url('/accept')}}/{{$uList->firstname}}/{{$uList->id}}"  class="btn btn-info btn-sm">Confirm</a>

                                         <a href="{{url('/requestRemove')}}/{{$uList->id}}"  class="btn btn-default btn-sm">Remove</a>

                                     </p>

                            </div>
          
                        </div>
                        <hr>
                        @endforeach
                     </div>
                </div>
            </div>
         </div>
                        
@endif
<div class="col-md-9">
         <div class="panel panel-default">
             <div class="panel-body">
<div class="panel-heading"><h3>Add Friend</h3></div>
</div>
</div>
</div>
  <?php
                            $ds = DB::table('users')->where('id','!=',Auth::user()->id)->get();
                            
                           
                       ?>
                       
                             
                 @foreach($not_friend as $users)
                       
         <div class="col-md-9">
         <div class="panel panel-default">
             <div class="panel-body">
                    <div class="well">
                 <img src="/uploads/avatar/{{$users->avatar}}" width="100px" height="100px" style="border-radius: 50px">
                 <br/>
             <h3 style="word-break: break-all;">{{ucwords($users->firstname)}} {{ucwords($users->lastname)}}</h3>
  <?php                      
  // mutual Friend    

        $bhar = DB::table('friendships')->where('status',1)->where('user_requested',Auth::user()->id)->orWhere('acceptor',Auth::user()->id)->first();
                                
                                         if($bhar == true){ 
                                          //echo "string";
                                    $vn = array_count_values($count_mutual);
                                 
                                     foreach ($vn as $key => $value) {
                                     if($users->id == $key){
                                      ?>
                             <div class="mutual_friend_show" id="{{$users->id}}" style="cursor: pointer;"> <?php echo $value. ' mutual friend ';?></div>
                                   <?php  }
                                    }
                                   }
                                 $de =  DB::table('friendships')->where('status',null)->where('acceptor',$users->id)->where('user_requested',Auth::user()->id)->first();   
                               ?>
                              
 <div class="col-md-3 pull-right">
  
               @if($de == false)
             <div id="addfriend_sent" class="add_sent" value="{{$users->id}}">
             Add Friend
           </div>
           <div id="delete_friend_sent" class="delete_sent" value="{{$users->id}}">
             Delete Friend
           </div>
           @else
             <div id="addfriend_s" class="add_sent" value="{{$users->id}}">
             Sending Req
           </div>
              <div id="delete_friend_sent" class="delete_sent" value="{{$users->id}}">
             Delete Friend
           </div>     

     
              @endif                  
                  <!--  <a href="{{$users->id}}" id="addfriend_sent">Add Friend</a>
                  <a href="{{$users->id}}" id="delete_friend_sent" >Delete Friend</a>

                                   
 -->
     
                             
 </div>
 <hr>
 </div>
 </div>
 </div> 
   </div>
         
        @endforeach
      
        @endsection
