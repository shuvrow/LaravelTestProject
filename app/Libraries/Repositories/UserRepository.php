<?php namespace App\Libraries\Repositories;
use App\Modules\Users\Models\Users;
use Illuminate\Support\Facades\Validator;

/**
 * Created by PhpStorm.
 * User: bappu
 * Date: 11/15/15
 * Time: 7:58 PM
 */
    class UserRepository
    {
        public function createUser($request)
        {

            $validation=Validator::make($request->all(),[
                'name'=>'required',
                'email'=>'required|unique:users,email',
                'password'=>'required|min:6'
            ]);
            if($validation->passes())
            {
                Users::create(array(
                    'name'=>$request->input('name'),
                    'email'=>$request->input('email'),
                    'password'=>bcrypt($request->input('password'))
                ));
                return array('status'=>1);
            }
            else
            {
                $validation=$validation->messages();
                return array('msg'=>$validation,'status'=>0);
            }
        }
    }