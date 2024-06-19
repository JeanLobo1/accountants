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
          <form action="/addaccounts" method="post">
            {{-- class="mt-5 mx-auto p-2" style="width: 200px;" --}}
            @csrf
            <p><b>Add Accounts</b></p>
            <div class="form-group">
            
              <label for="exampleInputEmail1">Item</label>
              <input id="item" type="text" class="form-control @error('item') is-invalid @enderror" name="item" value="{{ old('item') }}" required autocomplete="item" autofocus>
            </div>
            <br>
             
              <div class="form-group">
                <label for="exampleInputPassword1">Type</label>
                <select name="type" id="type" required  class=
                "form-control @error('type') is-invalid @enderror">
                    <option value="expense">expense</option>
                    <option value="income">income</option>
                  </select>
              </div>
              <br>
              <div class="form-group">
                <label for="exampleInputPassword1">Price</label>
                <input id="price" type="price" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price">
              </div>
              <br>



              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
    
          </div>
    
        </div>

    @include('footer')
</body>
</html>