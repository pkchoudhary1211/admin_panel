<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DateTime;
use Str;
use DB;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Models\role_user;
use App\Models\Role;
use App\Models\clientManager;
use Entrust;
use Mail;
use Auth;
use Uuid;
use Log;
use Logger;
use App\Models\client;
use App\Models\Client_ip;
use App\Models\UpdatPassword;

class AdminController extends Controller
{
	// public function __construct(ClientManagerInterface $client_manager)
 //    {
 //        $this->client_manager = $client_manager;
 //    }
    public function Dashboard(){
    	return view('admin.Dashboard');
    }
    public function Event(){
    	return view('admin.Event');
    }
    public function Professors(){
    	return view('Professors');
    }
    public function AdminLogIn(){

        if(Auth::check()) 
        {
            return redirect()->route('home');
        }
    	return  view('admin.adminlogin');
    }
    public function AdminRegister(){
    	return view('admin.adminregister');
    }
   
    public function CreateNewAPI(Request $req){
        
            $req->validate([
                    //'email'=> 'required | email',
                    'name' => 'required',
                    'email' => 'required |unique:users',
                    'token'=>'required',
                    'Manager'=>'required',
                    'ip_val' =>'required',
                    
            ]);

        $var = Str::random(50);
        $now1 = new DateTime();
        $User_id=$req->email;

       
        $var = encrypt($var);
        $now1 = encrypt($now1);
        $User_id=encrypt($User_id);
        
        $password=str_random(10);
        
        $name=$req->name;
        $email=$req->email;
        
        $now = new DateTime();
        $User = new User();

        $User->name=$name;
        $User->email=$email;
        $User->password=Hash::make($password);
        $User->created_at=$now;
        $User->updated_at=$now;
        $User->save();

        $data=User::select('id','name','password')->orderBy('id','desc')->first()->toArray();
        $userId=$data['id'];
        $data['password']=$password;
        $data['ramdom']=$var;
        $data['now']=$now1;
        $data['User_id']=$User_id;
      
         $val=Mail::send('admin.mail.mail',['data1'=>$data],function($message) 
            {
                  $message->to('pkchoudhary1211@gmail.com', 'Tutorials Point')->subject
                ('Mail From Happyperks')->from('bsourav54@gmail.com');
            }
            );

            role_user::insert(['role_id'=>30,'user_id'=>$data['id']]);

           $token = $var.$now1.$User_id;
           $pass = new UpdatPassword;
           $pass->user_email=$email;
           $pass->token=$token;
           $pass->save(); 


            $data=$req->ip_val;
           
            $val=explode(',',$data);
            foreach ($val as $key => $value) {
                $value='required|ip';
            }
            
            $uuid=Uuid::generate(1,'00:11:22:33:44:55');
            //dd($uuid);
            $token=$req->token;
            $manager=$req->Manager;
            if($token=="personal"){
                $personal=1;
                $password=0;
            }
            else{
                 $personal=0;
                $password=1;
            }
            //$data=User::select('id','name','password')->orderBy('id','desc')->first()->toArray();
            $client = Passport::client()->forceFill([
            'user_id' => $userId,
            'name' => $req->name,
           // 'uuid'=> $uuid,
            'id'=> $uuid,
            'secret' => Str::random(40),
            'redirect' => "localhost/callback/",
            'personal_access_client' => $personal,
            'password_client' => $password,
            'revoked' => false,
                ]);

        $client->save();
        $valDB['val']=DB::table('oauth_clients')->orderBy('client_id','desc')->first();
        //dd($client->id);
        //dd($valDB['val']);
         foreach ($val as$value)
            {
                $ip_tab = new Client_ip;
                $ip_tab->ip_client_ip=$value;
                $ip_tab->ip_client_id=$valDB['val']->client_id;
                
                $ip_tab->save();
                //dd($value);
             }


       
        //dd($client);
        clientManager::insert(['user_id'=>$client->user_id,'manager_id'=>$manager]);
        //$data['']
        Session::flash('message', 'Client SuccessFully Created :)'); 
        return redirect()->route('apilist');
    	
    }
    public function CreateAPI(){
    	
    	$data['User_Data']=Role::where('roles.name','user')
        ->join('role_user','role_user.role_id','=','roles.id')
        ->join('users','users.id','=','role_user.user_id')->select('users.id','users.name')->get();
       
        $data['manager']=Role::where('roles.name','account-manager')
        ->join('role_user','role_user.role_id','=','roles.id')
        ->join('users','users.id','=','role_user.user_id')->select('users.id','users.name')->get();

       // dd($data['manager']);
    	return view('Admin.clientapi.createAPI',$data);
    }
    public function EditClient($id){
        $data['manager']=Role::where('roles.name','account-manager')
        ->join('role_user','role_user.role_id','=','roles.id')
        ->join('users','users.id','=','role_user.user_id')->select('users.id','users.name')->get();

        $data['client']=client::where('client_id',$id)->first();
        //dd($data['client']);
        $data['ip_address']=Client_ip::where('ip_client_id',$id)->get();
        //dd($data['ip_address']);
        return view('Admin.clientapi.editapi',$data);
    }
    public function APIList(){

        if(Entrust::hasRole('account-manager'))
        {
           // return('ok');
           // $data['API_Data']=DB::table('oauth_clients')->join('')->select('id','user_id','name','secret')->get();
            $data['API_Data']=clientManager::where('client_manager.manager_id',Auth::user()->id)->join('oauth_clients','oauth_clients.user_id','client_manager.user_id')->select('oauth_clients.*')->get();
            //dd($data)
        }
        else{
            
        $data['API_Data']=DB::table('oauth_clients')->select('client_id','user_id','name','secret')->get();

        }
         // dd($data['API_Data']);
        return view('admin.clientapi.userapilist',$data);
    }
    public function AccountMangerAPI(){

        $data['API_Data']=clientManager::where('client_manager.manager_id',Auth::user()->id)->join('oauth_clients','oauth_clients.user_id','client_manager.user_id')->select('oauth_clients.*')->get();
       return view('admin.clientapi.userapilist',$data);
    }
    public function Regenerate_Client_Sceret($id){

        
        DB::table('oauth_clients')->where('client_id',$id)->update(['secret'=>Str::random(40)]);
         //return($client);
        Session::flash('message', 'Clien Secret Regenerated SuccessFully :)'); 

        //Write Log Into File
        $id=Auth::user()->id;
        $data=['user id'=>$id,'user Regenerated secret'=> 'hidden'];
        $val=json_encode($data);
        Log::channel('User_Activity')->info($val.PHP_EOL ); 
        
        return redirect()->back();
        //return redirect()->route('apilist');

    }
    public function EditClientRequest(Request $req){

        //dd($req);
        $client_name = $req->client_name;
        $c_id=$req->clientId;
        //dd($client_name);
        $ip_address=$req->ip_val;
        if($ip_address!=""){
            Client_ip::where('ip_client_id',$c_id)->delete(); 
            
            $val=explode(',',$ip_address);
            
            foreach($val as $ip){

                $ipVal = new Client_ip;
                $ipVal->ip_client_ip=$ip;
                $ipVal->ip_client_id=$c_id;
                $ipVal->save();

            }
        }

     
        client::where('client_id',$c_id)->update(['name'=>$client_name]);
        Session::flash('message', 'Client SuccessFully Updated :)'); 
        return redirect()->route('apilist');
       
       
        

    }
    public function sendMail(){
        //$data = array('name'=>"Prakash Choudhary");
 
        $data = array('name'=>"Happyperks");
        $val=Mail::send('admin.mail.mail', $data, function($message) {
         $message->to('pkchoudhary1211@gmail.com', 'Tutorials Point')->subject
        ('Mail From Happyperks')->from('bsourav54@gmail.com');
        }
        );

        //return("ok");
    }
    public function mailPage(){
        return view('admin.mail.mail');
    }
    public function ViewClientProfile($id){
        $data['client']=User::where('id',$id)->first();
        //dd($data['client']);
        $data['secret']=Client::where('user_id',$id)->first();
        return view('admin.clientapi.clientprofile',$data);
        
    }
    public function logWrite(){
       // dd(storage_path('log'));
        //dd(base_path().'\public\log\api.log');
        //Log::useFiles(base_path().'\public\log\api.log', 'info');
        //Log::info('Do log this another PATH');
        //Log::channel('User_Activity')->info('Something happened!');
        //$id=Auth::user()->id;
        $id="30";
        $data=['user logged In : Id'=>$id];
        $val=json_encode($data);
        Log::channel('User_Activity')->info($val.PHP_EOL);
    }
    // public function editClient($id){
    //     dd($id);
    //    //client::where('id)
    // }

}
