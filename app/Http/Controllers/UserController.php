<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use DateTime;
use Auth;
use Log;
use Str;
use DB;
use Mail;
use Uuid;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\Crypt;
use App\Models\UpdatPassword;
use App\Models\client;
use App\Models\Tempemail;
use Location;

//use Request;
//use App\Models\
//use App\User;
//use DateTime;
//use Illuminate\Support\Str;

use App\Models\role_user;
use App\Models\Role;

class UserController extends Controller
{
    public function editUser($id){
    	$data['user']=User::where('id',$id)->first();
    //	dd($data['user']->name);
    	$data['role']=Role::select('id','name')->get();

    	return view('admin.users.edituser',$data);
    	
    }
    public function userEdit(Request $req){
    	$req->validate([
            'name' => 'required | max:30',
            'email' => 'required | email',
            'role'=>'required',
            
        ]);
    	$user= User::find($req->user_Id);
    	$user->name=$req->name;
    	$user->email=$req->email;
    	$user->save();

    	$role= role_user::where('user_id',$req->user_Id)->update(['role_id' => $req->role]);
         Session::flash('message', 'User Updated Sucessfully '); 
    	return redirect()->route('user_list');


    } 
    public function AddNewUser(){
        $data['role']=Role::select('id','name')->get();
    	return view('admin.users.addnewuser',$data);
    }
    public function AddNewUserAccount(Request $req){
        $req->validate([
            'name' => 'required | max:30|alpha_dash ',
            'email' => 'required | email | unique:users',
            'role'=>'required',
            
        ]);
       // dd($req);
       //$token = $req->session()->token();
        $var = Str::random(50);
        $now1 = new DateTime();
        $User_id=$req->email;

       // $token=$var."/".$now1->format('d/m/Y')."/".$User_id;
        //dd($token);
        $var = encrypt($var);
        $now1 = encrypt($now1);
        $User_id=encrypt($User_id);
        //dd($decrypted);
        //dd($decrypted);
        //dd($now);
        //dd($var);
        //$token = Uuid::uuid1()->toString();
        //$token = (string) Str::uuid(20);
        //$token = (string) Str::orderedUuid();
        //dd($token);
        $password=str_random(10);
        //dd($password);
    	$name=$req->name;
    	$email=$req->email;
    	//$password=$req->password;
    	$now = new DateTime();
    	$User = new User();

    	$User->name=$name;
    	$User->email=$email;
    	$User->password=Hash::make($password);
    	$User->created_at=$now;
    	$User->updated_at=$now;
    	$User->save();
        
        $data=User::select('id','name','password')->orderBy('id','desc')->first()->toArray();
        $data['password']=$password;
        $data['ramdom']=$var;
        $data['now']=$now1;
        $data['User_id']=$User_id;
        //dd($data);
       // dd($data['name']);
        //dd($data);
        //mail Function
        //$data = array('name'=>"Happyperks");
        $val=Mail::send('admin.mail.mail',['data1'=>$data],function($message) 
        	{
		          $message->to('pkchoudhary1211@gmail.com', 'Tutorials Point')->subject
		        ('Mail From Happyperks')->from('bsourav54@gmail.com');
        	}
    		);

          role_user::insert(['role_id'=>$req->role,'user_id'=>$data['id']]);
	       $token=$var.$now1.$User_id;
	       $pass= new UpdatPassword;
	       $pass->user_email=$email;
	       $pass->token=$token;
	    	$pass->save();   

         Session::flash('message', 'User Saved Sucessfully');     	
        return redirect()->route('user_list');


    }
    public function UserList(){
    	$data['User_Data']=User::join('role_user','role_user.user_id','=','users.id')
        ->join('roles','roles.id','=','role_user.role_id')
        ->select('users.*','roles.display_name')->get();
        //dd($data['User_Data']);
    	//dd($data['User_Data']);

    	return view('admin.users.userlist',$data);
    }
    public function psswordUpdate($ramdom,$time,$User_id){
    	$userId=decrypt($User_id);
    	$token=$ramdom.$time.$User_id;
    	$data['value']=UpdatPassword::where('user_email',$userId)->where('token',$token)->first();
    	//dd(count($data['lcg_value()']));

    	if(count($data['value'])==0){
             Session::flash('message', 'Invalid User!'); 
    		return view("admin.adminlogin");
    	}
    	else{
        //dd($data);

    		 return view('admin.users.passwordupdate',$data);
    	}
    	//return('Your Are in Passport upodate');

    }
    public function updatePassword(){
        return view('admin.users.passwordupdate');
    }
    public function updateOnetimrPassword(Request $req){
        $req->validate(['oldpassword'=>'required ','newpassword'=>'required | min:8|required_with:confirmPassword|same:confirmPassword']);
        
        $Email= $req->userid;
        $Password=$req->newpassword;
        $currentPassword=$req->oldpassword;
     
        $data=User::where('email',$Email)->first();
        

        if(Hash::check($currentPassword, $data->password)) {
            $user= User::find($data->id);
            $user->password=Hash::make($Password);
            $user->save();
            UpdatPassword::where('user_email',$data->email)->delete();
            return view("admin.adminlogin");
        }
        else{
            Session::flash('message', 'Invalid User!'); 
            return view('admin.adminlogin');
        }
        //dd(count($data));


        //return($req);
    }
    public function Profile(){
        $id=Auth::user()->id;
        //dd($id);  
            $data['role']=User::where('users.id',$id)->join('role_user','role_user.user_id','=','users.id')
            ->join('roles','roles.id','=','role_user.role_id')
            ->select('roles.display_name')->first();
            //dd($data['role']);
            
            $data['secret']=client::where('user_id',$id)->select('id','name','secret','redirect')->get();
            $data['temp_id']=Tempemail::where('temp_user_id',Auth::user()->id)->first();
        // dd($data);
           //dd($data['secret']);
        return view('admin.users.profile',$data);
    }
    public function updateName(Request $req){
        $req->validate(['name'=>'required |max:30']);
        $name=$req->name;
        $user= User::find(Auth::user()->id);
        $user->name=$name;
        $user->save();
         Session::flash('name',  'Your Name Updated');
        //Writing in to log file
        $id=Auth::user()->id;
        $data=['user id'=>$id,' user updated name'=> $name];
        $val=json_encode($data);
        Log::channel('User_Activity')->info($val.PHP_EOL ); 
        
        return redirect()->back();
    }
    public function updateEmail(Request $req){

        $req->validate(['email'=>'required|email|unique:temp_email,temp_user_email|unique:users']);
        $email=$req->email;
        //dd($req);

        $var = Str::random(50);
        $now1 = new DateTime();
        

      
        $user_id = encrypt(Auth::user()->id);
        $now1 = encrypt($now1);
        $email=encrypt($email);

        $data['var']=$var;
        $data['userid']=$user_id;
        $data['now']=$now1;
        $data['email']=$email;
        //$data['User_id']=$User_id;

        $val=Mail::send('admin.mail.verifyemail',['data1'=>$data],function($message) 
            {
                $message->to('pkchoudhary1211@gmail.com', ' Verify Email')->subject
                ('Mail From Happyperks')->from('bsourav54@gmail.com');
            }
            );





        $email=$req->email;

        $user= new Tempemail;
        $user->temp_user_email=$email;
        $user->temp_user_id=Auth::user()->id;
        $user->save();
        Session::flash('info','Verification link Sent On Your Email Id');
        //Write Log Into File
        $id=Auth::user()->id;
        $data=['user id'=>$id,'user added new email'=> $email];
        $val=json_encode($data);
        Log::channel('User_Activity')->info($val.PHP_EOL ); 

        return redirect()->back();

    }
    public function verifyEmail($var,$now,$userid,$email){
        //dd(decrypt($userid));
        $email=decrypt($email);
        $id=decrypt($userid);
        $data['val']=Tempemail::where('temp_user_id',$id)->delete();
        //dd($data['val']);
        if($data['val']==0)
        {
            Session::flash('info','Link Has Been Expired!!');
        }else{
            $user= User::find(decrypt($userid));
            $user->email=$email;
            $user->save();
            Session::flash('info','Log In With Your Verifed ID ');
            //Write Log Into File
            //$id=Auth::user()->id;
            $data=['user id'=>$id,'user verified email'=> $email];
            $val=json_encode($data);
            Log::channel('User_Activity')->info($val.PHP_EOL); 
            }
         Auth::logout();
        return redirect()->route('adminlogin');
    }
    public function ChangePassword(Request $req){
        $req->validate(['current_password'=>'required',
            'new_password'=>'required|min:8',
            'confirm_password'=>'required_with:new_password|same:new_password']);
        //dd($req);
        $currentpassword=$req->current_password;
        $newpassword=$req->confirm_password;
        //dd($currentpassword);
          $data=User::where('id',Auth::user()->id)->first();
        if(Hash::check($currentpassword, $data->password)) {
            $user= User::find($data->id);
            $user->password=Hash::make($newpassword);
            $user->save();
          
            // Session::flash('info', ' Login Wit!');
           
            //Write Log Into File
            $id=Auth::user()->id;
            $data=['user id'=>$id,'user changed password'=> 'hidden'];
            $val=json_encode($data);
            Log::channel('User_Activity')->info($val.PHP_EOL ); 
            Auth::logout();

            return view("admin.adminlogin");
        }
        else{
            Session::flash('info', 'Password Not Matched'); 
            return redirect()->back();
        }



    }
    public function Viewclient(){
        return view('admin.clientapi.clientprofile');
    }
    public function test(Request $req){
        //dd($req->header('content-type'));
      //  Request::ip();
        //$ip=Request::getClientIp(true);
       // $ip=$req->ip();
       // $ip=$req->ip();
       //  $ip = $req->server->get('REMOTE_ADDR');
       // dd($ip);
       //  $ip =  $req->getClientIp();
     
       //  $data = Location::get($ip);
       //  dd($data,$ip);

        // $ip=  Request::getClientIp();
        // $data = Location::get($ip);
        // $position = Location::get();
        // dd($position);
        // dd($data,$ip); 
        
        // dd($ip);
        //$ip=$req->server('SERVER_ADDR');
            $ip=$req->getIp();
            dd($ip);
            $clientIps = array();
        $ip = $req->server->get('REMOTE_ADDR');
        if (!$req->isFromTrustedProxy()) {
                dd($ip);
                return array($ip);
        }
        if (self::$trustedHeaders[self::HEADER_FORWARDED] && $req->headers->has(self::$trustedHeaders[self::HEADER_FORWARDED])) {
                $forwardedHeader = $req->headers->get(self::$trustedHeaders[self::HEADER_FORWARDED]);
                preg_match_all('{(for)=("?\[?)([a-z0-9\.:_\-/]*)}', $forwardedHeader, $matches);
                $clientIps = $matches[3];
        } elseif (self::$trustedHeaders[self::HEADER_CLIENT_IP] && $req->headers->has(self::$trustedHeaders[self::HEADER_CLIENT_IP])) {
                $clientIps = array_map('trim', explode(',', $req->headers->get(self::$trustedHeaders[self::HEADER_CLIENT_IP])));
        }
            $clientIps[] = $ip; // Complete the IP chain with the IP the request actually came from
            $ip = $clientIps[0]; // Fallback to req when the client IP falls into the range of trusted proxies
        foreach ($clientIps as $key => $clientIp) {
            // Remove port (unfortunately, it does happen)
            if (preg_match('{((?:\d+\.){3}\d+)\:\d+}', $clientIp, $match)) {
                    $clientIps[$key] = $clientIp = $match[1];
            }
            if (IpUtils::checkIp($clientIp, self::$trustedProxies)) {
                    unset($clientIps[$key]);
            }
        }
    // Now the IP chain contains only untrusted proxies and the client IP
    return $clientIps ? array_reverse($clientIps) : array($ip);
    }

}