<?php

namespace App\Http\Controllers\Backend;

use App\Exports\PermissionExport;
use App\Http\Controllers\Controller;
use App\Imports\PermissionImport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Maatwebsite\Excel\Facades\Excel;

class RoleController extends Controller
{
    public function AllPermission(){
        $permissions = Permission::all();
        return view('backend.pages.permission.all_permission', compact('permissions'));
    }

    public function AddPermission(){
        return view('backend.pages.permission.add_permission');
    }

    public function StorePermission(Request $request){
        $permission = Permission::create([
            'name'          => $request->name,
            'group_name'    => $request->group_name
        ]);

        $notification = array(
            'message'       => 'Permission Created Successfully!!',
            'alert-type'    => 'success'
        );
        return redirect()->route('all.permission')->with($notification);
    }

    public function EditPermission($id){
        $permission = Permission::findOrFail($id);
        return view('backend.pages.permission.edit_permission', compact('permission'));
    }

    public function UpdatePermission(Request $request){
        $id = $request->id;
        $permission = Permission::findOrFail($id)->update([
            'name'          => $request->name,
            'group_name'    => $request->group_name
        ]);

        $notification = array(
            'message'       => 'Permission Updated Successfully!!',
            'alert-type'    => 'success'
        );
        return redirect()->route('all.permission')->with($notification);
    }

    public function DeletePermission($id){
        $permission = Permission::findOrFail($id)->delete();
        $notification = array(
            'message'       => 'Permission Deleted Successfully!!',
            'alert-type'    => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function ImportPermission(){
        return view('backend.pages.permission.import_permission');
    }

    public function Export(){
        return Excel::download(new PermissionExport, 'permission.xlsx');
    }

    public function Import(Request $request) {
        Excel::import(new PermissionImport, $request->file('import_file'));
        $notification = array(
            'message'       => 'Permission Imported Successfully!!',
            'alert-type'    => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function AllRoles(){
        $roles = Role::all();
        return view('backend.pages.roles.all_roles', compact('roles'));
    }

    public function AddRole() {
        return view('backend.pages.roles.add_role');
    }

    public function StoreRole(Request $request){
        Role::create([
            'name'          => $request->name,
        ]);

        $notification = array(
            'message'       => 'Role Created Successfully!!',
            'alert-type'    => 'success'
        );
        return redirect()->route('all.roles')->with($notification);
    }

    public function EditRole($id){
        $role = Role::findOrFail($id);
        return view('backend.pages.roles.edit_role', compact('role'));
    }

    public function UpdateRole(Request $request){
        $id = $request->id;
        $role = Role::findOrFail($id)->update([
            'name'          => $request->name,
        ]);

        $notification = array(
            'message'       => 'Role Updated Successfully!!',
            'alert-type'    => 'success'
        );
        return redirect()->route('all.roles')->with($notification);
    }

    public function DeleteRole($id){
        Role::findOrFail($id)->delete();
        $notification = array(
            'message'       => 'Role Deleted Successfully!!',
            'alert-type'    => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function AllRolesPermission(){
        $roles = Role::all();
        $permission = Permission::all();
        $permission_groups = User::getPermissionGroups();
        return view('backend.pages.rolesetup.add_roles_permission', compact('roles', 'permission', 'permission_groups'));
    }

    public function rolesPermissionStore(Request $request) {
        $data = array();
        $permissions = $request->permission;

        foreach ($permissions as $key => $item) {
            $data['role_id'] = $request->role_id; 
            $data['permission_id'] = $item;
            
            DB::table('role_has_permissions')->insert($data);
        }

        $notification = array(
            'message'       => 'Role Permission Added Successfully!!',
            'alert-type'    => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
