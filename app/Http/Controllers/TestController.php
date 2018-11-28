<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function test1() {
        $user = Auth::user();

        if($user->hasRole('admin')) {
            return "Да админ";
        } else {
            return "Нет не админ";
        }

        //return "test";
    }


    public function test2() {
        $user = Auth::user();

        if($user->can('only-admin')) {
            return "Вы можете посещать эту страницу";
        } else {
            return abort('404');
        }

        //return "test";
    }


    public function testAdmin() {
        return "Да это админка";
    }


    public function testAddRoles() {
        /*
        $owner = new Role();
        $owner->name         = 'owner';
        $owner->display_name = 'Project Owner'; // optional
        $owner->description  = 'User is the owner of a given project'; // optional
        $owner->save();

        $admin = new Role();
        $admin->name         = 'admin';
        $admin->display_name = 'User Administrator'; // optional
        $admin->description  = 'User is allowed to manage and edit other users'; // optional
        $admin->save();
        */

        $user = Auth::user();
        //return dd($user);

        //Таким образом добавляем Роль для пользователя
        //$user->roles()->attach(2);

        //$user->roles()->attach($admin); // id only

        return "success";
    }

    public function addPermissionTest() {
        /*
        $createPost = new Permission();
        $createPost->name         = 'only-admin';
        $createPost->display_name = 'Только для админа'; // optional
        // Allow a user to...
        $createPost->description  = 'Только администратор может выполнять данные действия'; // optional
        $createPost->save();
        */

        //Добавляем для админа пермиссион
        $admin = new Role();
        $admin = $admin->find(2);

        $onlyAdmin = new Permission();
        $onlyAdmin = $onlyAdmin->find(1);
        //return dd($onlyAdmin);

        //$admin->attachPermission($onlyAdmin);


        return "success";



    }
}
