<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use League\OAuth2\Server\Exception\OAuthServerException;
use Psr\Http\Message\ServerRequestInterface;
use Response;
use Auth;
use \Laravel\Passport\Http\Controllers\AccessTokenController as ATC;
use Log;
use App\Models\Client_ip;
use App\Models\client;
class AccessTokenController extends ATC
{
    public function issueToken(ServerRequestInterface $request)
    {
         try {
            $body=$request->getParsedBody();
            $c_id=$body['client_id'];
            $c_secret=$body['client_secret'];
           // dd($request->getServerParams());
            $getData=$request->getServerParams();
            $ip=$getData['REMOTE_ADDR'];
           // dd($ip);
            $clientVal=client::where('id',$c_id)->first();
            //dd($clientVal);
            $check=Client_ip::where('ip_Client_ip',$ip)->where('ip_client_id',$clientVal->client_id)->count();
          //dd(count($check));
            
            if($check==0){

              return("Invalid  IP Address ");
            }
            
            $data=client::where('id',$c_id)->where('secret',$c_secret)->count();
            //dd($data);
            if($data==0){

              return("Invalid  IP Address ");
            }
            
            $val=$request->getHeaders();
           // dd($val);

            $method=$request->getMethod();
            
            //dd($method);
            //dd(gettype($val));
            $content=$val['content-type'][0];
            //dd($content[0]);
           

            //writing into log file
            $data=['access token request method'=>$method,'content-type'=>$content];
            $body=$request->GetparsedBody();
            
            $fullArray=array_merge($data,$body);            
            //dd($fullArray);
            $val=json_encode($fullArray);
            Log::channel('apiRequest')->info($val.PHP_EOL);

           //  $body=$request->GetparsedBody();
           //  $body=json_encode($body);
           // // dd($body);
           //  //$data=[''=>$method,'content-type'=>$content];
           //  $val=json_encode($data);
           //  Log::channel('apiRequest')->info($body.PHP_EOL);


         	///dd($request);
            //get username (default is :email)
            $username = $request->getParsedBody()['username'];

            //get user
            //dd($username);
            //change to 'email' if you want
            $user = User::where('email', '=', $username)->first();

            //generate token
            //$userId=$user->id;
            
            $tokenResponse = parent::issueToken($request);

            //return($tokenResponse);
            //dd($tokenResponse);
            //convert response to json string
            $content = $tokenResponse->getContent();
            //dd($content);
           //convert json to array
             $data = json_decode($content, true);
          // dd($data);
           //  if(isset($data["error"]))
           //      throw new OAuthServerException('The user credentials were incorrect.', 6, 'invalid_credentials', 401);

           //  //add access token to user
           	$user = collect($user);
            $user->put('access_token', $data['access_token']);
           //  //if you need to send out token_type, expires_in and refresh_token in the response body uncomment following lines
            $user->put('token_type', $data['token_type']);
            $user->put('expires_in', $data['expires_in']);
            $user->put('refresh_token', $data['refresh_token']);
           // dd($user);
            //$val=Auth::loginUsingId($userId);
            //dd($val);
            //dd($user);
            Log::channel('apiResponse')->info($user.PHP_EOL);
            return($user);
            //return redirect('api/user');
            //return redirect()->route('apilink');
        //     //return ($tokenResponse);
         }
        catch (ModelNotFoundException $e) { // email not found
        //     //return error message
           return response(["message" => "User not found"], 500);
        }
     catch (OAuthServerException $e) { //password not correct..token not granted
             //return error message
            return response(["message" => "The user credentials were incorrect.', 6, 'invalid_credentials"], 500);
        }
         catch (Exception $e) {
        //     ////return error message
             return response(["message" => "Internal server error"], 500);
         }
    }
}