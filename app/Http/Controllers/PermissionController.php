<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use Session;

class PermissionController extends Controller
{
    public function Permission(){
    	return view('admin.permissions.newpermission');
    }
    public function NewPermission(Request $req){
    	$req->validate(['name'=>'required','Display_Name'=>'required','Details' =>'required']);
    	$permissions = new Permission;
    	$permissions->name=$req->name;
    	$permissions->display_name=$req->Display_Name;
    	$permissions->description=$req->Details;
       // dd($req->Details);
    	$permissions->save();
        Session::flash('message', 'Permission Saved Sucessfully'); 
        return redirect()->route('permission_list');
    	//return("perfectr");
    }
    public function Permission_List(){
    	
        $data['permissions']=permission::select('id','name','display_name','description')->get();
    	
        return view('admin.permissions.permissionlist',$data);
    }
    public function editPermission($id){
        $data['permission']=Permission::where('id',$id)->first();
        //dd($data['permission']);
        //return view('admin.permissions.newpermission');
        return view('admin.permissions.editpermission',$data);
    }
    public function editPermissionRequest(Request $req){
        $req->validate(['name'=>'required','Display_Name'=>'required','Details' =>'required']);
        $Permission=Permission::find($req->role_Id);
        $Permission->name=$req->name;
        $Permission->display_name=$req->Display_Name;
        $Permission->description=trim($req->Details);
        $Permission->save();
        Session::flash('message', 'Permission Updated Sucessfully'); 
        return redirect()->route('permission_list');

    }
}