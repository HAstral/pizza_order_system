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

                        <div class="col-lg-6 offset-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">Change the Password</h3>
                                    </div>
                                    @if (session('changeSuccess'))
                                        <div class="col-12">
                                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                                <i class="fa-solid fa-thumbs-up me-2"></i>{{session('changeSuccess')}}
                                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                     </div>
                                    @endif
                                    @if (session('notMatch'))
                                    <div class="col-12">
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <i class="fa-solid fa-bug me-2"></i>{{session('notMatch')}}
                                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                 </div>
                                @endif

                                    <hr>
                                    <form action="{{route('admin#changePassword')}}" method="post" novalidate="novalidate">
                                        @csrf
                                        <div class="form-group">
                                            <label class="control-label mb-1">Old Password</label>
                                            <input id="cc-pament" name="oldPassword" type="password"  class="form-control  @error('oldPassword') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter Old Password...">
                                            @error('oldPassword')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror

                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">New Password</label>
                                            <input id="cc-pament" name="newPassword" type="password"  class="form-control @error('newPassword') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter New Password...">
                                            @error('newPassword')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div> <div class="form-group">
                                            <label class="control-label mb-1">Confirm Password</label>
                                            <input id="cc-pament" name="confirmPassword" type="password"  class="form-control @error('confirmPassword') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter New Password Again...">
                                            @error('confirmPassword')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>

                                        <div>
                                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                <i class="fa-solid fa-key"></i> <span id="payment-button-amount">Change Password</span>
                                                {{-- <span id="payment-button-sending" style="display:none;">Sending…</span> --}}

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
