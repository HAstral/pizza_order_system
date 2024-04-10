@extends('admin.layouts.master')
@section('title','Pizza List Page')
@section('content')
          <!-- MAIN CONTENT-->
          <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="col-md-12">
                        @if (session('deleteSuccess'))
                        <div class="col-4 offset-8">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fa-regular fa-circle-xmark mx-2"></i>{{session('deleteSuccess')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>
                        </div>
                        @endif
                      <div class="col-12 row my-2">
                      </div>
                      <form action="{{route('admin#changeStatus')}}" method="get">
                        @csrf
                        <div class="d-flex">
                            <label class=" mb-5 me-4"><i class="fa-solid fa-database fs-2 mr-2"></i>{{count($order)}}</label>
                            <select name="orderStatus" class='form-control col-2'>
                                <option value=" ">All</option>
                                <option value="0" @if(request('orderStatus')=="0") selected @endif>Pending</option>
                                <option value="1" @if(request('orderStatus')=="1") selected @endif>Success</option>
                                <option value="2" @if(request('orderStatus')=="2") selected @endif>Reject</option>
                            </select>
                            <div class="">
                                <button type="submit" class="btn mx-2 btn-md bg-dark text-white">Search Here</button>
                            </div>
                          </div>
                      </form>
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2 text-center">
                                <thead>
                                    <tr>
                                        <th>User Id</th>
                                        <th>Name</th>
                                        <th>OrderDate</th>
                                        <th>OrderCode</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody id="dataList">
                                    @foreach ($order as $o )
                                    <tr class="tr-shadow">
                                        <input type="hidden" class="orderId" value="{{$o->id}}">
                                        <td class="">{{$o->user_id}}</td>
                                        <td class="">{{$o->user_name}}</td>
                                        <td class="">{{$o->created_at->format('F-j-Y')}}</td>
                                        <td  class="text-primary" class="text-primary"><a href="{{route("admin#listInfo",$o->order_code)}}">{{$o->order_code}}</a></td>
                                        <td >{{$o->total_price}} Kyats</td>
                                        <td>
                                            <select name="status" class='form-control statusChange'>
                                                <option value="0"  @if($o->status==0) selected @endif>Pending</option>
                                                <option value="1"  @if($o->status==1) selected @endif>Success</option>
                                                <option value="2"  @if($o->status==2) selected @endif>Reject</option>
                                            </select>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                </table>
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




        //     $('#orderStatus').change(function(){
        //        $status= $('#orderStatus').val();
        //        $.ajax({
        //         type : 'get',
        //         url : 'http://127.0.0.1:8000/order/ajax/status',
        //         data : {
        //             'status' : $status,
        //         },
        //         dataType : 'json',
        //         success : function(response){
        //                                 $list='';
        //                                 for($i=0;$i<response.length;$i++){
        //                                     $month=['January','February','March','April','May','June','July','August','September','October','November','December'];
        //                                     $dbDate=new Date(response[$i].created_at);
        //                                     $finalDate=$month[$dbDate.getMonth()]+"-"+$dbDate.getDate()+"-"+$dbDate.getFullYear();
        //                                     if(response[$i].status==0){
        //                                         $statusMessage=`
        //                                         <select name="status" class="form-control statusChange">
        //                                        <option value="0" selected>Pending</option>
        //                                         <option value="1" >Success</option>
        //                                         <option value="2" >Reject</option>
        //                                     </select>`;
        //                                     }else if(response[$i].status==1){
        //                                         $statusMessage=`
        //                                         <select name="status" class='form-control statusChange'>
        //                                         <option value="0" >Pending</option>
        //                                         <option value="1" selected>Success</option>
        //                                         <option value="2" >Reject</option>
        //                                     </select>`;
        //                                     }else if(response[$i].status==2){
        //                                         $statusMessage=`
        //                                         <select name="status" class='form-control statusChange'>
        //                                         <option value="0" >Pending</option>
        //                                         <option value="1" >Success</option>
        //                                         <option value="2" selected>Reject</option>
//                                     </select>`;
    //                                     }
    //                                 $list+=` <tr class="tr-shadow">
    //                                     <input type="hidden" class="orderId" value="${response[$i].id}">
    //                                     <td >${response[$i].user_id}</td>
    //                                     <td>${response[$i].user_name} || ${response[$i].id} </td>
    //                                     <td>${$finalDate}</td>
    //                                     <td>${response[$i].order_code}</td>
    //                                     <td>${response[$i].total_price} Kyats</td>
    //                                     <td>${$statusMessage}</td>
    //                             </tr>`;
    //                                 }
    //                 $('#dataList').html($list);
    //     }
    // });
    //})



    $('.statusChange').change(function(){
        $currentStatus=$(this).val();
        $parentNode=$(this).parents('tr');
        $orderId=$parentNode.find('.orderId').val();
        $data={
            'status' : $currentStatus,
            'orderId' : $orderId
        };
        $.ajax({
            type : 'get',
            url : '/order/ajax/change/status',
            data : $data,
            dataType : 'json',
        })
        location.reload();
    })
    });


</script>
@endsection
