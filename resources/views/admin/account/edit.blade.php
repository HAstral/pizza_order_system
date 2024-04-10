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

                        <div class="col-lg-10 offset-1">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">Admin Profile</h3>
                                    </div>


                                    <hr>
                                   <form action="{{route('admin#update',Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                      <div class="col-4 text-center">
                                        @if (Auth::user()->image==null)
                                        @if (Auth::user()->gender == 'female')
                                                <img src="{{asset('image/girl_default_user.jpg')}}" class="img-thumbnail shadow-sm">
                                            @else
                                                <img src="{{asset('image/default_user.png')}}" class="img-thumbnail shadow-sm">
                                            @endif                                        @else
                                        <img src="{{asset('storage/'.Auth::user()->image)}}" alt="John Doe" class="img-thumbnail shadow-sm"/>
                                        @endif
                                        <div class="mt-2 ms-5">
                                            <input type="file" name="image" id="" class="form-control @error('image') is-invalid @enderror">
                                            @error('image')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="mt-2 ms-5">
                                            <button class="btn bg-dark text-white col-12" type="submit">
                                                Update
                                            </button>
                                        </div>
                                      </div>
                                      <div class="row col-6 mt-4 offset-1">
                                        <div class="form-group">
                                            <label class="control-label mb-1">Name</label>
                                            <input id="cc-pament" name="name" type="text"  value="{{old('name',Auth::user()->name)}}" class="form-control @error('name') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter Admin name...">
                                            @error('name')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Email</label>
                                            <input id="cc-pament" name="email" type="email"  value="{{old('email',Auth::user()->email)}}" class="form-control @error('email') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter Admin email...">
                                            @error('email')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Phone</label>
                                            <input id="cc-pament" name="phone" type="number"  value="{{old('phone',Auth::user()->phone)}}" class="form-control @error('phone') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter Admin phone...">
                                            @error('phone')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Gender</label>
                                            <select name="gender" id="" class="form-control @error('gender') is-invalid @enderror">
                                                <option value="">
                                                    Choose your gender(You better be not a gay!!!)....
                                                </option>
                                                <option name="male" @if(Auth::user()->gender == 'male') selected @endif>Male</option>
                                                <option name="female" @if(Auth::user()->gender == 'female') selected @endif>Female</option>
                                            </select>
                                            @error('gender')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Address</label>
                                                <textarea name="address" class="form-control @error('address') is-invalid @enderror" id="" cols="30" rows="10" placeholder="Enter Admin Address...">{{old('address',Auth::user()->address)}}</textarea>
                                                @error('address')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Role</label>
                                                <input id="cc-pament" name="role" type="text"  value="{{old('role',Auth::user()->role)}}" class="form-control" aria-required="true" aria-invalid="false" disabled>

                                            </div>
                                    </div>


                                    </div>
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
