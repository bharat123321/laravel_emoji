<div class="container">
 <div class="row">
        

            <div class="panel panel-default" style="width:600px;">
                
                <div class="panel-body" >
                	  @foreach($user as $post)
                  
               <a href="{{url('show_exibit_in_search/'.$post->id.'/')}}" style="text-decoration:none;"> 
             <img src="/uploads/avatar/{{$post->avatar}}" style="width:50px; height:50px; float:left; border-radius:50%;  ">
            <h3>{{strtoupper($post->firstname)}}  {{strtoupper($post->lastname)}} </h3><br>
             </a>
             <hr>
              @endforeach 
              
              
                </div>
            </div>
            </div>
        </div>
          
       
   


