<?php namespace App\Modules\Users\Controllers;

use App\Events\MessageControlEvent;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\models\Message;
use App\models\Notification;
use App\Modules\Users\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Event;

class UsersController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$user_name=Users::find(session('active_user_id'))->pluck('name');
		$messages=Users::find(session('active_user_id'))->message;
		$notifications=Users::find(session('active_user_id'))->notification;

		return view("Users::index",compact('messages','notifications','user_name'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function postStore(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function getShow($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function getEdit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function patchUpdate(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function deleteDestroy($id)
	{
		//
	}
	public function postLogin(Request $request)
	{
		return redirect('Users/index');
	}
	public function getLogout()
	{
	   Session::flush();
		return redirect('registration/login');
	}
	public function postSentmessage(Request $request)
	{
		$userExist=Users::where('email',$request->input('message_to'))->count();

		if($userExist>0)
		{

			Event::fire(new MessageControlEvent($request));
			$msg='Message Sent!!!';
			Session::put(['msg'=>$msg]);
			return redirect('Users/index');
		}
		else
		{
			$msg='User does not exist!!!';
			Session::put(['msg'=>$msg]);
			return redirect('Users/index');
		}
	}

}
