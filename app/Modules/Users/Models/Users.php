<?php namespace App\Modules\Users\Models;

use Illuminate\Database\Eloquent\Model;


class Users extends Model {


	protected $table='users';
    protected $primary_key='id';
    protected $guarded=array('id');

    public function message()
    {
       return $this->hasMany('\App\models\Message','message_to','id');
    }
    public function notification()
    {
       return $this->hasMany('\App\models\Notification','msg_from_user_id','id');
    }
}
