<!DOCTYPE html>
<html lang="en">
<head>
  @include('header')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css">
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
          <form action="/addpermission" method="post">
            {{-- class="mt-5 mx-auto p-2" style="width: 200px;" --}}
            @csrf
            <p><b>Add Permission</b></p>
            <div class="form-group">
              <label for="exampleInputPassword1">role</label>
              <select required name="accountantrole" id="exampleInputEmail1" class="form-control">
                  @foreach ($role as $ar)
                  <option value="{{$ar->id}}">{{$ar->role}}</option>
                  @endforeach
                </select>
            
            </div>
            <br>
        </div>

            <div class="col-md-12">
            
                {{-- @if (!empty($inserted_menu))
                    <div class="form-group">
                        <label>Permissions <i class="fas fa-info-circle fa-xs text-success" title=""></i><span style="color:red;">*</span></label>
                        <select class="select2" multiple="multiple" id="permissions" name="permissions[]" style="width: 100%;">
                            @foreach($inserted_menu as $val)
                            <option class="" value="{{$val["id"]}}" selected>{{$val["name"]}}</option>
                            @endforeach
                            @foreach($inserted_menu_no as $val)
                            <option class="" value="{{$val["id"]}}">{{$val["name"]}}</option>
                            @endforeach
                        </select>
                    </div>
                @endif --}}
          
                <div class="form-group">
                    <label>Permissions <i class="fas fa-info-circle fa-xs text-success" title=""></i><span style="color:red;">*</span></label>
                    <select class="select2" multiple="multiple" id="permissions" name="permissions[]" data-placeholder="---Select---" style="width: 100%;">
                    @foreach($menusall as $data)
                        <option class="" value="{{$data["id"]}}">{{$data["name"]}}</option>
                    @endforeach
                    </select>
                </div>
  
              </div>

           
              
              
              <br>

        
              
              <br>
              <div class="col-md-6">
              <button type="submit" class="btn btn-primary">Submit</button>

            </div>
            </form>
    
          
    
        </div>
    @include('footer')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
    <script>


$(document).ready(function() {
  $('.select2').select2({
    theme: 'bootstrap-5',
  });
});


     </script>
    
</body>
</html>