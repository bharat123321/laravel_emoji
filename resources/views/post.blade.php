@extends('layouts.app')
@section('content')
 <div class="container">
 <div class="row">
  <form   method="post"   enctype="multipart/form-data" action="/posts">
   <input type="hidden" name="_token" value="{{csrf_token()}}">
         <div class="col-md-8 col-md-offset-2">
          @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                      @foreach($errors->all() as $error)
                     <li>{{$error}}</li>
                      @endforeach
                    </ul>
                       </div>
                                @endif
                                 
           
            @if ( session()->has('msg') )
                         <p class="alert alert-danger">
                                      {{ session()->get('msg') }}
                                       
                                   </p>
                                @endif
                                @if ( session()->has('video_msg') )
                         <p class="alert alert-danger">
                                      {{ session()->get('video_msg') }}
                                       
                                   </p>
                                @endif 
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: black;">
             <p style="color:skyblue;font-style:italic;font-size:20px;"><b>Post</b></p>
                  <h3 style="color:white;font-style:italic;font-size:20px;text-align: center;"><u>Choose Image or Video one at a time</u></h3>
                </div>
            <img src="/uploads/avatar/{{$user->avatar}}" style="height:50px;width:50px; border-radius: 10px 10px 10px;margin-top:8px; margin-left:5px;">
             <select name="post_option">
               <option> public</option>
             
               <option> private</option>
            
             </select>                
                     
                  <wbr>  
                  <textarea  name="body" class="form-control" style="margin-top:10px;" placeholder="Write a caption"></textarea> 

                  
                  
          <wbr>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <div class="panel panel-heading">
                   <label style="color:black;"> Choose Your Picture </label>
                 </div>
                
           <input type="file"  name="image[]" class="form-control" style="color:black;"multiple>
            
                    </div>
        </div>
         <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <div class="panel panel-heading">
                   <label style="color:black;"> Choose Your  Video </label>
                 </div>
                
           <input type="file" name="video[]" class="form-control"  style="color:black;"multiple>
           <input type="submit" name="submit" class="btn btn-primary" style="position:absolute;
                  top:-340px; right:30px;" value="Post">
                    </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
            <div class="panel panel-heading">
              <label>Tag Friend</label>
             </div>
             <input type="button" name="tag_friend" class="btn btn-primary" style="position:relative;top:-10px;left:30px;"  onclick="document.getElementById('id01').style.display='block'" value="Click here">

             <div class="fetch_checkbox">
               
             </div>
          </div>
        </div>
            </form>
         
         <wbr>  
 

          

    </div>

</div>
<div id="id01" class="modal">
 <div class="modal-content animate" enctype="multipart/form-data" id="check_form">
    <div class="container">
      <div class="row">
         <div class="col-md-11">
        <div class="panel panel-default">
@if($friendcheck->count()>0)
      @foreach($friend as $friend)
            <table>
              <tr><td>
            <img src="/uploads/avatar/{{$friend->avatar}}" style="width:50px; height:50px; float:left; margin-top:5px; border-radius:50%; "><b style="position: relative;left: 20px;top:15px;word-break: break-all;"> @if(strlen($friend->firstname) <=15) {{ucwords($friend->firstname )}} {{ucwords($friend->lastname )}}@else {{substr(ucwords($friend->firstname),0,15)}}..{{substr(ucwords($friend->lastname),0,15)}}  @endif</b></td><td></td><td></td><td>  
            </td>
            
            <input type="checkbox" name="tag_name[]" class="checkboxs"  value="{{$friend->id}}" multiple>
</tr>
</table>
         @endforeach 
         @else
        <h2>No Friend</h2>
         @endif 
         </div>
    </div>
      <input type="button" id="check_submit"  value="Done" style="width: auto;padding: 10px 18px;background-color: #f44336;float: left;position: absolute;left: 0px;bottom: 5px;" class="btn btn-primary">
      
 </div> 
</div>
    <div class="container">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
     
    </div>
 </div>
</div>
@endsection
   