<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Auth; use DB;
use session;
use App\User;
use Exception;
use Illuminate\Routing\Route;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use League\OAuth2\Server\Exception\OAuthServerException;
use Psr\Http\Message\ServerRequestInterface;
use Response;
use URL;
use \Laravel\Passport\Http\Controllers\AccessTokenController as ATC;

class Datacontroller extends Controller
{
     function tokenRequest(Request $request)
        {
           // dd($request);
            //return('val');
        $http = new \GuzzleHttp\Client;
        // try
        // {
            $url      = URL::to('/').'/oauth/token'; 
            //dd($url);
          //  dd($http);
            $response = $http->post($url, [
                'form-data'       => [
                    'grant_type'    => $request->grant_type,
                    'client_id'     => $request->client_id,
                    'client_secret' => $request->client_secret,
                    'username'      => $request->username,
                    'password'      => $request->password,
                    'scope'         => '',
                ],
            ]);
          //  dd($response);
            $res    = json_decode((string) $response->getBody(), true);

            $data   = array(    
                                'ResponseCode'  => 0, 
                                'message'       => "ok oper",
                                'access_token'  => $res['access_token'], 
                                'refresh_token' => $res['refresh_token'], 
                                'expires_in'    => $res['expires_in'], 
                                'token_type'    => $res['token_type']
                            );
           // dd($data);
            Session::put('access_token', $res['access_token']);
            Session::put('refresh_token', $res['refresh_token']);
            Session::put('expires_in', $res['expires_in']);
            //return($data);
            //dd($data);
            
            return Response::json($data);
        //     exit;
        // }catch (ModelNotFoundException $e) { 
        //     return response(['ResponseCode' => 3000, "message" => USER_NOT_FOUND_MESSAGE], 500);
        // }
        // catch (OAuthServerException $e) { 
        //     return response(['ResponseCode' => 3000, "message" => INVALID_CREDENTIALS_MESSAGE], 500);
        // }
        // catch (Exception $e) {   
        //     return response(['ResponseCode' => 3000, "message" => INTERNAL_SERVER_ERROR], 500);
        // } 
    }
    // public function login()

    // {
    // 	//return("sdkfn");
    //     // validate the info, create rules for the inputs
    //     $rules = array(
    //         'email'    => 'required|email', // make sure the email is an actual email
    //         'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
    //     );
    //     //return($rules);
    //     // run the validation rules on the inputs from the form
    //     $validator = Validator::make(Input::all(), $rules);
    //     // if the validator fails, redirect back to the form
    //     if ($validator->fails()) {
    //         return Redirect::to('login')
    //             ->withErrors($validator) // send back all errors to the login form
    //             ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
    //     } else {
    //         // create our user data for the authentication
    //         $userdata = array(
    //             'email'     => Input::get('email'),
    //             'password'  => Input::get('password')
    //         );
    //        // dd($userdata);
    //         // attempt to do the login
    //         if (Auth::attempt($userdata)) {
    //         	//return("sdfdsf");
    //             //echo 'HEre !!';exit;
    //             // validation successful!
    //             // redirect them to the secure section or whatever
    //             // return Redirect::to('secure');
    //             // for now we'll just echo success (even though echoing in a controller is bad)
    //             //Auth::loginUsingId(Auth::user()->userTablePrimaryKey);
    //             $User_Id=Auth::user()->id;
    //             $ReturnData=User::where('id',$User_Id)->select('name','email')->get();
    //             return($ReturnData);
    //             //echo '<pre>';print_r(Auth::user());exit;

    //             Redirect::to('home');
    //         } else {        
    //             // validation not successful, send back to form 
    //             return Redirect::to('login');
    //         }
    //     }
    // }

    public function APIUser(){
        if (Auth::check()) {
          //  return("dfgdkf");
            //dd(Auth::check());
           // dd(session('access_token'));
           // dd(session()->all() );
           // return("logged In");
            //dd($req->input(''));

            $User_Id= Auth::id();
            $data=User::where('id',$User_Id)->get();
            $val=json_encode($data);
            return($val);
        }
        else{
            return("Invalid User !!!");
        }
    }
   
}
