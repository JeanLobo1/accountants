<!DOCTYPE html>
<html lang="en">
<head>
    @include('header')
</head>
<body>
    @include('homenav')
 
    <div class="row mt-5 mb-5 p-5">
      {{-- <div> --}}
  
    {{-- <a class="btn btn-primary btn-small " width="200px" href="/listusercoupons" role="button">See Applied Coupons Users </a> </div> --}}
    <div class="card">
      <p class="p-3"><b>Records</b></p>
    <div class="card-header">
    <a href="/addrecord" class="btn btn-success  btns addtask addtaskpm mr-2">Add Records<i class="fas fa-plus ml-2"></i></a>
    </div>
    <div class="card-body">

    <table class="table">
        <thead>
          <tr>
            <th scope="col">name </th>
            <th scope="col">phone</th>
          </tr>
        </thead>
        <tbody>
         
            @foreach($records as $r)
            <tr>
            <td>{{$r->name}}</td>
            <td>{{$r->address}}</td>
            <td>
                <a href="/edit_record/{{$r->id}}" class="btn btn-warning p-0 btn-sm" data-toggle="tooltip" title="Edit">Edit</a>
                {{-- <a href="/delete_permission/{{$accountant->id}}" class="btn btn-danger p-0 btn-sm" data-toggle="tooltip" title="Delete">Delete</a> --}}
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    </div>
    <div>
        @include('footer')
</body>
</html>