<style type="text/css">
  .profile{
       border:100px;
       width:100%;
       height: 100%;
       background: skyblue;
      
  }
  .bar{
    border:100px;
    width:500px;
    border-width: 10px;
    border-radius: 10px;
    height: 250px;
    background: red;
    margin-left: -10px;
    margin-top: -20px;
  }
  
</style>
@extends('layouts.app')
@section('content')
 
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <label style="color:black;"><u>Choose Your Profile</u></label>
        </div>
        <div class="panel-body">
        <!--upload image-->
        @if($user->avatar == 'default.png')
           @if($user->gender == 'Male')
            <img src="/uploads/avatar/{{$user->avatar}}" style="width:150px; height:150px; float:top; border-radius:50%; margin-right: 25px;">
           @endif
           @if($user->gender == 'Female')
           <img src="/uploads/avatar/default1.jpg" style="width:150px; height:150px; float:top; border-radius:50%; margin-right: 25px;">
           @endif
           @else
           <img src="/uploads/avatar/{{$user->avatar}}" style="width:150px; height:150px; float:top; border-radius:50%; margin-right: 25px;">
           @endif
  <h2><b>{{ucwords($user->firstname)}}{{ucwords($user->lastname)}} Profile</b></h2>

         <form method="POST" enctype="multipart/form-data"  action="/profile">
           
            <input type="file" name="my_profile" class="form-control">
           <input type="hidden" name="_token" value="{{csrf_token()}}">
           <input type="submit" class="btn btn-primary">
        </form>
      
         <a href="{{url('/showposts')}}" class="btn btn-danger">Skip</a> 
       
      <br/>
       
       </div>
    </div>
</div>
 </div>
</div>
@endsection
