<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminPermissions;
use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions.index', ['permissions' => $permissions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminPermissions $request)
    {
        $input = $request->all();
        $objPermission = new Permission();
        $newPermission = $objPermission->create([
            'name' => $input['name'],
            'description' => $input['description'],
            'display_name' => $input['display_name']
        ]);

        if($newPermission) {
            return redirect()->route('permissions.index')->with('success', 'Permission успешно добавлен');
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
        $id = (int)$id;
        $objPermission = new Permission();
        $updatePermission = $objPermission->find($id);

        if(!$updatePermission) {
            return redirect()->route('permissions.index')->with('error','Такой Permission не найден');
        }

        return view('admin.permissions.edit', ['permission' => $updatePermission]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminPermissions $request, $id)
    {
        $id = (int)$id;
        $input = $request->all();
        $objPermission = new Permission();
        $updatePermission = $objPermission->find($id);
        if(!$updatePermission) {
            return redirect()->route('permissions.index')->with('error','Такой Permission не найден');
        }
        $updatePermission->name = $input['name'];
        $updatePermission->display_name = $input['display_name'];
        $updatePermission->description = $input['description'];

        if(!$updatePermission->save()) {
            return redirect()->route('permissions.index')->with('error','При обновлении произошла ошибка');
        }

        return redirect()->route('permissions.index')->with('Данные успешно обновленны');


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

        $objPermission = new Permission();
        $deletePermission = $objPermission->find($id);

        if(!$deletePermission) {
            return redirect()->route('permissions.index')->with('error', 'Такой permission не найдена');
        }

        if(!$deletePermission->delete()) {
            return redirect()->route('permissions.index')->with('error', 'Ошибка удаления permission');
        }

        return redirect()->route('permissions.index')->with('success', 'permission удалена. permission можно восстановить.');
    }
}
