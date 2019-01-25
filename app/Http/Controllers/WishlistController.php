<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Auth;
use Session;
use App\Admin;
Use App\User;
Use App\Category;
Use App\Book;
Use App\Wishlist;

class WishlistController extends Controller
{
   public function Wish() {
    	
    	return view('/users/wishlist');
    }

    public function addWish(Request $request){

        $bookId = $request->book_id;
        $user = Auth::user()->id;
        $check = Wishlist::where('book_id','=', $bookId)->exists();

        $check2 = Wishlist::where('user_id', '=', $user);

        if(Wishlist::where('user_id', '=', $user)->where('book_id','=', $bookId)->exists()){

            //return 'Book already exists';

             $notification  = array(

                'message' => 'Book already exists' , 
                'alert' => 'error'

            );
            // return response()
            //  ->json(['code'=>200,'success' => 'Book already exists']);

            // return var_dump($notification);
            return $notification;
        }else{

            $wishlist = new Wishlist;

            $wishlist->user_id = Auth::user()->id;
            $wishlist->book_id = $request->book_id;
            $wishlist->save();

             $notification  = array(

                'message' => 'Successfully added to wishlist' , 
                'alert' => 'success'

            );


            return $notification;
                
         }



    	
    
    }

    
    public function deleteWish(Request $request, $id) {

        Wishlist::where('id', $id)->delete();

          return redirect()->back()->with('info', 'Operation Successfully');
    }

    

    public function removeWish(Request $request) {
    
    $wish_id = $request->wish_id;

    Wishlist::where('id', $wish_id)->delete();


     $notification  = array(

        'message' => 'Book successfully deleted from list!' , 
        'alert' => 'error'

    );

    return $notification;
    }


}
