{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        Hello
        <h3>Role- {{Auth::user()->role}}</h3>
        <form action="{{route('logout')}}" method="POST">
        @csrf
        <input type="submit" value="Log out">
        </form>
</body>
</html> --}}
@extends('admin.layouts.master')
 @section('title','Category List Page')
@section('content')
          <!-- MAIN CONTENT-->
          <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="col-md-12">
                        <!-- DATA TABLE -->
                        @if (session('deleteSuccess'))
                        <div class="col-4 offset-8">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fa-regular fa-circle-xmark mx-2"></i>{{session('deleteSuccess')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>
                        </div>
                        @endif
                      <div class="row">
                        <div class="col-3">
                            <h4 class="text-secondary">Search Key : <span class="text-success">{{request('key')}}</span></h4>
                        </div>

                        <div class="mb-3 col-3 offset-6">

                                <form action="{{route('admin#list')}}" method="GET">
                                    @csrf
                                    <div class="d-flex">
                                    <input type="text" name="key" class="form-control" placeholder="Search..." value="{{request('key')}}">
                                    <button class="btn btn-dark text-white" type="submit">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                        <div class="row">
                                    </button>

                            </div>
                                </form>
                        </div>
                      </div>
                      <div class="col-12 row my-2">
                        <div class="col-1 offset-10 bg-white shadow-sm p-2 text-center">
                            <h3 class=""><i class="fa-solid fa-database mr-2"></i>{{$admin->total()}}</h3>
                        </div>
                      </div>
                        {{-- @if (count($categories)!=0) --}}
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2 text-center">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <<th>Role</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($admin as $a)
                                    <tr class="tr-shadow">
                                        <td class=col-2>
                                            @if ($a->image == null)
                                                @if ($a->gender == 'female')
                                                    <img src="{{asset('image/girl_default_user.jpg')}}" class="img-thumbnail">
                                                @else
                                                    <img src="{{asset('image/default_user.png')}}" class="img-thumbnail shadow-sm">
                                                @endif
                                            @else
                                            <img src="{{asset('storage/'.$a->image )}}" class="img-thumbnail shadow-sm">
                                            @endif
                                        </td>
                                        <input type="hidden" id='adminId' value="{{$a->id}}">
                                        <td>{{$a->name}}</td>
                                        <td>{{$a->email}}</td>
                                        <td>{{$a->gender}}</td>
                                        <td>{{$a->phone}}</td>
                                        <td>{{$a->address}}</td>

                                            <td>
                                                <select class="form-control statusChange">
                                                    <option value="user" @if($a->role=="user")  @endif >User</option>
                                                    <option value="admin" @if($a->role=="admin")  selected @endif >Admin</option>
                                                </select>
                                            </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-3">
                                {{$admin->links()}}
                            </div>
                        </div>

                        <!-- END DATA TABLE -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT-->
@endsection
@section('scriptSource')
<script>
     $(document).ready(function(){
        $('.statusChange').change(function(){
        $currentStatus=$(this).val();
        $parentNode=$(this).parents('tr');
        $orderId=$parentNode.find('#adminId').val();
        $data={
            'adminId' : $orderId,
            'role' : $currentStatus,
        };
        $.ajax({
            type : 'get',
            url : '/admin/change/role',
            data : $data,
            dataType : 'json',
        })
        location.reload();
    })
    });


</script>
@endsection
