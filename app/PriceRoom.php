<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PriceRoom extends Model
{
    protected $table = "price_to_room";
    protected $primaryKey = "id";


    public function smetaprices() {
        return $this->hasOne('App\Price', 'id', 'price_id');
    }
}
