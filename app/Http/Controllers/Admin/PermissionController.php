<?php

namespace App\Http\Controllers\Admin;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    public function __construct(){
    // $this->middleware(['role:Developer']);
    }
    public function index()
    {
        $permissions = Permission::all();
        $roles = Role::all();
        return view('admin.permission.index',compact('permissions','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:50|unique:permissions',
            'guard' => ['required', Rule::in(['admin', 'web'])],
        ]);

        $roles = $request['roles'];
        $name = $request->input('name');
        Permission::create(['guard_name' => 'admin', 'name' => $name]);

        if(!empty($request->input('roles'))){
            foreach($roles as $role){
                $r = Role::where('id','=',$role)->firstOrFail(); //Match input role to db record
                $permission = Permission::where('name', '=', $name)->first();
                $r->givePermissionTo($permission);
            }
        }
        return back()->with('success','Permission created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $this->validate($request,[
            'name' => 'required|max:40'
        ]);
        $input = $request->all();
        $permission->fill($input)->save();
        return redirect(route('permission.index'))->with('info','Permission updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect(route('permission.index'))->with('info','Permission deleted successfully');
    }
}
