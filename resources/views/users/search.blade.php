@extends('users\layout.app')

@section('title')
	<title>Search</title>
@endsection

@section('style')
    <link rel="stylesheet" type="text/css" href="\css\custom.css">
     <link href="/css/lib/select2/select2.min.css" rel="stylesheet">
@endsection
 

@section('this')
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Search Book</li>
@endsection


@section('content')


 <div class="row">
     <div class="col-md-2"></div>
     <div class="col-md-6">
         <input id="search" class="form-control " type="text" placeholder="Search...">
         <select class="form-control select2" data-placeholder="Search by Category">
          @foreach(\App\Category::where('status', '=' ,1)->get() as $key => $Category)
           <option value="{{$Category->id}}">{{$Category->name}}</option>
          @endforeach
         </select>
     </div>
 

</div>

<div class="row" id="allBooks" >

@if(count(\App\Book::all()) > 0)
 @foreach(\App\User::where('id', Auth::user()->id)->get() as $key => $user)
       @foreach(\App\Book::all() as $key => $books)
       
           
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
                          <button class="btn btn-info" data-popup-open="popup-{{$books->bookname}}" >View </button>
                      </a> 
                       <div class="wishlist" >
                         <input type="hidden" type="text" name="user_id" value="{{Auth::user()->id}}">
                         <input type="hidden" type="text" name="book_id" value="{{$books->id}}">
                         <button id="addWish refresh"  class="btn btn-info btn-sm" ><i class="fa fa-plus"></i> <p class="text-hide">
                           {{$books->id}}</p></button>
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
             <strong>Alert! </strong> sorry No Books Available now
         </div>
 </div>

 @endif



 </div>


<div class="row" id="showresult">

</div>



{{-- @include('users/layout.searchmodal') --}}
@include('users/layout.viewbook')

<style type="text/css">
    .alert-danger{
        background: #EE5454 !important;
    }

    .alert-danger > .close{
        color: #fff !important;
    }
    
    @media screen and (max-width: 480px){
        .popup-inner {
            max-width:500px !important;
            width:90% !important;
            top: 60% !important;
            left: 50% !important;
        }
    }
    .popup{
        
        padding: 300px 0px 300px 0px !important;
        z-index: 1050;
        display: none;
        overflow: visible;
        outline: 0;
    }

    .popup-inner {
        max-width:500px;
        width:70% !important;
        left: 55%;
    }
    .space{
        margin-top: 20px !important;
    }

    .card{
        border-radius: 0px !important;
    }

    .wishlist{
        position: absolute;
        top: 10px;
        right: 20px;
    }
</style>



@endsection

@include('users/layout/js/script_search')