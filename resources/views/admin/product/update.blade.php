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
                                    <div class="ms-5">
                                        {{-- <a href="{{route('product#list')}}"> --}}
                                            <i class="fa-regular fa-hand-point-left text-dark" onclick="history.back()"></i>
                                        {{-- </a> --}}
                                    </div>
                                    <div class="card-title">
                                        <h3 class="text-center title-2">Pizza Update</h3>
                                    </div>


                                    <hr>
                                   <form action="{{route('product#update')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                      <div class="col-4">
                                        <input type="hidden" name="pizzaId" value="{{$pizza->id}}">
                                        <img src="{{asset('storage/'.$pizza->image)}}" alt="John Doe" />
                                        <div class="mt-2 ms-5">
                                            <input type="file" name="pizzaImage" id="" class="form-control @error('pizzaImage') is-invalid @enderror">
                                            @error('pizzaImage')
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
                                            <input id="cc-pament" name="pizzaName" type="text"  value="{{old('pizzaName',$pizza->name)}}" class="form-control @error('pizzaName') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter Admin name...">
                                            @error('pizzaName')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Description</label>
                                            <textarea name="pizzaDesc" class="form-control @error('pizzaDesc') is-invalid @enderror" id="" cols="30" rows="10" placeholder="Enter Admin Address...">{{old('pizzaDesc',$pizza->description)}}</textarea>
                                            @error('pizzaDesc')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label mb-1">Category</label>
                                            <select name="pizzaCategory" id="" class="form-control @error('pizzaCategory') is-invalid @enderror">
                                                <option value="">
                                                    Choose your category(You better be gay!!!)....
                                                </option>
                                                @foreach ($category as $c)
                                                <option value="{{$c->id}}" @if ($pizza->category_id == $c->id)
                                                    selected
                                                @endif>{{$c->name}}</option>
                                                @endforeach

                                            </select>
                                            @error('pizzaCategory')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Price</label>
                                            <input id="cc-pament" name="pizzaPrice" type="number"  value="{{old('pizzaPrice',$pizza->price)}}" class="form-control @error('pizzaPrice') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter Admin name...">
                                            @error('pizzaPrice')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Waiting Time</label>
                                            <input id="cc-pament" name="pizzaWaitingTime" type="text"  value="{{old('pizzaWaitingTime',$pizza->waiting_time)}}" class="form-control @error('pizzaWaitingTime') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter Admin waiting time...">
                                            @error('pizzaWaitingTime')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">View Count</label>
                                            <input id="cc-pament" name="viewCount" type="number"  value="{{old('viewCount',$pizza->view_count)}}" class="form-control" disabled aria-required="true" aria-invalid="false" placeholder="Enter Admin viewCount...">

                                        </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Created Date</label>
                                                <input id="cc-pament" name="created_at" type="text"  value="{{$pizza->created_at->format('j-F-Y')}}" class="form-control" aria-required="true" aria-invalid="false" disabled>

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
