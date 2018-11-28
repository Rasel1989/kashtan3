<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $table = "smeta_price";
    protected $primaryKey = "id";

    public function priceToRoome() {
        return $this->belongsTo('App\PriceRoom', 'price_id', 'id');
    }
}
