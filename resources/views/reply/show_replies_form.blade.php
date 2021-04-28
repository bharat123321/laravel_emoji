              @foreach($reply as $reply)
              <div class="col-md-9">
               
              <form  method="post" id="reply_form" action="{{ route('replies.store') }}">
                                   {{  csrf_field() }}
                  
                  <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" >
                  <input type="hidden" name="reply_id" value="{{$reply->id}}">
                  <input type="hidden" name="comment_id" value="{{$reply->comment_id}}">
                  <input type="hidden" name="post_id" value="{{$reply->post_id}}"> 
                  <input type="hidden" name="reply_name" value="{{$reply->firstname}}"> 
                        <div class="row" style="padding: 10px;">
                            <div class="form-group">
                         <textarea class="form-control" name="reply"placeholder="Write something from your heart..{{$reply->firstname}}{{$reply->lastname}}!"></textarea>
                            </div>
                        </div>
                        <div class="row" style="padding: 0 0px 0 10px;">
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