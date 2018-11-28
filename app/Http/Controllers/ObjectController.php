<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Object;

class ObjectController extends Controller
{
    //Показать все объекты
    public function allObjects() {
        $objObjects = new Object();
        $objObjects = $objObjects->orderBy('id', 'DESC')->paginate(100);
        return view('objects.all', [
            'objects' => $objObjects,
        ]);
    }

    //Показать один объект
    public function viewOne($id) {
        $id = (int)$id;
        $objObject = new Object();
        if(!$objObject = $objObject->with('Room')->find($id)) {
            return $this->notFoundObject($id);
        }


        //dump($objObject);
        //exit();

        return view('objects.one',[
           'object' => $objObject,
        ]);
    }
}
