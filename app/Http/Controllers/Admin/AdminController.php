<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    //Главный экран админки
    public function viewAdminPanel() {
        return view('admin.index');
    }

}
