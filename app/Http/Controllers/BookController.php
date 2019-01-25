<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Response;

class BookController extends Controller
{

   public function contains_at_least_one_word($input_string) {
     foreach (explode(' ', $input_string) as $word) {
       if (!empty($word)) {
         return true;
       }
     }
     return false;
   }


   public function searchBook(Request $request) {

   		$book = $request->keyword;
   		  if (!$this->contains_at_least_one_word($book)) {
            $notification  = '';
            return Response::json(['result'   => $notification]); 

           }else{
             $results = Book::where('bookname', 'like', "%$book%")
                ->orWhere('author', 'like', "$book%")
                ->orWhere('category_name', 'like', "%$book%")->get()
                 ;
               if (count($results) > 0) {
               return Response::json(['result'   => $results]); 
               }else{
                  $notification  = '';
                  return Response::json(['result'   => $notification]); 
               }
           }
	   
    }
}
