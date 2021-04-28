@extends('layouts.app')
@section('content')
<div class="container">
 <div class="row">
         <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                Liked</div>

                <div class="panel-body comment-container" >
                 <a href="{{url('/showposts')}}" class="btn btn-danger">back</a>
                 <div  id="ajaxliked">
     
   </div>
        </div>
        </div>
    </div>
</div>
</div>
 
@endsection
