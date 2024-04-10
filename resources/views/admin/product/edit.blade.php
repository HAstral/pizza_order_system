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

                        <div class="col-lg-10 offset-1">
                            <div class="card">

                                <div class="card-body">
                                    <div class="ms-5">
                                        {{-- <a href="{{route('product#list')}}"> --}}
                                            <i class="fa-regular fa-hand-point-left text-dark" onclick="history.back()"></i>
                                        {{-- </a> --}}
                                    </div>
                                    <div class="card-title">
                                        {{-- <h3 class="text-center title-2">Product Details</h3> --}}
                                    </div>



                                    <div class="row mt-5">
                                        <div class="col-3 offset-2">
                                            <img src="{{asset('storage/'.$pizza->image)}}" class="img-thumbnail shadow-sm" />

                                        </div>
                                        <div class="col-7">
                                            <h3 class="my-3 btn bg-info text-dark d-block w-50 text-center fs-5">  {{$pizza->name}}</h3>

                                            <span class="my-3 btn bg-secondary text-dark"><i class="fa-regular fs-5 fa-id-card me-2"></i>{{$pizza->price}} kyats</span>
                                            <span class="my-3 btn bg-secondary text-dark"><i class="fa-regular fs-5 fa-id-card me-2"></i>{{$pizza->waiting_time}} mins</span>
                                            <span class="my-3 btn bg-secondary text-dark"><i class="fa-regular fs-5 fa-id-card me-2"></i>{{$pizza->view_count}}</span>
                                            <span class="my-3 btn bg-secondary text-dark"><i class="fa-solid fa-fingerprint me-2"></i>{{$pizza->category_name}}</span>
                                            <span class="my-3 btn bg-secondary text-dark"><i class="fa-regular fs-5 fa-id-card me-2"></i>{{$pizza->created_at->format('j-F-Y')}}</span>
                                            <div class="my-3"><i class="fa-regular fs-4 fa-id-card me-2 d-block"></i>Details</div>
                                            <div class="">{{$pizza->description}}</div>
                                        </div>
                                    </div>
                                    {{-- <div class="row">
                                        <div class="col-4 offset-2 mt-3">
                                           <a href="{{route('admin#edit')}}">
                                            <button class="btn bg-dark text-white">
                                                <i class="fa-solid fa-caret-up"></i>
                                                Edit Profile
                                            </button>
                                           </a>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT-->
@endsection
