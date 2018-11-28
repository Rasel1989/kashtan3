<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //Если такой объект не найден
    public function notFoundObject($id = "", $route = "view.all") {
        return redirect()->route($route)->with('error', 'Извините такой объект не найден: '.$id);
    }


    //Проверка Скидки
    public function checkSale($sale) {
        $sale = (int)$sale;
        $sale = ($sale < 1) ? 1 : $sale;
        $sale = ($sale > 100) ? 99 : $sale;
        return $sale;
    }
}
