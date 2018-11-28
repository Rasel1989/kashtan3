<?php

namespace App\Http\Controllers;

use App\PriceRoom;
use App\Room;
use App\SmetaSection;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public $sale;
    public $smetaSections;

    public function __construct() {
        //Выбираем секции сметы
        $this->smetaSections = SmetaSection::all();
    }

    /*Показать комнату в смете*/
    public function viewOne($id, $sale = 1) {
        $id = (int)$id;
        $this->sale = $this->checkSale($sale);
        $objRoom = new Room();
        if(!$objRoom = $objRoom->with('prices.smetaprices')->find($id)) {
            return $this->notFoundObject($id);
        }


        //$test = new PriceRoom();
        //$test = $test->with('smetaprices')->find(1262487);
//
        //dump($test);





        //dump($objRoom);
        //exit();

        return view('rooms.one', [
            'sale'         => $this->sale,
            'room'         => $objRoom,
            'smetaSections' => $this->smetaSections,
        ]);
    }
}
