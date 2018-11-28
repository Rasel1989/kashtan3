<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = "room";

    /*Отношение многое ко многим Прайс и Цена*/
    public function prices() {
        //return $this->belongsToMany('App\Price', 'price_to_room', 'room_id', 'price_id');
        return $this->hasMany('App\PriceRoom', 'room_id', 'id');
    }
}
