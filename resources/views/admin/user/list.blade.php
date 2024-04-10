@extends('admin.layouts.master')
@section('title','Pizza List Page')
@section('content')
          <!-- MAIN CONTENT-->
          <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="table-responsive table-responsive-data2">
                            <h3>Total - {{$users->total()}}</h3>
                            <table class="table table-data2 text-center">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>E-mail</th>
                                        <th>Gender</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th class="col-3">Role</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="dataList">
                                    @foreach ( $users as $u )
                                    <tr>
                                        <td>
                                            @if ($u->image==null)
                                                            @if ($u->gender == 'female')
                                                                <img src="{{asset('image/girl_default_user.jpg')}}" class="img-thumbnail">
                                                            @else
                                                                <img src="{{asset('image/default_user.png')}}" class="img-thumbnail shadow-sm">
                                                            @endif
                                                            @else
                                                        <img src="{{asset('storage/'.$u->image)}}" alt="John Doe" />
                                                        @endif
                                        </td>
                                        <input type="hidden" id='userId' value="{{$u->id}}">
                                        <td>{{$u->name}}</td>
                                        <td>{{$u->email}}</td>
                                        <td>{{$u->gender}}</td>
                                        <td>{{$u->phone}}</td>
                                        <td>{{$u->address}}</td>
                                        <td class='col-3'>
                                            <select class="form-control statusChange">
                                                <option value="user" @if($u->role=="user") selected @endif >User</option>
                                                <option value="admin" @if($u->role=="admin")  @endif >Admin</option>
                                            </select>
                                        </td>
                                        <td>
                                            <div class="">
                                            <a href="{{route('admin#userDetail',$u->id)}}">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="View">
                                                    <i class="fa-solid fa-eye"></i>
                                                </button>
                                            </a>
                                            <a href="{{route('admin#userDelete',$u->id)}}">
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
                            <div class="mt-5">
                                {{$users->links()}}
                            </div>
                        </div>

<!-- END DATA TABLE -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT-->
@endsection

@section('scriptSource')
<script>
     $(document).ready(function(){
        $('.statusChange').change(function(){
        $currentStatus=$(this).val();
        $parentNode=$(this).parents('tr');
        $orderId=$parentNode.find('#userId').val();
        $data={
            'userId' : $orderId,
            'role' : $currentStatus,
        };
        $.ajax({
            type : 'get',
            url : '/user/change/role',
            data : $data,
            dataType : 'json',
        })
        location.reload();
    })
    });


</script>
@endsection
