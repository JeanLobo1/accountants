<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\UserModel;
class LoginController extends Controller
{
   

    public function login(Request $request){ 
        

        $params = $request->all(); 

        $db = new UserModel();

        $param_arr = array ("email"=> $params["email"], "password"=>$params["password"], "role"=>$params["role"]);
      
        $dbresp =   $db->check_login($param_arr);

        if( $dbresp != null && $dbresp["password"] == $params["password"]) {   //&& $params["role"]=="user" 
         
            $request->session()->put('UserKey', $dbresp->toArray());

            return redirect('/home'); 

        }else {

           return redirect('/');
            
        }
    }

    // public function viewlogin(){
    //     return view('registerview');
    // }
}
