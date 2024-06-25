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
        @if(empty($record))
          <form action="/add-records" method="post">

     @else
        <form action="/update_record/{{$record->id}}" method="post">
     @endif
            
            {{-- class="mt-5 mx-auto p-2" style="width: 200px;" --}}
            @csrf
            <p><b>Add Accountants</b></p>
            <div class="form-group">
            
              <label for="exampleInputEmail1"> name</label>
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $record->name ?? null }}" required autocomplete="name" autofocus>

              @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            
            </div>
            <br>
             
              <div class="form-group">
                <label for="">address</label>
                <input id="address" type="text" class="form-control" name="address" value="{{ $record->address ?? null }}" required autocomplete="name" autofocus>
            </div>
              <br>

              <div class="form-group">
                <label for="exampleInputPassword1">phone</label>
                <input id="phone" type="contact_no" class="form-control @error('contact_no') is-invalid @enderror" name="phone" value="{{ $record->phone ?? null }}" required >

                @error('contact_no')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
              <br>
      
              <div class="form-group">
                <label for="exampleInputPassword1">aditional info</label>
                <input id="additional_info" type="contact_no" class="form-control @error('contact_no') is-invalid @enderror" name="additional_info" value="{{ $record->additional_info ?? null }}"" required >

                @error('contact_no')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
              <br>

           
              
              <br>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
    
          </div>
    
        </div>
    @include('footer')
    
</body>
</html>