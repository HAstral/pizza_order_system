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
                      <h2>Create Page</h2>
                      <div class="container-fluid">
                        <div class="row">
                            <div class="col-3 offset-8">
                                <a href="{{route('category#list')}}"><button class="btn bg-dark text-white my-3">List</button></a>
                            </div>
                        </div>
                        <div class="col-lg-6 offset-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">Edit Your Category</h3>
                                    </div>
                                    <hr>
                                    <form action="{{route('category#update')}}" method="post" novalidate="novalidate">
                                        @csrf
                                        <div class="form-group">
                                            <label class="control-label mb-1">Name</label>
                                            <input type="hidden" name="categoryId" value="{{$category->id}}">
                                            <input id="cc-pament" name="categoryName" type="text" value="{{old('categoryName',$category->name)}}" class="form-control @error('categoryName') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Seafood...">
                                            @error('categoryName')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>

                                        <div>
                                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                <span id="payment-button-amount"><i class="fa-solid fa-wrench me-2"></i>Update</span>
                                                {{-- <span id="payment-button-sending" style="display:none;">Sending…</span> --}}
                                                <i class="fa-solid fa-circle-right"></i>
                                            </button>
                                        </div>
                                    </form>
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
