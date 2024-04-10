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
        <h3>Role- {{$account->role}}</h3>
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


                        <!-- DATA TABLE -->

                      <div class="container-fluid">

                        <div class="col-lg-10 offset-1">
                            <div class="card">
                                <div class="card-body">
                                    <div class="ms-5">
                                        <a href="{{route('admin#list')}}">
                                            <i class="fa-regular fa-hand-point-left text-dark"></i>
                                        </a>
                                    </div>
                                    <div class="card-title">
                                        <h3 class="text-center title-2">Change Role</h3>
                                    </div>


                                    <hr>
                                   <form action="{{route('admin#change',$account->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                      <div class="col-4">
                                        @if ($account->image==null)
                                        @if ($account->gender == 'female')
                                                <img src="{{asset('image/girl_default_user.jpg')}}" class="img-thumbnail shadow-sm">
                                            @else
                                                <img src="{{asset('image/default_user.png')}}" class="img-thumbnail shadow-sm">
                                            @endif
                                             @else
                                        <img src="{{asset('storage/'.$account->image)}}" alt="John Doe" />
                                        @endif
                                        {{-- <div class="mt-2 ms-5">
                                            <input type="file" name="image" id="" class="form-control @error('image') is-invalid @enderror">
                                            @error('image')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div> --}}
                                        <div class="mt-2 ms-5">
                                            <button class="btn bg-dark text-white col-12" type="submit">
                                                Change
                                            </button>
                                        </div>
                                      </div>
                                      <div class="row col-6 mt-4 offset-1">
                                        <div class="form-group">
                                            <label class="control-label mb-1">Name</label>
                                            <input id="cc-pament" disabled  name="name" type="text"  value="{{old('name',$account->name)}}" class="form-control @error('name') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter Admin name...">
                                            @error('name')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Role</label>
                                            <select name="role" class="form-control">
                                                <option value="admin" @if ($account->role=='admin')
                                                    selected
                                                @endif>Admin</option>
                                                <option value="user" @if ($account->role=='user')
                                                    selected
                                                @endif>User</option>
                                            </select>
                                            {{-- <input id="cc-pament" name="role" type="text"  value="{{old('role',$account->role)}}" class="form-control" aria-required="true" aria-invalid="false"> --}}

                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Email</label>
                                            <input id="cc-pament" disabled  name="email" type="email"  value="{{old('email',$account->email)}}" class="form-control @error('email') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter Admin email...">
                                            @error('email')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Phone</label>
                                            <input id="cc-pament"  disabled name="phone" type="number"  value="{{old('phone',$account->phone)}}" class="form-control @error('phone') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter Admin phone...">
                                            @error('phone')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Gender</label>
                                            <select name="gender" disabled  id="" class="form-control @error('gender') is-invalid @enderror">
                                                <option value="">
                                                    Choose your gender(You better be not a gay!!!)....
                                                </option>
                                                <option name="male" @if($account->gender == 'male') selected @endif>Male</option>
                                                <option name="female" @if($account->gender == 'female') selected @endif>Female</option>
                                            </select>
                                            @error('gender')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Address</label>
                                                <textarea name="address" disabled  class="form-control @error('address') is-invalid @enderror" id="" cols="30" rows="10" placeholder="Enter Admin Address...">{{old('address',$account->address)}}</textarea>
                                                @error('address')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>

                                    </div>


                                    </div>
                                    </div>


                                   </form>

                                </div>
                            </div>
                        </div>

                        <!-- END DATA TABLE -->
                    </div>

            </div>
        </div>
        <!-- END MAIN CONTENT-->
@endsection
