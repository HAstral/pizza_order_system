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
 @section('title','Pizza List Page')
@section('content')
          <!-- MAIN CONTENT-->
          <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="col-md-12">
                        <!-- DATA TABLE -->
                        <div class="table-data__tool">
                            <div class="table-data__tool-left">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Product List</h2>

                                </div>
                            </div>
                            <div class="table-data__tool-right">
                                <a href="{{route('product#createPage')}}">
                                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                        <i class="fa-solid fa-plus"></i>add Products
                                    </button>
                                </a>
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    CSV download
                                </button>
                            </div>
                        </div>
                        {{-- @if (session('createSuccess'))
                        <div class="col-4 offset-8">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fa-solid fa-check"></i><strong>Holy Moly!</strong> {{session('createSuccess')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>
                        </div>
                        @endif --}}
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

                                <form action="{{route('product#list')}}" method="GET">
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
                            <h3 class=""><i class="fa-solid fa-list mr-2"></i>{{$pizzas->total()}} </h3>
                        </div>
                      </div>
                        @if (count($pizzas)!=0)
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2 text-center">
                                <thead>
                                    <tr>

                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Category</th>
                                        <th>View Count</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($pizzas as $p)
                                    <tr class="tr-shadow">

                                        <td class="col-2"><img src="{{asset('storage/'.  $p->image )}}" class="img-thumbnail shadow-sm"></td>
                                        <td class="col-3">{{$p->name}}</td>
                                        <td class="col-2">{{$p->price}}</td>
                                        <td class="col-2">{{$p->category_name}}</td>
                                        <td class="col-2"><i class="fa-brands fa-servicestack"></i>{{$p->view_count}}</td>
                                       <td class="col-2">
                                        <div class="table-data-feature">
                                            <a href="{{route('product#edit',$p->id)}}">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="View">
                                                    <i class="fa-solid fa-eye"></i>
                                                </button>
                                            </a>

                                            <a href="{{route('product#updatePage',$p->id)}}">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button>
                                            </a>
                                          <a href="{{route('product#delete',$p->id)}}">
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                          </a>
                                        </div>
                                        </td>
                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                            <div class="mt-3">
                                {{$pizzas->links()}}
                                {{-- {{$categories->appends(request()->query())->links()}} --}}
                            </div>
                        </div>
                        @else
                        <h3 class="text-center text-info mt-5">There is no Products for U.</h3>
                        @endif
                        <!-- END DATA TABLE -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT-->
@endsection
