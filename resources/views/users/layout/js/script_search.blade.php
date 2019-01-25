

@section('scripts')
<script src="/js/lib/calendar-2/moment.latest.min.js"></script>
    <!-- scripit init-->
    <script src="/js/lib/calendar-2/semantic.ui.min.js"></script>
    <!-- scripit init-->
    <script src="/js/lib/calendar-2/prism.min.js"></script>
    <!-- scripit init-->
    <script src="/js/lib/calendar-2/pignose.calendar.min.js"></script>
    <!-- scripit init-->
    <script src="/js/lib/calendar-2/pignose.init.js"></script>

     <script src="/js/lib/datatables/datatables.min.js"></script>
    <script src="/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="/js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="/js/lib/datatables/datatables-init.js"></script>
    <script src="/js/lib/select2/select2.full.min.js"></script>

    <script>
      $(document).ready(function() {
         $('.select2').select2();
    });
      
    </script>
    <script type="text/javascript">
        $(function() {
            //----- OPEN   
            $('[data-popup-open]').on('click', function(e)  {
                var targeted_popup_class = jQuery(this).attr('data-popup-open');
                $('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);

                e.preventDefault();
            });

            //----- CLOSE
            $('[data-popup-close]').on('click', function(e)  {
                var targeted_popup_class = jQuery(this).attr('data-popup-close');
                $('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);

                e.preventDefault();
            });
        });
    </script>

<script type="text/javascript"> 
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('[name="_token"]').val()
            }
    }); 

 $(function(){

  

  $('.wishlist').each(function(index, el) {

   // var id = $('#addWish').val();
   $(this).click(function(event) {

     $.ajax({
          url: '/addwish',
          type: "post",
          data: {

             //get field names
              'book_id':$(this).text(),
          },
          beforeSend: function () {
            $(".preloader").show();
          }, 
          success: function(response) {
              //$('#reload').load(location.href + ' #reload');
              $(".preloader").fadeOut();
                var type = (response.alert);
               // console.log(type);
                switch(type){
                    case 'info':
                        toastr.info(response.message);
                        break;
                    
                    case 'warning':
                        toastr.warning(response.message);
                        break;

                    case 'success':
                        toastr.success(response.message);
                        break;

                    case 'error':
                        toastr.error(response.message);
                        break;
                
              
               }
          console.log(response);
              
        },
        error:function(){//remove gif}

         }


    });

   });
   
   

  });

  

$('#search').on('keyup', function() {

  //console.log(text);
  if ($(this).val() === '' ) {
   $('#allBooks').show('fast');
   $('#showresult').hide();
  }else{
    $.ajax({
        //type: 'GET',
        dataType: "json",
        url: '/searchbook',
        data: {
          'keyword': $(this).val()
        },
        success: function (response) {
          //$('#searchrow').hide('fast');
          $('#showresult').empty();
          $('#allBooks').hide('fast');
          if (response.result === '') {

            $('#showresult').show('fast');
            $('#allBooks').show('fast'); 
            toastr.error('No Book Found');
            $('#search').val("");

          }else{
            $('#showresult').show('fast');
            $.each(response.result, function(index, item) {
                  $('#showresult').append("<div class='col-md-12'><div class='col-md-12'><div class='card'><div class='card-body'><a href='getbook/" + response.result[index].id + "'><h6 class='card-title'>" + response.result[index].bookname + "</h6></a><h6 class='card-subtitle mb-2 text-muted'>" + response.result[index].author + " </h6><div class='wishlist'> <input type='hidden' type='text' name='user_id' value='{{Auth::user()->id}}'><input type='hidden' type='text' name='book_id' value='" + response.result[index].bookname + "'> <button id='addWish refresh'  class='btn btn-info btn-sm' ><i class='fa fa-plus'></i> <p class='text-hide'>" + response.result[index].bookname + "</p></button></div></div></div></div>");
            });
            console.log(response);
          }
            
        },
    });
  }




  event.preventDefault();
  /* Act on the event */
});





});






</script>


@endsection
