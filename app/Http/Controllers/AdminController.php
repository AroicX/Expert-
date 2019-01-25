<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
Use App\User;
Use App\Category;
Use App\Book;

use App\Http\Requests;
use Hash;
Use Auth;

use Session;


class AdminController extends Controller
{
	 public function home() {

	 	return view('/admin/home');
	 }

	 public function login() {

	 	return view('/admin/login');
	 }

	 public function register() {

	 	return view('/admin/register');
	 }

	 public function profile() {

	 	return view('/admin/profile');
	 }

	 public function ManageUsers() {	 

		return view('/admin/manageusers');
	}
	
	 public function ManageCategories() {	 

		return view('/admin/managecategories');
	}

	 public function ManageBooks() {	 

		return view('/admin/managebooks');
	}


//post requests
















	public function deleteuser(Request $request, $id) {

		User::where('id', $id)->delete();

		  return redirect()->back()->with('info', 'Operation Successfully');
	}

	public function updatePassword(Request $request, $id) {

		$cpassword = $request->input('cpass');
		$newpassword = $request->input('newpass');
		$cnewpassword = $request->input('cnewpass');
	


		if (User::where('id', $id)){
			if (Hash::check($cpassword, Auth::user()->password, [])) {
				if($newpassword == $cnewpassword){
					$data = array(
						'password' => bcrypt($request->input('newpass')),
					);

					User::where('id', $id)->update($data);

					 $notification = array(

			 	'message' => 'Successful... You Have Channged your Password !',
			 	'alert' => 'success' 
			 );
					return redirect()->back()->with($notification);
				}else{

					 $notification = array(

			 	'message' => 'New Password & Confirm Password No Match ',
			 	'alert' => 'info' 
			 );
					return redirect()->back()->with($notification);
				}
			}else{

				 $notification = array(

			 	'message' => 'Old Password is invaild ',
			 	'alert' => 'error' 
			 );
				return redirect()->back()->with($notification);
			}
		}


	}

	public function addCategory(Request $request) {

		$this->validate($request,[
			'category_name' => 'required',
			'status' => 'required'
		]);

		$catName = $request->category_name;

		if (Category::where('name', '=', $catName)->exists()) {

			$notification = array(

				'message' => 'Category Already Exists ! ',
				'alert' => 'error' 
			);

			return redirect()->back()->with($notification);

		}else{
			$category = new Category;
		    $category->name = $request->input('category_name');
			$category->status = $request->input('status');

			$category->save();

			$notification = array(

				'message' => 'Category added Successfully ! ',
				'alert' => 'success' 
			);

			return redirect()->back()->with($notification);
		}

		
	}

	public function deleteCategory(Request $request,$id) {

		Category::where('id', $id)->delete();

		$notification = array(

			'message' => 'Category Deleted Successfully ! ',
			'alert' => 'error' 
		);

		return redirect()->back()->with($notification);
	}

	public function editCategory(Request $request,$id) {

			$data = array(
		        'name' => $request->input('category_name'),
				'status' => $request->input('status'),

			);

			Category::where('id', $id)->update($data);

			$notification = array(

			'message' => 'Category Editied Successfully ! ',
			'alert' => 'info' 
		);

		return redirect()->back()->with($notification);
	
	}

	/*

	--------------------------------------------------------------------------------------------------------
											BOOKS TABLES
	-------------------------------------------------------------------------------------------------------

	*/
	public function deleteBook(Request $request,$id) {

		Book::where('id', $id)->delete();

		$notification = array(

			'message' => 'Book Has been deleted Successfully ! ',
			'alert' => 'error' 
		);

		return redirect()->back()->with($notification);
	}

	public function addBook(Request $request) {

		$this->validate($request,[
			'bookname' => 'required',
			'cat_id' => 'required',
			'author' => 'required',
			'isbn' => 'required',
			'status' => 'required',
			'price' => 'required'
		]);

		$bookName = $request->bookname;

		if (Book::where('bookname', '=', $bookName)->exists()) {

			$notification = array(

				'message' => 'Book Already Exists ! ',
				'alert' => 'error' 
			);

			return redirect()->back()->with($notification);
			
		}else{

			$getCatgory = $request->input('cat_id');

			$check = Category::where('id', '=', $getCatgory)->get();

			 $book = new Book;
		     $book->bookname = $request->input('bookname');
		     $book->category_id = $request->input('cat_id');
		     $book->category_name = $check[0]->name;
		     $book->author = $request->input('author');
		     $book->author = $request->input('author');
		     $book->isbn = $request->input('isbn');
			 $book->status = $request->input('status');
			 $book->price = $request->input('price');


			 $book->save();

			 $notification = array(

			 	'message' => 'Book added Successfully ! ',
			 	'alert' => 'success' 
			 );

			 return redirect()->back()->with($notification);
		}


	}



	public function editBook(Request $request,$id) {

			$data = array(
		        'bookname' => $request->input('bookname'),
		        'category_id' => $request->input('cat_id'),
		        'author' => $request->input('author'),
		        'isbn' => $request->input('isbn'),
				'status' => $request->input('status'),
				'price' => $request->input('price'),

			);

			Book::where('id', $id)->update($data);


			
			$notification = array(

				'message' => 'Book Updated Successfully ! ',
				'alert' => 'info' 
			);

			return redirect()->back()->with($notification);
		
	}

	
}
