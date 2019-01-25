@extends('users\layout.app')

@section('title')
	<title>My Wishlist</title>
@endsection

@section('style')
    <link rel="stylesheet" type="text/css" href="\css\custom.css">
@endsection
 

@section('this')
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">My Wishlist </li>
@endsection


@section('content')
 
<div class="row">
    @if(session('info'))
      <div class='alert alert-success'>
        <button class='close' data-dismiss='alert'>&times;</button>
          <strong>Success! </strong> {{session('info')}}
      </div>
    @endif
    <h2 class="text-center">My Wishlist <span class="bade">{{count(\App\Wishlist::where('user_id', '=', Auth::user()->id)->get())}}</span></h2>
    <div class="col-md-12">
        @if(session('info'))
        <div class='alert alert-success'>
            <button class='close' data-dismiss='alert'>&times;</button>
            <strong>Success! </strong> {{session('info')}}
        </div>
                      
         @endif
    </div>

</div>

<div class="row">


@foreach(\App\User::where('id', Auth::user()->id)->get() as $key => $user)

  @if(count(\App\Wishlist::where('user_id', '=', $user->id)->get()) > 0)

    @foreach(\App\Wishlist::where('user_id', $user->id)->get() as $key => $wishlist)
      @foreach(\App\Book::where('id',  $wishlist->book_id)->get() as $key => $books)
      
          
                  <a href="" >
             <div class="col-md-3 space">
                 <div class="card">
                   <div class="card-body">
                     <h5 class="card-title">{{$books->bookname}}</h5>
                      @foreach(\App\Category::where('id', $books->category_id)->get() as $key => $Categories)
                     <h6 class="card-subtitle mb-2 text-muted">Category - {{$Categories->name}}</h6>
                        @endforeach  
                     <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                      <h6 class="card-subtitle mb-2 text-muted">Author - {{$books->author}}</h6>
                      {{ csrf_field() }}
                   
                     <br>
                     <a href="#">
                         <button class="btn btn-success" data-popup-open="popup-{{$books->bookname}}" >View </button>
                     </a> 
                      <div class="wishlist" >
                        <input type="hidden" type="text" name="user_id" value="{{Auth::user()->id}}">
                        <input type="hidden" type="text" name="book_id" value="{{$books->id}}">
                        <button id="addWish refresh"  class="btn btn-success btn-sm" ><i class="fa fa-remove"></i> <p class="text-hide">
                          {{$wishlist->id}}</p></button>
                     </div>
                   </div>
                 </div>
             </div>
         </a>


      
         @endforeach
      @endforeach

@else

<div class="col-md-12">
    <div class='alert alert-danger'>
            <button class='close' data-dismiss='alert'>&times;</button>
            <strong>Alert! </strong> Sorry.... You have no wishes
        </div>
</div>

@endif
  @endforeach


</div>


<style type="text/css">
    
    .wishlist{
        position: absolute;
        top: 10px;
        right: 20px;
    }
    .alert-danger{
        background: #EE5454 !important;
    }
    .alert-danger > .close{
        color: #fff !important;
    }
</style>

@endsection




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

   //var name = $('#name').text();
   var id = $(this).text();

   $(this).click(function(event) {
    

    if (confirm('Are you sure you want to delete from your wishlist?')) {
      $.ajax({
          url: '/removeWish',
          type: "post",
          data: {

             //get field names
              'wish_id':$(this).text(),
          }, 
          success: function(response) {
               
                var type = (response.alert);
              //  console.log(type);
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
            // $('#reload').load(location.href + ' #reload');
            // $('#refresh').load(location.href + ' #refresh');
          console.log(response);     
        }
      });
    } else {
       toastr.info('Book not deleted!');
    }


   

   });
   
   

  });


});


</script>


@endsection