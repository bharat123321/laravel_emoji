@extends('layouts.app')
@section('content')
  <nav class="navbar navbar-default">  
  <div class="container-fluid">  
    <div class="navbar-header"> 
    <a class="navbar-brand" href="/showAll_image" style="color:red"><b style="font-size:20px">&#8592;</b>Back</a>   
   
    </div> 

</div>
 
</nav>
<div class="panel panel-default">
  <div class="panel-body">
 
<table class="table table-hover">  

   <th>Name</th><th> </th><th></th>
    

@if($check_friend->count()>0)
   @foreach($friend as $friend)
       
   @if($friend->id != Auth::user()->id)
  <tr><td><img src="/uploads/avatar/{{$friend->avatar}}" style="width:50px; height:50px;  border-radius:50%;cursor: pointer;"><b style="position: relative;left: 20px;word-break: break-all;">{{ucwords($friend->firstname)}} {{ucwords($friend->lastname)}}</b></td><td></td><td></td><td>  
             <div id="UnBlock" class="unblock_sent"style="position: relative;top: 10px;" value="{{$friend->id}}">
             UnBlock Friend
           </div>
           <div id="delete_friend_sent" class="delete_sent" style="position: relative;top: 10px;" value="{{$friend->id}}">
             Delete Friend
           </div> </td> </tr>
  @endif 
    
    @endforeach
   @else
    <tr><td><h1><b>No Friend</b></h1></td></tr>
    @endif
 </table> 

  </div>
</div>
@endsection