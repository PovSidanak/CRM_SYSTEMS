<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
   public function AllPermission(){

    $permissions = Permission::all();
    return view('backend.pages.permission.all_permission', compact('permissions'));

   }// End Method

   public function AddPermission(){

    return view('backend.pages.permission.add_permission');

   } // End Method

   public function StorePermission(Request $request){

    $permission = Permission::create([
        'name' => $request -> name,
        'group_name' => $request -> group_name,

    ]);
    $notification = array(
        'message' => 'Permission Created Succesfully',
        'alert-type' => 'success'
    );

    return redirect()->route('allpermission')->with($notification);

   } // End Method

   public function EditPermission($id){

    $permission = Permission::findOrFail($id);
    return view('backend.pages.permission.edit_permission',compact('permission'));

   }// End Method

   public function UpdatePermission(Request $request){


    $per_id = $request->id;

    Permission::findOrFail($per_id)->update([
        'name' => $request -> name,
        'group_name' => $request -> group_name,

    ]);
    $notification = array(
        'message' => 'Permission Updated Succesfully',
        'alert-type' => 'success'
    );

    return redirect()->route('all.permission')->with($notification);

   }// End Method

   public function DeletePermission($id){

    Permission::findOrFail($id)->delete();

    $notification = array(
        'message' => 'Permission Deleted Succesfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);

   }// End Method

   ////////////////////* Role All Method *////////////////////

   public function AllRole(){

    $role = Role::all();

    return view('backend.pages.role.all_role', compact('role'));

   }// End Method

   public function AddRole(){

    return view('backend.pages.role.add_role');

   }// End Method

   public function StoreRole(Request $request){

    $role = Role::create([
        'name' => $request -> name,
    ]);
    $notification = array(
        'message' => 'Role Created Succesfully',
        'alert-type' => 'success'
    );

    return redirect()->route('allrolepermission')->with($notification);

   } // End Method

   public function EditRole($id){

    $role = Role::findOrFail($id);
    return view('backend.pages.role.edit_role',compact('role'));

   }// End Method

   public function UpdateRole(Request $request){


    $role_id = $request->id;

    Role::findOrFail($role_id)->update([
        'name' => $request -> name,

    ]);
    $notification = array(
        'message' => 'Role Updated Succesfully',
        'alert-type' => 'success'
    );

    return redirect()->route('listrole')->with($notification);

   }// End Method

   public function DeleteRole($id){

    Role::findOrFail($id)->delete();

    $notification = array(
        'message' => 'Role Deleted Succesfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);
    } // End Method


   ////////////////////* Add Role Permission All Method ////////////////////

   public function AddRolePermission(){

    $role = Role::all();
    $permission = Permission::all();
    $permission_group = User::getpermissionGroups();
    return view('backend.pages.rolesetup.add_role_permission',compact('role', 'permission','permission_group'));

   } // End Method

   public function RolePermissionStore(Request $request){

    $data = array();
    $permissions = $request->permission;

    foreach($permissions as $key => $item){

        $data['role_id'] = $request->role_id;
        $data['permission_id'] =  $item;

        DB::table('role_has_permissions')->insert($data);
    }//End foreach

    $notification = array(
        'message' => 'Role Permission Added Succesfully',
        'alert-type' => 'success'
    );

    return redirect()->route('allrolepermission')->with($notification);

   } // End Method

   public function AllRolePermission(){

    $roles = Role::all();
    return view('backend.pages.rolesetup.all_roles_permission', compact('roles'));

   }// End Method

   public function AdminEditRole($id){

    $role = Role::findOrFail($id);
    $permission = Permission::all();
    $permission_group = User::getpermissionGroups();
    return view('backend.pages.rolesetup.edit_role_permission',compact('role', 'permission','permission_group'));

   }// End Method

   public function AdminUpdateRole(Request $request, $id){

    $role = Role::findOrFail($id);
    $permissions = $request->permission;

    if(!empty($permissions)){
        $role->syncPermissions($permissions);
    }

    $notification = array(
        'message' => 'Role Permission Updated Succesfully',
        'alert-type' => 'success'
    );

    return redirect()->route('allrolepermission')->with($notification);

   }// End Method

   public function AdminDeleteRole($id){

    $role = Role::findOrFail($id);
    if(!is_null($role)){
        $role->delete();
    }

    $notification = array(
        'message' => 'Role Permission Deleted Succesfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);

   }// End Method

}
