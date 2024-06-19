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
    <div class="card-header">
    <a href="/add_accountants" class="btn btn-success  btns addtask addtaskpm mr-2">Add Accountants<i class="fas fa-plus ml-2"></i></a>
    </div>
    <div class="card-body">

    <table class="table">
        <thead>
          <tr>
            <th scope="col">name</th>
            <th scope="col">email</th>
            <th scope="col">role</th>
            <th scope="col">contact</th>
          </tr>
        </thead>
        <tbody>
         
            @foreach($accountants as $accountant)
            <tr>
            <td>{{$accountant->name}}</td>
            <td>{{$accountant->email}}</td>
            <td>{{$accountant->role}}</td>
            <td>{{$accountant->contact_no}}</td>
            <td>
                <a href="/edit_accountants/{{$accountant->id}}" class="btn btn-warning p-0 btn-sm" data-toggle="tooltip" title="Edit">Edit</a>
                <a href="/delete_accountants/{{$accountant->id}}" class="btn btn-danger p-0 btn-sm" data-toggle="tooltip" title="Delete">Delete</a>
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