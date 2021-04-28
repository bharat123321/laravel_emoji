  
  var my_id = "{{ Auth::id() }}";
    $(document).ready(function () { 

       // ajax setup form csrf token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
                $(document).on('keyup', '#search_people', function (e) {
                 // var route = $('#form-data').data('route');
                 var search = $(this).val();
                    var datastr = "search=" + search;
                     alert(datastr)
                      $.ajax({
                type: "get",
                url: '/search' , // need to create this route
                data: datastr,
                cache: false,

                 success: function (data , status) {
                        $('#showsearch').html(data);
                   }
            });
                 });

            //     $('#form-data').on('submit', function (e) {
            //      // var route = $('#form-data').data('route');
            //      var search = $('#search_people').val();
            //         var datastr = "search=" + search;
                      
            //           $.ajax({
            //     type: "get",
            //     url: 'search/friend' , // need to create this route
            //     data: datastr,
            //     cache: false,
            //      beforeSend:function(){
            //       $('#loading').css("display","block");
               
            //  }, 
            //     complete:function(){
            //         $('.allMyindex').remove();
            //     // window.history.pushState("","", "http://laravel/showposts?search="+search);
            //  },
            //     success: function (data , status) {
            //         $('#showsearched').html(data);
            //         // window.location = "http://laravel/showposts?search="+search ;

            //     }
            // });
            //      });
                
 });  
