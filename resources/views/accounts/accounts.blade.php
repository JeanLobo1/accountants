<!DOCTYPE html>
<html lang="en">
<head>
    @include('header')
</head>
<body>
    @include('homenav')

    <p class="p-3"><b>Accounts Listing</b></p>
    <div class="row mt-2 mb-2 p-5">
  
     
    {{-- <a class="btn btn-primary btn-small " width="200px" href="/listusercoupons" role="button">See Applied Coupons Users </a>   --}}


{{-- </div> --}}
    <div class="card">
    <div class="card-header">
    <a href="/add_accounts" class="btn btn-success  btns addtask addtaskpm mr-2">Add Accounts<i class="fas fa-plus ml-2"></i></a>
    </div>
    <div class="card-body">

    <table class="table">
        <thead>
          <tr>
            <th scope="col">Item</th>
            <th scope="col">Type</th>
            <th scope="col">Price</th>
            <th scope="col">Added By</th>
            <th scope="col">action</th>
          </tr>
        </thead>
        <tbody>
         
            @foreach($accounts as $acc)
            <tr>
            <td>{{$acc->item}}</td>
            <td>{{$acc->type}}</td>
            <td>{{$acc->price}}</td>
            <td>{{$acc->added_by}}</td>
            <td>
                <a href="/edit_accounts/{{$acc->id}}" class="btn btn-warning p-0 btn-sm" data-toggle="tooltip" title="Edit">Edit</a>
                <a href="/delete_accounts/{{$acc->id}}" class="btn btn-danger p-0 btn-sm" data-toggle="tooltip" title="Delete">Delete</a>
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