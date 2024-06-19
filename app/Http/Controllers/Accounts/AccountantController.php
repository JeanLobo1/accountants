<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\UserModel;
use App\Models\Role;
// use App\Models\Items;
class AccountantController extends Controller
{
    public function index(){

        $accountants = UserModel::select('users.id', 'users.name', 'users.email', 'users.contact_no', 'roles.role')
        ->join('roles', 'users.role', '=', 'roles.id')
        ->where('users.role',2)
        ->get();

        return view('accounts.accountants',compact('accountants')); 
    }

    public function createview(Request $request){

        $role=Role::where("id",2)->select("id","role","alias")->get();

        // $allrole=Role::select("id","role","alias")->get();
        return view('accounts.addaccountants',compact('role'));
    }

    public function create(Request $request){
        $data = $request->all(); 
     Validator::make( $data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        UserModel::create([
            'name' => $request['name'],
            'email' => $request['accountantemail'],
            'role' =>(int)$request['accountantrole'],
            'password' => $request['password'],
            'contact_no' => $request['contact_no'],
        ]);
        return redirect("/accountantslist"); 
        
        // $items = Items::select('item','type','price')->get()->toArray();
        // return view('auth.home',compact('items'));

    }


    public function edit(Request $request,$id){

    $role=Role::where("id",2)->select("id","role","alias")->get();
     $accounatant=UserModel::where("id",$id)->first();
  
        return view('accounts.editaccountants',compact("role","accounatant"));

    }

    public function update(Request $request,$id){
        $param_arr = $request->all();

        UserModel::where('id', $id)->update([
            'name' => $request['name'],
            'email' => $request['accountantemail'],
            'role' =>(int)$request['accountantrole'],
            'password' => $request['password'],
            'contact_no' => $request['contact_no'],
        ]);
      
        return redirect('/accountantslist');
    }


    public function delete(Request $request,$id){

        UserModel::where('id', $id)->delete();
        return redirect('/accountantslist');

    }


}
