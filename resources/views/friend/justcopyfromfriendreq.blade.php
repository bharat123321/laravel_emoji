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
 @foreach($vs as $vs)

         <div class="col-md-9">
         <div class="panel panel-default">
             <div class="panel-body">
                    <div class="well">
                      
                       @if($vs->user_requested != Auth::user()->id)
                       <?php
                                  $users = DB::table('users')->where('id',$vs->user_requested)->get();
                       ?>
                          @foreach($users as $users)
 <img src="/uploads/avatar/{{$users->avatar}}" width="100px" height="100px" style="border-radius: 50px">
 <h3>{{ucwords($users->firstname)}}</h3>
 
     <div class="col-md-3 pull-right">

                                     
                                        <a href="{{$users->id}}" id="addfriend_sent"s>Add Friend</a>
                                        <a href="{{$users->id}}" id="delete_friend_sent" >Delete Friend</a>

                                   

                             
 </div>
 @endforeach
                      @endif
                      @if($vs->acceptor != Auth::user()->id)
                        <?php
                                  $users = DB::table('users')->where('id',$vs->acceptor)->get();
                       ?>
                          @foreach($users as $users)
 <img src="/uploads/avatar/{{$users->avatar}}" width="100px" height="100px" style="border-radius: 50px">
 <h3>{{ucwords($users->firstname)}} {{ucwords($users->lastname)}}</h3>
 <div class="col-md-3 pull-right">

                                     
                                        <a href="{{$users->id}}" id="addfriend_sent">Add Friend</a>
                                        <a href="{{$users->id}}" id="delete_friend_sent" >Delete Friend</a>

                                   

                             
 </div>
 @endforeach
                      @endif
                       
                    </div>
                </div>
            </div> 
        </div>

        @endforeach
  
@endsection
