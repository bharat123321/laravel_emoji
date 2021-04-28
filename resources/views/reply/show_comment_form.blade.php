              @foreach($comment as $comment)
              
              <div class="col-md-9">
             
              <form  method="post" id="reply_form" action="{{ route('replies.store') }}">
                                   {{  csrf_field() }}
                  
                  <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" >
                  <input type="hidden" name="comment_id" value="{{$comment->id}}">
                  <input type="hidden" name="post_id" value="{{$comment->post_id}}"> 
                  <input type="hidden" name="reply_name" value="{{$comment->firstname}}">
                   <input type="hidden" name="reply_id" value="{{$comment->id}}">
                        <div class="row" style="padding: 10px;">
                            <div class="form-group">
                         <textarea class="form-control" name="reply"placeholder="Write something from your heart..{{$comment->firstname}}{{$comment->lastname}}!"></textarea>
                            </div>
                        </div>
                        <div class="row" style="padding: 0 10px 0 10px;">
                            <div class="form-group">
                     <input type="submit" class="btn btn-primary btn-lg"  value="Reply">
                                
                            </div>
                        </div>
                    </form>
                    <div class="row" style="padding: 0 0px 0 10px;">
                            <div class="form-group">
                    <input type="submit" class="btn btn-danger btn-lg" id="close" value="Close">
                                
                            </div>
                        </div>
                  </div>
                 
                 
                    @endforeach