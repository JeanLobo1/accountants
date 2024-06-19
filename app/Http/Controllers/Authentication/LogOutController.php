<?php
namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class LogOutController extends Controller
{     
        
    public function logout(Request $request){ 
       
        $request->session()->forget('UserKey'); 
        $request->session()->flush();

       return redirect('/');
       
    }//

}//



