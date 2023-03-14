<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\Role;
use App\Model\admin\Permission;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $roles = Role::latest()->get();

        $permissions = Permission::all();

        return view('admin.role.index',compact('roles','permissions'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request,[

            'name'=>'required',
        ]);

        $role = new Role;

        $role->name=$request->name;

        $role->save();

        $role->permissions()->sync($request->permission);

        return redirect(route('role.index'))->with('message','Role added successfully');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[

            'name'=>'required',
        ]);

        $role = Role::find($id);

        $role->name=$request->name;

        $role->save();

        $role->permissions()->sync($request->permission);

        return redirect(route('role.index'))->with('message','Role updated successfully');
    }

    public function destroy($id)
    {
        Role::where('id',$id)->delete();

        return redirect()->back()->with('message','Role deleted successfully');
    }
}
