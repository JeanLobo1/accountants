<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $table = "users";
    protected $guarded = [];


    public function insert_data($inputs){
        // try {
          return UserModel::create($inputs);
        // } catch (\Exception $ex) {	return -1; }
      }//
   
   
       public function check_login($inputs){ 
          //  try {

             return UserModel::select('id as user_id','email','password','role')->where($inputs)->first();

          
          //  } catch (\Exception $ex) { 	return array(); } 
       }//
}
