<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

// use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\AccountsModel;
class AccountsController extends Controller
{
    public function index(){

        $accounts=AccountsModel::select('id','item','type','price','added_by')->get();

        return view('accounts.accounts',compact('accounts')); 
    }

    public function createview(Request $request){
        return view('accounts.addaccounts');
    }

    public function create(Request $request){
        $data = $request->all(); 
        Validator::make( $data, [
            'item' => ['required'],
            'type' => ['required'],
            'price' => ['required'],
        ]);
    
        AccountsModel::create([
            'item' => $request['item'],
            'type' => $request['type'],
            'price' =>$request['price'],
            'added_by' =>$request['email'],
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        return redirect("/accountslist"); 
        // $items = Items::select('item','type','price')->get()->toArray();
        // return view('auth.home',compact('items'));

    }


    public function edit(Request $request,$id){
        $accounts= AccountsModel::where("id",$id)->first();
       
        return view('accounts.editaccounts',['accounts'=>$accounts]);
    }

    public function update(Request $request,$id){

      
        AccountsModel::where('id', $id)->update([
            'item' => $request['item'],
            'type' => $request['type'],
            'price' =>$request['price'],
            'added_by' =>$request['email'],
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        return redirect("/accountslist");
        // return redirect("/editcoupon/".$id); 

    }


    public function delete(Request $request,$id){

        AccountsModel::where('id', $id)->delete();
        return redirect("/accountslist");


    }


}
