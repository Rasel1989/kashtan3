<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Object extends Model
{
    protected $table = "object";
    protected $primaryKey = "id";


    /*Связь один ко многим с таблицей ROOM*/
    public function Room() {
        return $this->hasMany('App\Room', 'obj_id', 'id');
    }
}
