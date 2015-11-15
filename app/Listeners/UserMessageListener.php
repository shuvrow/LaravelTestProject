<?php namespace App\Listeners;
use App\models\Message;
use App\models\Notification;
use App\Modules\Users\Models\Users;
use Illuminate\Support\Facades\DB;


/**
 * Created by PhpStorm.
 * User: bappu
 * Date: 11/14/15
 * Time: 04:44 PM
 */

class UserMessageListener{
    protected $userInfo;
    public function messageSent($request)
    {

        $this->userInfo=$request;
        $message_information=[];
        $message_information['message_from']=session('active_user_id');
        $message_information['message_to']=Users::where('email','=',$this->userInfo->userInfo->input('message_to'))->pluck('id');
        $message_information['message']=$this->userInfo->userInfo->input('message');
        DB::beginTransaction();
        Message::create($message_information);
        Notification::create(array('msg_from_user_id'=>session('active_user_id')));
        DB::commit();


    }
    public function subscribe($event)
    {
        $event->listen('App\Events\MessageControlEvent','App\Listeners\UserMessageListener@messageSent');
    }
}