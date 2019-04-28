<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use DB;
use Session;
use App\Models\permission_role;

class RoleController extends Controller
{
    public function Role(){
    	$data['permission']=Permission::select('id','name')->get();
    	return view('admin.roles.newrole',$data);
    }

    public function Role_List(){
    	$data['role']=Role::select('id','name','display_name','description')->get();
    						
    	return view('admin.roles.rolelist',$data);
    }
    public function New_Role(Request $req){
    	$per=$req->permission;
    	$req->validate(['name'=>'required','Display_Name'=>'required','Details' =>'required','permission'=>'required']);
    	$role=new Role;
    	$role->name=$req->name;
    	$role->display_name=$req->Display_Name;
    	$role->description=$req->Details;
    	$role->save();
    	$data=Role::select('id')->orderBy('id','desc')->first();
    	//dd($data->id);
    	foreach ($per as $value) {
    		//dd($value);
    		// $role_per= new permission_role;
    		// //dd($role_per);
    		// $role_per->permission_id 	= 	$value;
    		// $role_per->role_id 	=	$data->id;
    		
    		// $role_per->save();
    		DB::table('permission_role')->insert(['role_id'=>$data->id,'permission_id'=>$value]);
    		
    	}
        Session::flash('message', 'Role Saved Sucessfully'); 
    	return redirect()->route('rolelist');

    }
    public function Edit_Role($id){

    	$data['role']=Role::where('id',$id)->first();
        
        $data['role_permissions']=DB::table('permission_role')->where('role_id',$id)
        ->join('permissions','permissions.id','=','permission_role.permission_id')
        ->select('permissions.id','permissions.name')->pluck('permission.id')->toArray();

        //$data['permission_list']=Permission::select('id','name')->get();
        $data['permission_list']=Permission::get()->pluck('name','id');
      //  dd($data['per']);
        //dd($data['permission_list']);
        
        return view('admin.roles.editrole',$data);
        //dd($data['permissions']);
    	// $data['permission']=Permission::join('permission_role','permission_role.permission_id','=','permissions.id')->join('roles','permission_role.role_id','=','roles.id')->select('roles.id as roleID','permissions.*')->get();
    	//dd($data['permission']);

    }
    public function editRoleRequest(Request $req){
       // dd($req->role_id);

        ///dd($req);
        $req->validate(['name'=>'required','Display_Name'=>'required','Details' =>'required']);
        $role = Role::find($req->role_Id);
       // dd($role);
        $role->name=$req->name;
        $role->display_name=$req->Display_Name;
        $role->description=$req->Details;

        $role->save();

        DB::table('permission_role')->where('role_id',$req->role_Id)->delete();
        $per=$req->permission;
        foreach ($per as $value) {
           
            DB::table('permission_role')->insert(['role_id'=>$req->role_Id,'permission_id'=>$value]);
            
        }
        Session::flash('message', 'Role Updated Sucessfully'); 
        return redirect()->route('rolelist');




    }
}
