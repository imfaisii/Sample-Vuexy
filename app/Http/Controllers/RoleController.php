<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Http\Requests\RoleRequest;
use App\Http\Requests\PermissionRequest;
use App\Http\Requests\RolePerm;
use App\Http\Requests\RoleUser;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;


class RoleController extends Controller
{  
    public function GetRoleData(){
        return response()->json(['status' => 422, 'operation' => 1, 'users' => User::all(), 'roles'=>Role::all()]);
    } 
    public function GetPermissionData(){
        return response()->json(['status' => 422, 'operation' => 1, 'users' => User::all(), 'permissions'=>Permission::all()]);
    }
    public function get_permission(){
        return response()->json(['permissions' => Permission::all()]);
    }
    public function EditPerUser(Request $request){
       
        try {
            DB::beginTransaction();
          
            $update1=Permission::find($request->old_id)->update([
                'name'=>$request->name
            ]);
                
            $per=Permission::where('id',$request->old_id)->with(['users'])->get();      //all users to this permission
            $perName=$per[0]->name;
            foreach($per[0]->users as $user){
                $user->revokePermissionTo($perName);        //Remove All user from this permission
             }
        
                $collection = Str::of($request->users)->explode(',');
                if($collection[0]!=''){
            foreach($collection as $user){
                $banda=User::find($user);
                $banda->givePermissionTo($perName);        //Give All user from this permission
             }
            }
            if ($update1) {
                DB::commit();
                return response()->json(['status' => 422, 'operation' => 1, 'message' => 'Permission-User Update Successfull', ]);
            } else {
                DB::rollBack();
                return response()->json(['status' => 421, 'operation' => 0, 'message' => 'Permission-User Update Failed',]);
          
            }
        } catch (Exception $exception) {
            DB::rollBack();
            return response()->json(['status' => 420, 'message' => $exception->getMessage()]);
        }
    }
    public function permission_index(){
        return view('role.permission');
    }
    public function  get_user_permission(Request $request){
        $permission= Permission::where('id',$request->id)->with(['users'])->get();
        if(!$permission[0]->users->isEmpty())
        return response()->json(['status' => 422, 'operation' => 1, 'data' => $permission]);
        else
        return response()->json(['status' => 422, 'operation' => 0, 'data' => $permission]);
        
    }
    public function  get_user_role(){
        $access_role = Role::with(['users'])->get();
        return response()->json(['status' => 422, 'operation' => 1,'access_role'=>$access_role]);
   
    }   
    public function EditRolePer(Request $request){
        
        try {
            DB::beginTransaction();
          
            $update1=Role::find($request->old_id)->update([
                'name'=>$request->name
            ]);
            $role=Role::find($request->old_id);
            $permissionsassigned=$role->getPermissionNames();
            foreach($permissionsassigned as $per){
                $role->revokePermissionTo($per);
             }
        
            $collection = Str::of($request->permissions)->explode(',');
            $update2=$role->givePermissionTo($collection);
            
            if ($update2) {
                DB::commit();
                return response()->json(['status' => 422, 'operation' => 1, 'message' => 'Update Successfull', ]);
            } else {
                DB::rollBack();
                return response()->json(['status' => 421, 'operation' => 0, 'message' => 'Update Failed',]);
          
            }
        } catch (Exception $exception) {
            DB::rollBack();
            return response()->json(['status' => 420, 'message' => $exception->getMessage()]);
        }
    }

    public function Get_Permission_Of_Role(Request $request){
        $arr= Role::find($request->id)->getPermissionNames();
        $permission= Permission::whereNotIn('name',$arr)->get();
        return response()->json(['status' => 422, 'operation' => 1,'rest_permissions'=>$permission, 'data' => Role::where('id',$request->id)->with(['permissions'])->get()]);
    }
    public function RolePerAdd(Request $request){
        $request->validate([
            'name' => 'required|unique:roles,name|regex:/^[a-zA-Z]+$/u|string',
            'optionsArr' => 'required',
        ],
        [
            'name.required'=> 'Name For Role is Must', // custom message
            'name.unique'=> 'The Given Role Already Exists', // custom message
            'name.regex'=> 'No space and digits allowed..i.e Admin-View', // custom message
            'optionsArr.required'=> 'Atleast One Permission is Necessary', // custom message
       
           ]);
        try {
            
                DB::beginTransaction();
                    $role=Role::create(['name' => $request->name]);
                    $collection = Str::of($request->optionsArr)->explode(',');
            if ($role) {
                 if( $role->givePermissionTo($collection)){
                // foreach($collection as $option){
                   
                //  $role->givePermissionTo($option);

                // }
                DB::commit();
                return response()->json(['status' => 422, 'operation' => 1, 'message' => 'Role With Permission Added Successfully',]);
            }else{
                DB::rollBack();
                return response()->json(['status' => 421, 'operation' => 0, 'message' => 'Role With permission Failed',]);
            }
            } else {
                DB::rollBack();
                return response()->json(['status' => 421, 'operation' => 0, 'message' => 'Role With permission Failed',]);
          
            }
        } catch (Exception $exception) {
            DB::rollBack();
            return response()->json(['status' => 420, 'message' => $exception->getMessage()]);
        }
    }
    public function role_index(){
        
        return view('role.role');
    }
    public function get_all_details()
    {
        try {
            $role = DB::table('roles')->get();
            $permission = DB::table("permissions")->get();
            $role_has_permission = Role::with(['permissions'])->get();
            $user_has_role = Role::with(['users'])->get();
            $user_has_permission = permission::with(['users'])->get();
            if (count($role) > 0 || count($permission)>0) {
                return response()->json(['status' => 422, 'operation' => 1, 'message' => 'All Details Fetched Successfully', 'roles' => $role, 'permission' => $permission, 'role_has_permission' => $role_has_permission, 'user_has_role' => $user_has_role, 'user_has_permission' => $user_has_permission]);
            } else {
                return response()->json(['status' => 421, 'operation' => 0, 'message' => 'All Details are not fetched', 'roles' => $role, 'permission' => $permission, 'role_has_permission' => $role_has_permission, 'user_has_role' => $user_has_role, 'user_has_permission' => $user_has_permission]);
          
            }
        } catch (Exception $exception) {
            return response()->json(['status' => 420, 'message' => $exception->getMessage()]);
        }
    }
    
    public function Role_Permission_details()
    {
        try {
            $role = DB::table('roles')->get();
            $permission = DB::table("permissions")->get();
            if (count($role) > 0 || count($permission)>0) {
                return response()->json(['status' => 422, 'operation' => 1, 'message' => 'Roles And Permissio Fetched Successfully', 'roles' => $role, 'permission' => $permission, ]);
            } else {
                return response()->json(['status' => 421, 'operation' => 0, 'message' => 'All Details are not fetched', 'roles' => $role, 'permission' => $permission, ]);
          
            }
        } catch (Exception $exception) {
            return response()->json(['status' => 420, 'message' => $exception->getMessage()]);
        }
    }
    public function create_view_user_role()
    {
        $role = DB::table('roles')->get();

        $users = DB::table('users')->get();
        $access_role = Role::with(['users'])->get();
        return view('role.create_role_user', compact('role', 'users', 'access_role'));
    }
    public function create_view_user_permission()
    {

        $permission = DB::table("permissions")->get();
        $users = DB::table('users')->get();
        $access_permission = permission::with(['users'])->get();
        return view('role.create_permission_user', compact('permission', 'users', 'access_permission'));
    }
    public function get_all_roles_with_permission(){
        try {
            DB::beginTransaction();
            $roles =Role::with(['permissions'])->get();
            if ($roles->exists()) {
                DB::commit();
         
                $message = "Roles with Permission Fetched Successfully";
                return response()->json(['status' => 202, 'operation' => 1, 'message' => $message, 'roles' => $roles]);
            } else {
                DB::rollBack();
                return response()->json(['status' => 204, 'operation' => 0, 'roles' => $roles, 'message' => "Failed to fetch  Roles with Permission"]);
            }
        } catch (Exception $exception) {
            DB::rollBack();
            return response()->json(['status' => 422, 'operation' => 3, 'message' => $exception->getMessage()]);
        }
    } 

    public function get_all_user_roles(){
        try {
            DB::beginTransaction();
            $roles = Role::with(['users'])->get;
            if ($roles->exists()) {
                DB::commit();
         
                $message = "User with roles  Fetched Successfully";
                return response()->json(['status' => 202, 'operation' => 1, 'message' => $message, 'roles' => $roles]);
            } else {
                DB::rollBack();
                return response()->json(['status' => 204, 'operation' => 0, 'roles' => $roles, 'message' => "Failed to fetch  User with roles"]);
            }
        } catch (Exception $exception) {
            DB::rollBack();
            return response()->json(['status' => 422, 'operation' => 3, 'message' => $exception->getMessage()]);
        }
    } 
    public function get_all_roles(){
        try {
            DB::beginTransaction();
            $roles = Role::all();
            if ($roles->exists()) {
                DB::commit();
         
                $message = "Roles Fetched Successfully";
                return response()->json(['status' => 202, 'operation' => 1, 'message' => $message, 'roles' => $roles]);
            } else {
                DB::rollBack();
                return response()->json(['status' => 204, 'operation' => 0, 'roles' => $roles, 'message' => "Failed to fetch  Role. Please Try Again."]);
            }
        } catch (Exception $exception) {
            DB::rollBack();
            return response()->json(['status' => 422, 'operation' => 3, 'message' => $exception->getMessage()]);
        }
    }
    public function get_all_permissiosns(){
        try {
            DB::beginTransaction();
            $roles = Permission::all();
            if ($roles->exists()) {
                DB::commit();
         
                $message = "Permission Fetched Successfully";
                return response()->json(['status' => 202, 'operation' => 1, 'message' => $message, 'roles' => $roles]);
            } else {
                DB::rollBack();
                return response()->json(['status' => 204, 'operation' => 0, 'roles' => $roles, 'message' => "Failed to fetch  Permission. Please Try Again."]);
            }
        } catch (Exception $exception) {
            DB::rollBack();
            return response()->json(['status' => 422, 'operation' => 3, 'message' => $exception->getMessage()]);
        }
    }
    public function get_roles_to_user(Request $request){
        
        try {
            DB::beginTransaction();
            $roles = User::with(['Role'])->get();
            if ($roles->exists()) {
                DB::commit();
         
                $message = "Roles of User Fetched Successfully";
                return response()->json(['status' => 202, 'operation' => 1, 'message' => $message, 'roles' => $roles]);
            } else {
                DB::rollBack();
          
                return response()->json(['status' => 204, 'operation' => 0, 'roles' => $roles, 'message' => "Failed to fetch  Role. Please Try Again."]);
            }
        } catch (Exception $exception) {
            DB::rollBack();
            return response()->json(['status' => 422, 'operation' => 3, 'message' => $exception->getMessage()]);
        }
    }   
    public function get_permission_to_user(Request $request){
        
        try {
            DB::beginTransaction();
            $roles =  Auth::user()->id->getAllPermissions();    
            if ($roles->exists()) {
                DB::commit();
               
                $message = "User's Permission Fetched   Successfully !";
                return response()->json(['status' => 202, 'operation' => 1, 'message' => $message, 'permission' => $roles]);
            } else {
                DB::rollBack();
                return response()->json(['status' => 204, 'operation' => 0, 'roles' => $roles, 'message' => "No Permission Found"]);
            }
        } catch (Exception $exception) {
            DB::rollBack();
            return response()->json(['status' => 422, 'operation' => 3, 'message' => $exception->getMessage()]);
        }
    }
   
    public function store_role(RoleRequest $request)
    {
        try {
            DB::beginTransaction();
            $roles = Role::create(['name' => $request->name]);
            if ($roles->exists()) {
                DB::commit();
                $roles = Role::all();
                $message = "Role Created Successfully !";
                return response()->json(['status' => 202, 'operation' => 1, 'message' => $message, 'roles' => $roles]);
            } else {
                DB::rollBack();
                $roles = Role::all();
                return response()->json(['status' => 204, 'operation' => 0, 'roles' => $roles, 'message' => "Failed to Create New Role. Please Try Again."]);
            }
        } catch (Exception $exception) {
            DB::rollBack();
            return response()->json(['status' => 422, 'operation' => 3, 'message' => $exception->getMessage()]);
        }
    }
    public function delete_role(Request $request)
    {   
           
        try {
            DB::beginTransaction();

            $del = Role::find($request->id)->delete();

            if ($del == true) {
                DB::commit();
                
                $message = "Role Deleted Successfully !";
                return response()->json(['status' => 422, 'operation' => 1, 'message' => $message, ]);
            } else {
                DB::rollBack();
               
                return response()->json(['status' => 422, 'operation' => 0,  'message' => "Failed to Delete  Role. Please Try Again."]);
            }
        } catch (Exception $exception) {
            DB::rollBack();
            return response()->json(['status' => 422, 'message' => $exception->getMessage()]);
        }
    }
    public function delete_permission(Request $request)
    {
        try {
            DB::beginTransaction();

            $del = permission::find($request->id)->delete();

            if ($del == true) {

                DB::commit();
                
                $message = "Permission Deleted Successfully !";
                return response()->json(['status' => 422, 'operation' => 1, 'message' => $message, ]);
            } else {
                DB::rollBack();

                return response()->json(['status' => 422, 'operation' => 0, 'message' => "Failed to permission Deleted . Please Try Again."]);
            }
        } catch (Exception $exception) {
            DB::rollBack();
            $permission = Permission::all();
            return response()->json(['status' => 422, 'message' => $exception->getMessage()]);
        }
    }

    public function store_permission(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:permissions,name',
          
        ],
        [
            'name.required'=> 'Name For Permission is Must', // custom message
            'name.unique'=> 'This Permission Already Exists', // custom message
            'name.regex'=> 'Follow Format i.e Customer-View..No number and space allowed', // custom message
       
           ]);
        try {
            DB::beginTransaction();
            $permission = Permission::create(['name' => $request->name]);
            if ($permission->exists()) {
                DB::commit();
             
                $message = "Permission Created Successfully !";
                return response()->json(['status' => 422, 'operation' => 1, 'message' => $message, ]);
            } else {
                DB::rollBack();
                $permission = Permission::all();
                return response()->json(['status' => 422, 'operation' => 0,  'message' => "Failed to Create New Permission. Please Try Again."]);
            }
        } catch (Exception $exception) {
            DB::rollBack();
            return response()->json(['status' => 422, 'message' => $exception->getMessage()]);
        }
    }
    public function store_role_to_permission(RolePerm $request)
    {


        try {
            DB::beginTransaction();
            $role = Role::find($request->rol);
            $access = $role->givePermissionTo($request->per);
            if ($access->exists()) {
                DB::commit();
                $message = "Role to permission Assigned Successfully !";
                $role_has_permission = Role::with(['permissions'])->get();
                return response()->json(['status' => 422, 'operation' => 1, 'message' => $message, 'result' => $role_has_permission]);
            } else {
                DB::rollBack();
                $role_has_permission = Role::with(['permissions'])->get();
                return response()->json(['status' => 422, 'operation' => 0, 'message' => "Failed to Role-permission assign. Please Try Again.", 'result' => $role_has_permission]);
            }
        } catch (Exception $exception) {
            DB::rollBack();
            return response()->json(['status' => 422, 'message' => $exception->getMessage()]);
        }
    }

    public function delete_role_to_permission(Request $request)
    {

        try {
            DB::beginTransaction();
            $role = Role::find($request->role_id);
            $access = $role->revokePermissionTo($request->permission_name);
            if ($access->exists()) {
                DB::commit();
                $message = "Role to permission unAssigned !";
                $role_has_permission = Role::with(['permissions'])->get();
                return response()->json(['status' => 422, 'operation' => 1, 'message' => $message, 'result' => $role_has_permission]);
            } else {
                DB::rollBack();
                $role_has_permission = Role::with(['permissions'])->get();
                return response()->json(['status' => 422, 'operation' => 0, 'message' => "Failed to Role-permission delete Please Try Again.", 'result' => $role_has_permission]);
            }
        } catch (Exception $exception) {
            DB::rollBack();
            return response()->json(['status' => 422, 'message' => $exception->getMessage()]);
        }
    }

    public function store_role_to_user(Request $request)
    {
          
        try {
            DB::beginTransaction();
            $user = User::find($request->user);
            $access = $user->assignRole($request->role);
            if ($access) {
                DB::commit();
                $message = "Role to user Assigned  Successfully !";
               
                return response()->json(['status' => 422, 'operation' => 1, 'message' => $message, ]);
            } else {
                DB::rollBack();
             
                return response()->json(['status' => 421, 'operation' => 0, 'message' => "Failed to Un Assign Role to user. Please Try Again.", ]);
            }
        } catch (Exception $exception) {
            DB::rollBack();
            return response()->json(['status' => 420, 'message' => $exception->getMessage()]);
        }
    }
    public function delete_role_to_user(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = user::find($request->user_id);
            $access = $user->removeRole($request->role_name);
            if ($access->exists()) {
                DB::commit();
                $message = "Role to user removed Successfully !";
                $access_role = Role::with(['users'])->get();
                return response()->json(['status' => 422, 'operation' => 1, 'message' => $message, 'access_role' => $access_role,]);
            } else {
                DB::rollBack();
                return response()->json(['status' => 422, 'message' => "Failed to Role to user removed. Please Try Again.",]);
            }
        } catch (Exception $exception) {
            DB::rollBack();
            return response()->json(['status' => 422, 'message' => $exception->getMessage()]);
        }
    }
    public function store_permission_to_user(Request $request)
    {
        
        try {
            DB::beginTransaction();
            $user = User::find($request->user);
            $access = $user->givePermissionTo($request->permission);
            if ($access->exists()) {
                DB::commit();
                $message = "permission to user assigned Successfully !";
               
                return response()->json(['status' => 422, 'operation' => '1', 'message' => $message, ]);
            } else {
                DB::rollBack();
                return response()->json(['status' => 422, 'operation' => '0', 'message' => "Failed to permission to user assigned. Please Try Again."]);
            }
        } catch (Exception $exception) {
            DB::rollBack();
            return response()->json(['status' => 422, 'message' => $exception->getMessage()]);
        }
    }
    public function delete_permission_to_user(Request $request)
    {
        try {   
            DB::beginTransaction();
            $user = user::find($request->user_id);
            $access = $user->revokePermissionTo($request->permission_name);

            if ($access->exists()) {
                DB::commit();
                $message = "Permission to user has taken out !";
                $access_permission = permission::with(['users'])->get();
                return response()->json(['status' => 422, 'operation' => '1', 'message' => $message, "access_permission" => $access_permission]);
            } else {
                DB::rollBack();
                $access_permission = permission::with(['users'])->get();
                return response()->json(['status' => 422, 'message' => "Failed to user-permission delete. Please Try Again.", "access_permission" => $access_permission]);
            }
        } catch (Exception $exception) {
            DB::rollBack();
            return response()->json(['status' => 422, 'message' => $exception->getMessage()]);
        }
    }
}
