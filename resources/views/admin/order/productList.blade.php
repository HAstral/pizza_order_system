@extends('admin.layouts.master')
@section('title','Pizza List Page')
@section('content')
          <!-- MAIN CONTENT-->
          <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="col-md-12">

                        <div class="table-responsive table-responsive-data2">
                                <a href="{{route('admin#orderList')}}" class=" text-danger"><i class="fa-solid fa-backward"></i>Back</a>

                                <div class="row col-8">
                                    <div class="card mt-4">
                                        <div class="card-header">
                                            <h3>Order Info</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col"><i class="fa-solid fa-user mx-2"></i>Customer Name</div>
                                                <div class="col">{{strtoupper($orderList[0]->user_name)}}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col"><i class="fa-solid fa-user mx-2"></i>Order Code</div>
                                                <div class="col">{{$orderList[0]->order_code}}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col"><i class="fa-solid fa-user mx-2"></i>Order Date</div>
                                                <div class="col">{{$orderList[0]->created_at->format('F-j-Y')}}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col"><i class="fa-solid fa-user mx-2"></i>Total</div>
                                                <div class="col">{{$order->total_price}}</div>
                                            </div>
                                        </div>
                                    </div>

                            </div>

                            <table class="table table-data2 text-center">
                                <thead>
                                    <tr>
                                        <th>Product Image</th>
                                        <th>Product Name</th>
                                        <th>OrderDate</th>
                                        <th>Quantity</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody id="dataList">
                                    @foreach ($orderList as $o )
                                    <tr class="tr-shadow">
                                        <td class="col-2"><img src="{{asset('storage/'.$o->product_image)}}" class="img-thumbnails"></td>
                                        <td>{{$o->product_name}}</td>
                                        <td>{{$o->created_at->format("F-j-Y")}}</td>
                                        <td>{{$o->qty}}</td>
                                        <td class="">{{$o->total}}</td>
                                    </tr>
                                    @endforeach
                            </tbody>
                            </table>
                        </div>
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
        $orderId=$parentNode.find('.orderId').val();
        $data={
            'status' : $currentStatus,
            'orderId' : $orderId
        };
        $.ajax({
            type : 'get',
            url : 'http://127.0.0.1:8000/order/ajax/change/status',
            data : $data,
            dataType : 'json',
        })
        location.reload();
    })
    });


</script>
@endsection
