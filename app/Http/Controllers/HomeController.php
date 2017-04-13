<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
       // return "Hello";

        return User::get(); //retrieve the Users' data
    }

    public function attachUserRole($userId, $role)
    {
        $user=User::find($userId);

        $roleId=Role::where ('name', $role)->first();

        $user->roles()->attach($roleId);

        return $user;

    }

    public function getUserRole($userId)
    {
        return User::find($userId)->roles;
    }

    public function attachPermission(Request $request)
    {
        dd($request->all());
        $parameters=$request->only('permission', 'role');

        $permissionParam=$parameters['permission'];
        $roleParam=$parameters['role'];

        $role=Role::where('name', $roleParam)->first();
        $permission=Permission::where('name', $permissionParam)->first();

        $role->attachPermission($permission);

        return $this->response->created();
    }

    //get all permission related to the role.
    /**
     * @param $roleParam
     * @return mixed
     */
    public function getPermission($roleParam)
    {
        $role = Role::where('name', $roleParam)->first();
        return $role->perms;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
