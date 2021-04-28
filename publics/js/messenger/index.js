var receiver_id = '';
    var my_id = "{{ Auth::id() }}";
    $(document).ready(function () { 
        //ajax setup form csrf token
         // setTimeout(realTime,2000);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
          $('.user').click(function() {
                    $('.user').removeClass('active');
                    $(this).addClass('active');
                    receiver_id = $(this).attr('id');
                     
                    $.ajax({
                type: "get",
                url: "messaged/" + receiver_id, // need to create this route
                data: "",
                cache: false,
                success: function (data) {
 
                     
                      $('#messages').html(data);

                 
                    
                }
            });
                 });
            $(document).on('keyup', '.input-text input', function (e) {
            var message = $(this).val();
     // check if enter key is pressed and message is not null also receiver is selected
            if (e.keyCode == 13 && message != '' && receiver_id != '') {
                 
                $(this).val(''); // while pressed enter text box will be empty

                var datastr = "receiver_id=" + receiver_id + "&message=" + message;
                 
                $.ajax({
                    type: "post",
                    url: "messaged", // need to create this post route
                    data: datastr,
                    cache: false,
                     success: function (data) {
                          $('.message-wrapper').html(data);
                          
                    },
                    error: function (jqXHR, status, err) {
                    },
                    complete: function () {

                        scrollToBottomFunc();
                    },
                     
                });
            }
        });
      // function realTime(){
      //   da = "receiver_id="+receiver_id;

      //      $.ajax({
      //        type:'post',
      //        url:'/chat',
      //        data:da,
      //        success:function(data){
      //            $('.message-wrapper').html(data);
               
      //        }
      //     });
      //      setTimeout(realTime,2000);
      // }

        });

    function scrollToBottomFunc (){
        $('.message-wrapper').animate({
             scrollTop: $('.message-wrapper').get(0).scrollHeight},50);    }
    