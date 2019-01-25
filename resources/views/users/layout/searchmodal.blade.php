@foreach(\App\Category::all() as $key => $Categories)
<div class="popup" data-popup="popup-{{$Categories->id}}">
    <div class="popup-inner">
        <form action="{{ route('editCategory', array($Categories->id))}}" method="post">
            {{csrf_field()}}
            <div class="popup-header">
                <h2 class="text-center text-uppercase"><i class="fa fa-search "></i> SEARCH </h2>
                 <a class="popup-close" data-popup-close="popup-{{$Categories->id}}" href="#">x</a>
            </div>
                <div class="popup-body">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="text" name="seacrh_category" placeholder="Search...">
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>

            @foreach(\App\Book::where('category_id', $Categories->id)->get() as $key => $bookCat)
                 @if(count($bookCat->category_id) > 0)
                  
                    <ul class="list-group">
                        <li class="list-group-item">Bookname: {{$bookCat->bookname}} & Author:{{$bookCat->author}}</li>
                    </ul>
                 @else

                <ul class="list-group">
                    <li class="list-group-item">No Data Found</li>
                </ul>

                 @endif 
            @endforeach
              
                </div>
            
            <div class="popup-footer">
                <button class="btn btn-danger pull-right"data-popup-close="popup-{{$Categories->id}}" >Close</button>
                
            </div>
        </form>
     </div>
</div>
 @endforeach 