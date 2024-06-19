<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\RoleHasMenu;
use App\Models\Menu;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if(isset($request->role)){
            $current_role_id = $request->role;
            $menu = Menu::where('route_name',Route::currentRouteName())->first();
            $rolehasmenu = RoleHasMenu::where('role_id',$current_role_id)->where('menu_id',$menu->id)->first();

            if(!empty($rolehasmenu)){
                return $next($request);
            }
             else{
                // return redirect('/home');
                return redirect()->back();

             }
           
        }
        else{
            return redirect('/');
        }
      


        
    }
}
