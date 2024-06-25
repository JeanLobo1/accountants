<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\Role;
use Illuminate\Support\Facades\Validator;
class RegisterController extends Controller
{
    public function helloworld(){

      return view('helloworld');
    }


     public function view(Request $request){ 

      $role=Role::where("role","Admin")->select("id","role","alias")->get();

      $allrole=Role::select("id","role","alias")->get();
        return view("authentication.register",compact('role','allrole'));
     }


     public function register(Request $request){ 
      
     $params = $request->all(); 
 
     Validator::make(  $params, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

     unset( $params['_token'] );   // passwords are not hashed as its dummy project
     
      $db = new UserModel();
      $dbresp =   $db->insert_data($params);
      session()->flash('message','message');
      return redirect("/"); 

   }

     
}
