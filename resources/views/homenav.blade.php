 <?php
use App\Models\UserModel;
use App\Models\Role;
use App\Models\Menu;

$role=request('role');

 $username = UserModel::where('id','=',$role)
            ->pluck('name')->first();

$role = Role::where('id','=',$role)
            ->pluck('role')->first();   
            
 $menus= Menu::whereNull('parent_id')->select('name','route_name')->orderBy('nav_order','asc')->get()->toArray();
 
 ?>
 
 
 <!-- As a heading -->
 <nav class="navbar navbar-light bg-light">
    <span class="navbar-brand mb-0 h1 p-3">  Accounts</span>

    <span class="d-flex align-items-center">

    @foreach($menus as $route)
        @if($route["route_name"] != NULL)

        <a href="{{route($route["route_name"])}}" class="nav-link m-2">
            <p>{{$route["name"]}}</p>
        </a> 
     
        @endif
    @endforeach

    </span>

    <span class="d-flex align-items-center">
        <p>{{$username}}({{$role}})</p>
    <a class="btn btn-primary btn-small  m-3" width="200px" href="/logout" role="button">logout</a> 
    </span>
  </nav>