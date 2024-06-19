<!DOCTYPE html>
<html lang="en">
<head>
    @include('header')
</head>
<body>
    @include('navbar')

  <div class="row mt-5 mx-auto p-2" style="width: 800px;">
    {{-- @if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
     @endif --}}

     @if(Session::has('messsage'))
     <p style="color: green">{{ Session::get('message') }}</p>
     @endif
  <div class="col-6">
    <form  action="/doreg" method="post"> 
      @csrf
      {{-- class="mt-5 mx-auto p-2" style="width: 200px;" --}}
      <p><b>REGISTER</b></p>
      <div class="form-group">
      
        <label for="exampleInputEmail1">Name</label>
        <input type="name" name="name"class="form-control" required="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      </div>
      <br>
        <div class="form-group">
      
          <label for="exampleInputEmail1">Email address</label>
          <input type="email"  name="email" class="form-control"  required="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      
        </div>
        <br>
        <div class="form-group">
      
          <label for="exampleInputEmail1">Contact No</label>
          <input type="contact" name="contact_no" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      
        </div>
        <br>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" name="password"  class="form-control" required="exampleInputPassword1" placeholder="Password">
        </div>

        <br>
    
        <div class="form-group">
          <label for="role">Role</label>
          <select name="role" id="exampleInputEmail1" class="form-control">
            @foreach ( $role as $r)
            <option value="{{$r->id}}">{{$r->role}}</option> 
            @endforeach
          
          </select>
        </div>
        
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

  </div>

  <div class="col-6">
      <form action="/dologin" method="post">
        {{-- class="mt-5 mx-auto p-2" style="width: 200px;" --}}
        @csrf
        <p><b>Login</b></p>
        <div class="form-group">
        
          <label for="exampleInputEmail1">Email</label>
          <input type="name" name="email" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <br>
         
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" required id="exampleInputPassword1" placeholder="Password">
          </div>
  
          <br>
      
          <div class="form-group">
            <label for="role">Role</label>
            <select required name="role" id="exampleInputEmail1" class="form-control">
              @foreach ($allrole as $ar)
              <option value="{{$ar->id}}">{{$ar->role}}</option>
              @endforeach
            </select>
          </div>
          
          <br>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>

      </div>

    </div>
    @include('footer')
</body>
</html>