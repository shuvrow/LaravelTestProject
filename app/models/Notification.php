<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table='notification';
    protected $primary_key='id';
    protected $guarded=array('id');

    public function user()
    {
       return  $this->belongsTo('\App\Modules\Users\Models\Users','id','msg_from_user_id');
    }
}
