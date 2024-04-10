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
            <div class="row">
                <div class="col-3 offset-7 mb-2">
                    @if (session('updateSuccess'))
                    <div class="">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fa-regular fa-circle-xmark mx-2"></i>{{session('updateSuccess')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="col-md-12">
                        <!-- DATA TABLE -->
                      <h2>Create Page</h2>
                      <div class="container-fluid">

                        <div class="col-lg-10 offset-1">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">Account Info</h3>
                                    </div>


                                    <hr>
                                    <div class="row">
                                        <div class="col-3 offset-2">
                                            @if (Auth::user()->image==null)
                                                                @if (Auth::user()->gender == 'female')
                                                                <img src="{{asset('image/girl_default_user.jpg')}}" class="img-thumbnail">
                                                            @else
                                                                <img src="{{asset('image/default_user.png')}}" class="img-thumbnail shadow-sm">
                                                            @endif
                                                                            @else
                                                        <img src="{{asset('storage/'.Auth::user()->image)}}" alt="John Doe" />
                                                        @endif
                                        </div>
                                        <div class="col-5 offset-1">
                                            <h4 class="my-3"><i class="fa-regular fa-id-card me-2"></i>{{Auth::user()->name}}</h4>
                                            <h4 class="my-3"><i class="fa-regular fa-id-card me-2"></i>{{Auth::user()->email}}</h4>
                                            <h4 class="my-3"><i class="fa-regular fa-id-card me-2"></i>{{Auth::user()->phone}}</h4>
                                            <h4 class="my-3"><i class="fa-regular fa-id-card me-2"></i>{{Auth::user()->address}}</h4>
                                            <h4 class="my-3"><i class="fa-solid fa-venus-mars me-2"></i>{{Auth::user()->gender}}</h4>
                                            <h4 class="my-3"><i class="fa-regular fa-id-card me-2"></i>{{Auth::user()->created_at->format('j-F-Y')}}</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 offset-2 mt-3">
                                           <a href="{{route('admin#edit')}}">
                                            <button class="btn bg-dark text-white">
                                                <i class="fa-solid fa-caret-up"></i>
                                                Edit Profile
                                            </button>
                                           </a>
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
