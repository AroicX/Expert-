@extends('admin\layout.app')

@section('title')
	<title>Manage Books</title>
@endsection

@section('this')
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Manage Books</li>
@endsection


@section('style')
	<link rel="stylesheet" type="text/css" href="\css\custom.css">
@endsection

 
@section('content')
    <div class="row">
    	<div class="col-12">
    	        @if(session('info'))
    	                    <div class='alert alert-success'>
    	                      <button class='close' data-dismiss='alert'>&times;</button>
    	                        <strong>Success! </strong> {{session('info')}}
    	                    </div>
    	                      
    	                    @endif

    	                   
    	        <div class="card">
    	            <div class="card-body">
    	                <h4 class="card-title">Books</h4>

    	                <button class="btn btn-info btn-block pull-right" data-popup-open="popup-1">Add New Book</button>
    	                <div class="table-responsive m-t-40">
    	                    <table id="myTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
    	                        <thead>
    	                            <tr>
    	                                <th>id</th>
                                        <th>BookName</th>
    	                                <th>Category</th>
    	                                <th>Author</th>
                                        <th>ISBN</th>
                                        <th>STATUS</th>
                                        <th>PRICE</th>
                                        <th>EDIT</th>
    	                                <th>DELETE</th>
    	                            </tr>
    	                        </thead>
    	                        
    	                        <tbody>
    	                        @if(count(\App\Book::all()) > 0)
    	                          @foreach(\App\Book::all() as $key => $books)
    	                            <tr  >
    	                                <td>{{$books->id}}</td>
                                        <td>{{$books->bookname}}</td>
                                        <td>
                                         @foreach(\App\Category::all() as  $category)
                                          @if($books->category_id == $category->id)
                                            {{$category->name}}
                                            @else

                                          @endif
                                         @endforeach
                                        </td>
                                        <td>{{$books->author}}</td>
                                        <td>{{$books->isbn}}</td>
                                        <td>
                                            @if($books->status == 1)
                                                <label class="label-success">Available</label>
                                            @elseif($books->status == 0)
                                                <label class="label-danger">Not Available</label>

                                            @endif
                                        </td>
    	                                <td>{{$books->price}}</td>
                                            <td><button class="btn btn-warning" data-popup-open="popup-{{$books->id}}" >
                                            <i class="fa fa-edit"></i>
                                        </button></td>
                                        <td> 
    	                                       <form action="{{ url('/admin/manageboks/deleteBook', array($books->id))}}" method="post">
    	                                      {{ csrf_field() }}
    	                                     
    	                                      <button class="btn btn-danger" type="submit" onclick="alert('Are you sure you want to delete  {{$books->name}}');">&times;</button></td>
    	                                  </form>
    	                                </td>
    	                           
    	                            </tr>
    	                           @endforeach
    	                           @else
    	                        
    	                            <div class='alert alert-danger'>
                                              <button class='close' data-dismiss='alert'>&times;</button>
                                              <strong>Alert! </strong> Sorry.... No Data Found
                                          </div>
    	                          @endif
    	                        </tbody>
    	                    </table>
    	                </div>
    	            </div>
    	        </div>
    	      
    	                        </tbody>
    	                    </table>
    	                </div>
    	            </div>
    	        </div>
    	        
    	    </div>
    </div>

<style type="text/css">


@media screen and (max-width: 480px){
    .popup-inner {
        max-width:500px !important;
        width:90% !important;
        top: 80% !important;
        left: 50% !important;
        margin-bottom: 50% !important;
    }
}


.popup{
    
    padding: 300px 0px 300px 0px !important;
    overflow-y: auto !important;
}
.popup-inner {
  	max-width:500px;
    margin-bottom: 200px;
  	width:90%;
    top: 80%;
  	left: 55%;
    
}

.alert-danger{
    background: #EE5454 !important;
}
.alert-danger > .close{
    color: #fff !important;
}
</style>

<div class="popup" data-popup="popup-1">
	<div class="popup-inner">
		<form action="{{ route('addBook') }}" method="post">
			{{csrf_field()}}
			<div class="popup-header">
				<h2 class="text-center text-uppercase">Add new Book</h2>
				 <a class="popup-close" data-popup-close="popup-1" href="#">x</a>
			</div>
				<div class="popup-body">
					<div class="form-group">
                        <label>BoookName:</label>
                        <input class="form-control" type="text" name="bookname">
                    </div>
                     <div class="form-group">
                        <label>Category:</label>
                        <select class="form-control" name="cat_id" data-placeholder="Select a State">
                            @foreach(\App\Category::where('status', '=' ,1)->get() as $key => $categories)
                            <option value="{{$categories->id}}">{{$categories->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Author:</label>
                        <input class="form-control" type="text" name="author">
                    </div>
                    <div class="form-group">
                        <label>ISBN:</label>
                        <input class="form-control" type="text" name="isbn">
                    <div class="form-group">
                        <label>Book Status:</label>
                        <select class="form-control" name="status" data-placeholder="Select a State">
                            <option >1</option>
                            <option >0</option>
                        </select>
                    </div><div class="form-group">
						<label>Price:</label>
						<input class="form-control" type="text" name="price">
					</div>
				</div>
			</div>
			<div class="popup-footer">
				<button class="btn btn-danger pull-right"data-popup-close="popup-1" >Close</button>
				<button type="submit" class="btn btn-success pull-right" >Add</button>
			</div>
		</form>
	 </div>
</div>

@foreach(\App\Book::all() as $key => $books)
<div class="popup" data-popup="popup-{{$books->id}}">
	<div class="popup-inner">
		<form action="{{ route('editBook', array($books->id))}}" method="post">
			{{csrf_field()}}
			<div class="popup-header">
				<h2 class="text-center text-uppercase">Edit category</h2>
				 <a class="popup-close" data-popup-close="popup-{{$books->id}}" href="#">x</a>
			</div>
				<div class="popup-body">
					   <div class="form-group">
                        <label>BoookName:</label>
                        <input class="form-control" type="text" name="bookname" value="{{$books->bookname}}">
                    </div>
                     <div class="form-group">
                        <label>Category:</label>
                        <select class="form-control" name="cat_id" data-placeholder="Select a State">
                            @foreach(\App\Category::where('status', '=' ,1)->get() as $key =>  $categories)
                            <option value="{{$categories->id}}">{{$categories->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Author:</label>
                        <input class="form-control" type="text" name="author" value="{{$books->author}}">
                    </div>
                    <div class="form-group">
                        <label>ISBN:</label>
                        <input class="form-control" type="text" name="isbn" value="{{$books->isbn}}">
                    <div class="form-group">
                        <label>Category Status:</label>
                        <select class="form-control" name="status" data-placeholder="Select a State">
                           @if($books->status == 1)
                                    <option >1</option>
                                    <option >0</option>
                                @else
                                    <option >0</option>
                                    <option >1</option>

                                @endif
                        </select>
                    </div><div class="form-group">
                        <label>Price:</label>
                        <input class="form-control" type="text" name="price" value="{{$books->price}}">
                    </div>
                </div>
				</div>
			
			<div class="popup-footer">
				<button class="btn btn-danger pull-right"data-popup-close="popup-{{$books->id}}" >Close</button>
				<button type="submit" class="btn btn-success pull-right" >Update</button>
			</div>
		</form>
	 </div>
</div>
 @endforeach


<style>


</style>


@endsection


@section('scripts')
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
@endsection




