<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminRoles;
use App\PermissionRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use App\Permission;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::with('Permission')->get();
        return view('admin.roles.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create' , ['permissions' => $permissions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRoles $request)
    {
        $input = $request->all();
        $new_permission = (!isset($input['permission'])) ? "" : $input['permission'];

        $objRole = new Role();

        $newRole = $objRole->create(
            [
                'name' => $input['name'],
                'display_name' => $input['display_name'],
                'description'  => $input['description'],
            ]
        );

        if(!$newRole) {
            return redirect()->route('roles.index')->with('error', 'Произошла ошибка при добавлении');
        }

        //Добавление permission
        $this->updatePermissions($new_permission, $newRole->id);


        return redirect()->route('roles.index')->with('success', 'Роль успешно добавлена');
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
        $id = (int)$id;
        $role = Role::find($id);
        $permissions = Permission::all();

        $permissions_arr[] = null;

        //Текущие Разрещения
        if($role->permission) {
            foreach ($role->permission as $permissions_id) {
                $permissions_arr[] = $permissions_id->id;
            }
        }



        if(!$role) {
            return redirect()->route('roles.index')->with('error', 'Такая роль не найдена');
        }

        return view('admin.roles.edit', ['role' => $role, 'permissions'=>$permissions, 'role_permissions' => $permissions_arr,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminRoles $request, $id)
    {
        $input = $request->all();
        $new_permission = (!isset($input['permission'])) ? "" : $input['permission'];
        $objRole = new Role();
        $updateRole = $objRole->find($id);
        $updateRole->name         = $input['name'];
        $updateRole->display_name = $input['display_name'];
        $updateRole->description  = $input['description'];

        if(!$updateRole->save()) {
            return redirect()->route('roles.index')->with('error', 'при обновление роли произошла ошибка');
        }


        //Добавление permission
        $this->updatePermissions($new_permission, $id);





        return redirect()->route('roles.index')->with('success', 'Роль успешно обновлена');
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

        $objRole = new Role();
        $deleteRole = $objRole->find($id);

        if(!$deleteRole) {
            return redirect()->route('roles.index')->with('error', 'Такая роль не найдена');
        }

        if(!$deleteRole->delete()) {
            return redirect()->route('roles.index')->with('error', 'Ошибка удаления роли');
        }

        return redirect()->route('roles.index')->with('success', 'Роль удалена. Роль можно восстановить.');
    }

    //Обновляем разрешения
    private function updatePermissions($permissions = [], $id) {
        //Удалем все разрешения у роли
        $objPermissions = new PermissionRole();
        $objPermissions->where('role_id', $id)->delete();
        if(!empty($permissions)) {
            foreach($permissions as $permission) {
                $newPermissions = new PermissionRole();
                $newPermissions = $newPermissions->create([
                    'permission_id' => $permission,
                    'role_id' => $id,
                ]);
                if(!$newPermissions) {
                    return redirect()->route('roles.index')->with('erorr', 'Ошибка добавления Permission сообщите администратору');
                }
            }
        }
        return true;
    }





}
