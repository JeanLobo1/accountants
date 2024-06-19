<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\UserModel;
use App\Models\Role;
use App\Models\Menu;
use App\Models\RoleHasMenu;
class PermissionController extends Controller
{
    public function permissionlist(){

        $role=Role::select("id","role","alias")->get()->toArray();

         $menus = Menu::select('role_has_menu.role_id', 'role_has_menu.menu_id', 'backend_menu_items.name')
        ->join('role_has_menu', 'backend_menu_items.id', '=', 'role_has_menu.menu_id')
        ->get();
   
             foreach($role as $key=> $r){
            
            $menu_items=$menus->where('role_id',$r["id"])->pluck("name")->toArray();
   
             $role[$key]["permissions"]=!empty( $menu_items) ?implode(",",$menu_items):"-";

             }

        return view('permission.permission',compact('role')); 
    }

    public function createviewpermission(Request $request){

        $distinctRoles = RoleHasMenu::groupBy('role_id')->pluck('role_id');
        $role=Role::wherenotIn("id",$distinctRoles)->select("id","role","alias")->get();
        $menusall = Menu::select('id', 'name')
        ->get()->toArray();

        return view('permission.addpermission',compact('menusall','role'));
    }

    public function createpermission(Request $request){

        $permissions_in=$request->permissions;
        $role_in=$request->accountantrole;
    
        $create_array=[];
        $temp=[];
       if(!empty($permissions_in)){
       
         foreach($permissions_in as $data){
           $temp["menu_id"]=$data;
           $temp["role_id"]=$role_in;

           array_push($create_array,  $temp);
         }

         RoleHasMenu::insert( $create_array);
   
       }  


        return redirect('/permission_list');
        

    }


    public function editpermission(Request $request,$id){
    $roles=Role::where("id",$id)->select("id","role","alias")->get();

    $menusall = Menu::select('id', 'name')
    ->get()->toArray();
     
    $menus = Menu::join('role_has_menu', 'backend_menu_items.id', '=', 'role_has_menu.menu_id')
    ->where('role_has_menu.role_id',$id)
    ->pluck('role_has_menu.menu_id');
   
        $inserted_menus = !empty(  $menus) ?   $menus->toArray() : [];

        $inserted_menu=[];
        $inserted_menu_no=[];
        foreach ($menusall as $m) {
            if (in_array($m["id"], $inserted_menus)) {
                $inserted_menu[] = $m;
            } else {
                $inserted_menu_no[] = $m;
            }
        }

        return view('permission.editpermission',compact("inserted_menu","inserted_menu_no","roles","menusall"));

    }

    public function updatepermission(Request $request,$id){

       
        $param_arr = $request->all();

         $permissions_in=$request->permissions;
         $role_in=$request->role;


         $permissions_data = RoleHasMenu::where('role_id',$id)
         ->pluck('menu_id')->toArray();

        $tobedeleted = array_diff($permissions_data,$permissions_in);

        $tobeadded = array_diff($permissions_in, $permissions_data);

        if(!empty($tobedeleted)){
        $del= RoleHasMenu::whereIn('menu_id',  $tobedeleted)->where('role_id',$role_in)->delete();
            
        }

         $create_array=[];
         $temp=[];
        if(!empty($tobeadded)){
        
          foreach($tobeadded as $data){
            $temp["menu_id"]=$data;
            $temp["role_id"]=$role_in;

            array_push($create_array,  $temp);
          }
          RoleHasMenu::insert( $create_array);
    
        }    
       
        return redirect('/permission_list');
    }

}
