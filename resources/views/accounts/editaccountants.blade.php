<!DOCTYPE html>
<html lang="en">
<head>
  @include('header')
</head>
<body>
    @include('homenav')
    <div class="row mt-5 mx-auto p-2" style="width: 800px;">
        @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
         @endif
    
      <div class="col-6">
          <form action="/update_accountants/{{ $accounatant->id}}" method="post">
            {{-- class="mt-5 mx-auto p-2" style="width: 200px;" --}}
            @csrf
            <p><b>Edit Accountants</b></p>
            <div class="form-group">
            
              <label for="exampleInputEmail1"> name</label>
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $accounatant->name }}" required autocomplete="name" autofocus>

              @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            
            </div>
            <br>
             
              <div class="form-group">
                <label for="exampleInputPassword1">email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="accountantemail" value="{{ $accounatant->email }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
              <br>

              <div class="form-group">
                <label for="exampleInputPassword1">contact</label>
                <input id="contact_no" type="contact_no" class="form-control @error('contact_no') is-invalid @enderror" name="contact_no" value="{{ $accounatant->contact_no }}" required >

                @error('contact_no')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
              <br>
              <div class="form-group">
                <label for="exampleInputPassword1">role</label>
                <select required name="accountantrole" id="exampleInputEmail1" class="form-control">
                    @foreach ($role as $ar)
                    <option value="{{$ar->id}}" @if ($ar->id == $accounatant->role) selected  @endif >{{$ar->role}}</option>
                    @endforeach
                  </select>
                @error('is_admin')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <br>

              {{-- <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" required id="exampleInputPassword1" placeholder="Password">
              </div> --}}
           

              
              <br>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
    
          </div>
    
        </div>
    @include('footer')
    
</body>
</html>