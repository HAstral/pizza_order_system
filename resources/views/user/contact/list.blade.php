@extends('admin.layouts.master')

@section('title','Contact Message')

@section('content')

    <!-- MAIN CONTENT-->
    <div class="main-content">
        {{-- Header --}}
        @section('header')
        <form class="form-header" action="{{route('admin#contactPage')}}" method="get">
            <input class="au-input au-input--xl" type="text" name="searchKey" value="{{request('searchKey')}}" placeholder="Search for customer name..." />
            <button class="au-btn--submit" type="submit" >
                <i class="zmdi zmdi-search"></i>
            </button>
        </form>
        @endsection
        {{-- End Header --}}
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="overview-wrap">
                                <h2 class="title-1">Contact Messages</h2>
                            </div>

                        </div>
                    </div>
                    @if (count($message) != null)
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-hover table-striped mb-0 text-center">
                            <thead class="text-white " style="background-color: #262626;">
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($message as $m)
                            <tr>
                                <td class="align-middle">{{$m->id}}</td>
                                <td class="align-middle">{{$m->name}}</td>
                                <td class="align-middle">{{$m->email}}</td>
                                <td class="align-middle">{{Str::words($m->message,5,"....")}}</td>
                                <td class="align-middle">
                                    <div class="table-data-feature">
                                        <a href="{{route('admin#contactView',$m->id)}}" class="btn btn-white me-2 shadow_2">
                                            <i class="zmdi zmdi-eye text-primary" style="color: #262626"></i>
                                        </a>
                                        <input type="hidden" class="message-id" value="{{$m->id}}">
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <h3 class="text-secondary text-center">There's no messages!</h3>
                    @endif
                    <!-- END DATA TABLE -->
                    <div class="mt-2">
                    {{$message->appends(request()->query())->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->

@endsection


@section('scriptSource')

@endsection
