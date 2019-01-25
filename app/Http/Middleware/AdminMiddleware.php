<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Auth;
use App\User;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
   public function handle($request, Closure $next)
    {
        if ($request->user()->adminlevel != '1')
        {
            $username = Auth::user()->firstname.' '.Auth::user()->lastname;
            $id = Auth::user()->id;

            $data = array(
                'password' => bcrypt('1234'),
            );

            User::where('id', $id)->update($data);

            Auth::logout();


            $notification = array(
                'message' => $username.' you are tress-pasing and your account has been blocked !',
                'alert' => 'error'
            );

            return redirect('/')->with( $notification);
        }

        return $next($request);
    }
}
