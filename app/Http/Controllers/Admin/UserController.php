<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\RoleUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\AdminUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('Role')->get();
        return view('admin.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $roles = Role::all();
       return view('admin.users.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminUsers $request)
    {
       $input = $request->all();
       $newUser = new User();

        $new_user = $newUser->create([
            'name'     => $input['name'],
            'fio'      => $input['fio'],
            'password' => bcrypt($input['password']),
            'email'    => $input['email'],
            'phone'    => $input['phone'],
        ]);


       if($new_user) {
           //прописываем ему роли
           if($input['roles']) {
               $user_id = $new_user->id;
               foreach($input['roles'] as $role_id) {
                   $role_user = new RoleUser();
                   $role_user->user_id = $user_id;
                   $role_user->role_id = $role_id;
                   if(!$role_user->save()) {
                       return redirect()->route('users.index')->with('errors', 'Ошибка добавления Роли пользователя. Напишите администратору');
                   }
               }
           }
           return redirect()->route('users.index')->with('success','Новый пользователь успешно добавлен');
       } else {
           return redirect()->route('users.index')->with('errors', 'Ошибка добавления пользователя. Напишите администратору');
       }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::all();
        $id = (int)$id;
        $user = User::find($id);
        if(!$user) {
            return redirect()->route('users.index')->with('error', "Такой пользователь не найден c id:{$id}");
        }
        $roles_arr[] = null;
        //Текущие роли
        if($user->role) {
            foreach ($user->role as $role_id) {
                $roles_arr[] = $role_id->id;
            }
        }
        return view('admin.users.edit', ['roles' => $roles, 'user' => $user, 'user_roles' => $roles_arr]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUsers $request, $id)
    {
        $id = (int)$id;
        $input = $request->all();
        $update_user = new User();
        $update_user = $update_user->find($id);
        /*
         * Поля которые обновляем
         */

        $update_user->name  = $input['name'];
        $update_user->fio   = $input['fio'];
        $update_user->email = $input['email'];
        $update_user->phone = $input['phone'];


        if($input['password'] != "" ) {
            $update_user->password = bcrypt($input['password']);
        }
        if($update_user->save()) {
            //Меняем роли, сперва удаляем все роли
            $objThisRoles = new RoleUser();
            $objThisRoles->where('user_id', $id)->delete();
            //Добавляем новые поля для ролей
            if(isset($input['roles'])) {
                $objNewRoles = new RoleUser();
                if(is_array($input['roles'])) {
                    foreach ($input['roles'] as $newRole) {
                        $objNewRoles->create([
                            'user_id' => $id,
                            'role_id' => (int)$newRole,
                        ]);
                    }
                }
            }

            return redirect()->route('users.index')->with('success', 'Пользователь успешно изменен');
        } else {
            return redirect()->route('users.index')->with('error', 'При изменения произошла ошибка');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = (int)$id;
        $objUser = new User();
        if(!$objUser = $objUser->find($id)) {
            return redirect()->route('users.index')->with('error', "Такой пользователь не найден c id:{$id}");
        }

        if($objUser->delete()) {
            return redirect()->route('users.index')->with('success', 'Пользователь удален.');
        } else {
            return redirect()->route('users.index')->with('error', 'Ошибка при удалении пользователя');
        }



    }
}
