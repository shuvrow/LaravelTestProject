<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table='messages';
    protected $primary_key='id';
    protected $guard=array('id');
    protected $fillable=array('message_from','message_to','message');

    public function from_user()
    {
       return $this->belongsTo('\App\Modules\Users\Models\Users','id','message_from');
    }


}
