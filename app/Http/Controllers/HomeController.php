<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Entrust;
use Auth;
use Log;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $id=Auth::user()->id;
        $data=['user logged id'=>$id];
        $val=json_encode($data);
        Log::channel('User_Activity')->info($val.PHP_EOL );
        
        Entrust::hasRole('role-name');
        if(Entrust::hasRole('user'))
        {
            return redirect()->route('profile');
        }
        else{
            return redirect()->route('dashboard');
        }

    }
}
