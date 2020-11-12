<?php

namespace App\Http\Controllers\backend;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{

    public function index()/* show role permission user */
    {
        $roles = Role::orderBy('id','DESC')->get();
        $permissions= Permission::get();
        return view('backend.role_permision.index',compact('roles','permissions'));
    }
    public function store(Request $request)/* Save role and permission*/
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permission' => 'required'
        ]);

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('backend.role.index')
            ->with('success', 'ok');
    }


    public function edit($id) /* edit role and permission*/
    {
        $role = Role::find($id);
        $permissions= Permission::get();
        $rolePermissions = \DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        return view('backend.role_permision.edit', compact('role', 'rolePermissions','permissions'));
    }

    public function update(Request $request, $id) /* update role permission* table  role_id  permission_id*/
    {

        $request->validate([
            'name' => 'required|unique:roles,name',
            'permission' => 'required'
        ]);
        $role = Role::find($id);
        $input = $request->all();
        $role->syncPermissions($request->input('permission'));
        $role->update($input);
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('backend.role.index')
            ->with('success', 'ok');
    }

    public function destroy($id)
    {
        \DB::table("roles")->where('id', $id)->delete();
        return redirect()->route('backend.role.index')
            ->with('success', 'delete done');
    }
}