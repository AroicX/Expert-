<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Carbon\Carbon;
use Hash;
use Illuminate\Http\Request;
use Session;


class UserController extends Controller
{
    public function home() {
      
    	return view('/users/home');
    }
    public function login() {

    	return view('login');
    }
    public function register() {

      return view('register');
    }

     public function Profile() {

      return view('/users/profile');
    }

     public function Search() {

    	return view('/users/search');
    }


    public function postSignup(Request $request)
    {

       // Carbon::now();
    	 // $this->validate($request, [
    	 // 	'firstname' => 'firstname|required',
    	 // 	'lastname' => 'lastname|required',
    	 // 	'email' => 'email|required|unique:users',
    	 // 	'password' => 'required|min:4',
    	 // 	'matric' => 'matric|required|unique:users',
    	 // 	'dapartment' => 'dapartment|required',
    	 // 	'level' => 'level|required',
    	 // ]);

    	$user = new User([
    		'firstname' => $request->input('firstname'),
    		'lastname' => $request->input('lastname'),
            'username' => $request->input('username'),
    		'email' => $request->input('email'),
    		'password' => bcrypt($request->input('password')),
    		

    	]);

    	/*$user = new User();
   		$user->email = $request->input('email');
   		$user->password = bcrypt($request->input('password'));
   		 */

    	$user->save();

        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required|min:4'
        ]);

     if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password') ])) {
        if(Auth::user()->adminlevel === '0'){
         return redirect()->route('home')->with('success', 'Welcome SignIn Successful');
          } else if (Auth::user()->adminlevel === '1'){
             return redirect()->route('adminhome')->with('success', 'Welcome SignIn Successful');
          }
      }
      
    }

     public function postSignin(Request $request)
    {
    
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required|min:4'
        ]);

     if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password') ])) {
        if(Auth::user()->adminlevel === '0'){
         return redirect()->route('home')->with('success', 'Welcome SignIn Successful');
          } else if (Auth::user()->adminlevel === '1'){
             return redirect()->route('adminhome')->with('success', 'Welcome SignIn Successful');
          }
      }

       
         


      
      return redirect()->back()->with('success', 'Invalid credentials');

    }




    public function getLogout()
    {
        Auth::logout();
        return redirect(url('/'))->with('success', 'You have been LoggedOut Please Login to Continue Session');
        
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

    
    

    //User::where('id', $id)->update($data);


    //return $request->all();
  }
}
