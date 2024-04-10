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
                      <div class="container-fluid">

                        <div class="col-lg-10 offset-1">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">User Account Info</h3>
                                    </div>


                                    <hr>
                                    <div class="row">
                                        <div class="col-3 offset-2">
                                            @if ($users->image==null)
                                                                @if ($users->gender == 'female')
                                                                <img src="{{asset('image/girl_default_user.jpg')}}" class="img-thumbnail">
                                                            @else
                                                                <img src="{{asset('image/default_user.png')}}" class="img-thumbnail shadow-sm">
                                                            @endif
                                                                            @else
                                                        <img src="{{asset('storage/'.$users->image)}}" alt="John Doe" />
                                                        @endif
                                        </div>
                                        <div class="col-5 offset-1">
                                            <h4 class="my-3"><i class="fa-regular fa-user me-2"></i>{{$users->name}}</h4>
                                            <h4 class="my-3"><i class="fa-solid fa-envelope me-2"></i>{{$users->email}}</h4>
                                            <h4 class="my-3"><i class="fa-solid fa-phone me-2"></i>{{$users->phone}}</h4>
                                            <h4 class="my-3"><i class="fa-solid fa-location-dot me-2"></i>{{$users->address}}</h4>
                                            <h4 class="my-3"><i class="fa-solid fa-venus-mars me-2"></i>{{$users->gender}}</h4>
                                            <h4 class="my-3"><i class="fa-solid fa-calendar-days me-2"></i>{{$users->created_at->format('j-F-Y')}}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <!-- END DATA TABLE -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT-->
@endsection
