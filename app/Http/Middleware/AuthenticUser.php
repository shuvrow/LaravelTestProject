<?php

namespace App\Http\Middleware;

use App\Modules\Users\Models\Users;
use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;


class AuthenticUser extends  Authenticate
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


        $active_user=Users::where('email',$request->input('email'))->where('status','=',1)->first();
        if(Hash::check($request->input('password'),$active_user['password']))
        {
            Session::put('user_active',1);
            Session::put('active_user_id',$active_user['id']);

        }
        if(session('user_active')==1)
        {
            return $next($request);
        }
        else
        {
            return view('registration/login')->with(array('msg'=>'Wrong Credentials or User  inactive'));
        }

    }
}
