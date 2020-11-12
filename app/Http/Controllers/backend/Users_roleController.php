<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class Users_roleController extends Controller
{


    public function index()/* SHOW USER ROLE PERMISSION */
    {
        $data = User::orderBy('id', 'DESC')->get();
        $roles = Role::all();
        $permissions =Permission::all();
        return view('backend.role_user.index', compact('data','roles','permissions'));
    }

    public function store(RegisterRequest $request) /* Save infornmaition  user with role permission */
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        $user->syncPermissions($request->input('permissions'));
        return redirect()->route('backend.user.role.index')
            ->with('success', 'ok');

    }

    public function edit($id)/* Edit user role permission */
    {
        $user = User::find($id);
        $roles = Role::all();
        $permissions =Permission::all();
        return view('backend.role_user.edit', compact('user', 'roles','permissions'));
    }


    public function update(Request $request, $id)/* Update user  role permisssion*/
    {
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'password' => 'required', 'string', 'min:8', 'confirmed',
            'roles' => 'required',
            'permissions' => 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));
        }
        $user = User::find($id);
        $user->update($input);
        \DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles'));
        $user->syncPermissions($request->input('permissions'));
        return redirect()->route('backend.user.role.index')
            ->with('success', 'OK');

    }
}