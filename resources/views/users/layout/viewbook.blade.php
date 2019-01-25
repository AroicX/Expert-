@foreach(\App\Book::all() as $key => $book)
<div class="popup" data-popup="popup-{{$book->bookname}}">
    <div class="popup-inner">
            <div class="popup-header">
                <h2 class="text-center text-uppercase"><i class="fa fa-search "></i> {{$book->bookname}} </h2>
                 <a class="popup-close" data-popup-close="popup-{{$book->bookname}}" href="#">x</a>
            </div>
                <div class="popup-body">
                   <li>{{$book->bookname}}</li>
                   <li>{{$book->author}}</li>
                </div>
            
            <div class="popup-footer">
                <button class="btn btn-danger pull-right"data-popup-close="popup-{{$book->bookname}}" >Close</button>
                
            </div>
     </div>
</div>
 @endforeach 