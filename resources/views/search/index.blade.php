         <div class="col-md-8">
          <div class="modal_content">
         <div class="panel" style="position: relative;left: -3px; background:blue;">
    
        <div class="well">
             <span onclick="document.getElementById('showsearch').style.display='none'" class="close">&times;</span>
                	  @foreach($user as $post)
                      
               <a href="{{url('show_exibit_in_search/'.$post->id.'/')}}" style="text-decoration:none;color:black"> 
             <img src="/uploads/avatar/{{$post->avatar}}" style="width:50px; height:50px; float:left; border-radius:50%;   ">
              
        <h3 id="text_of_user">{{ strtoupper($post->firstname) }}  {{ strtoupper($post->lastname) }} </h3><br>
             </a>
             <hr>
              @endforeach 

            </div>
             </div>
           </div>
             </div>
   


