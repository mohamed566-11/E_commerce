
@extends('dashboard.master')


@section('title')
{{trans('order_trans.order_details')}}

@endsection

@section('css')

@endsection
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{trans('order_trans.orders')}}
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">{{trans('order_trans.order_details')}}
                </a></li>
                <li class="breadcrumb-item active">{{trans('main_header.dashboard')}}</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div>

{{-- ================================================== --}}
<div class="card">
    <div class="card-header">
    {{-- <h3 class="card-title"><a href="{{route('products.create')}}" class="btn btn-outline-primary">{{trans('buttons_trans.create')}}</a></h3> --}}
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <table id="example1" class="table table-bordered table-hover">
        <thead>
            <tr>
        <th>#</th>
        <th>{{trans('order_trans.productName')}}</th>
        <th>{{trans('order_trans.orderNumber')}}</th>
        <th>{{trans('order_trans.price')}}</th>
        <th>{{trans('order_trans.quantity')}}</th>
        <th>{{trans('order_trans.status')}}</th>
        <th>{{trans('order_trans.payment_status')}}</th>


        </tr>
        </thead>
        <tbody>
        @foreach ($orderdetails as $orderdetail )
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$orderdetail->product->name}}</td>
            <td>{{$orderdetail->order->number}}</td>
            <td>{{$orderdetail->price}}</td>
            <td>{{$orderdetail->quantity}}</td>
            <td>@if($orderdetail->order->status == 'delivered')
                <span class="badge badge-info">{{trans('order_trans.delivered')}}</span>
            @elseif ($orderdetail->order->status == 'cancelled')
                <span class="badge badge-danger">{{trans('order_trans.cancelled')}}</span>
            @elseif ($orderdetail->order->status == 'completed')
                <span class="badge badge-success">{{trans('order_trans.completed')}}</span>
            @else
            <span class="badge badge-warning">{{trans('order_trans.pending')}}</span>

            @endif</td>
            <td>@if($orderdetail->order->payment_status == 'paid')
                <span class="badge badge-success">{{trans('order_trans.paid')}}</span>
            @elseif ($orderdetail->order->payment_status == 'failed')
                <span class="badge badge-danger">{{trans('order_trans.failed')}}</span>
            @else
            <span class="badge badge-warning">{{trans('order_trans.pending')}}</span>

            @endif</td>

            </tr>
        @endforeach

    </table>
    <div style="font-size: 35px;margin-top:10px">
    <span>{{trans('order_trans.totalPrice')}} : </span>
    <span class="badge badge-success">{{ $orderdetails->first()->order->total ?? 0 }}</span>
    </div>
    <div class="container p-3" style="margin-top: 50px;margin-bottom: 50px">
        <h4>{{trans('order_trans.Order Tracking')}}</h4>
        <br>

        <table id="example1" class="table table-bordered table-hover">
            <thead>
                <tr></tr>
                    <th>#</th>
                    <th>{{trans('order_trans.status')}}</th>
                    <th>{{trans('order_trans.message')}}</th>
                    <th>{{trans('order_trans.date')}}</th>
                    <th>{{trans('order_trans.time')}}</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($orderadresess->order->tracks as $track )
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$track->status}}</td>

                <td> {{$track->message}} </td>

                <td>{{$track->created_at->format('Y-m-d')}}</td>
                <td>{{$track->created_at->format('h:i')}}</td>
                </tr>
            @endforeach

        </table>
    </div>
    <div class="col-12" style="margin-top: 20px">
        <div class="card">
            <div class="card-title text-center"><h3>{{trans('website_trans.customer_details')}}</h3></div>
            <div class="card-body">
                <form >

                    <div class="row">
                        <div class="col">
                            <label for="firstname" class="form-label">{{trans('website_trans.first_name')}}</label>
                            <input type="text"  class="form-control" value="{{$orderadresess->fname}}" name="fname" readonly  id="firstname" placeholder="your first name">
                        </div>
                        <div class="col">
                            <label for="lastname" class="form-label">{{trans('website_trans.last_name')}}</label>
                            <input type="text" value="{{$orderadresess->lname}}" class="form-control" name="lname" readonly id="lastname" placeholder="your last name">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="email" class="form-label">{{trans('website_trans.email')}}</label>
                            <input type="email" value="{{$orderadresess->email}}" class="form-control" name="email" readonly id="email" placeholder="your email">
                        </div>
                        <div class="col">
                            <label for="phone" class="form-label">{{trans('website_trans.phone')}}</label>
                            <input type="phone" class="form-control" value="{{$orderadresess->phone}}" name="phone" readonly id="phone" placeholder="your phone">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="address1" class="form-label">{{trans('website_trans.address_1')}}</label>
                            <input type="text" class="form-control" value="{{$orderadresess->address1}}" name="address1" readonly id="address1" placeholder="address1">
                        </div>
                        <div class="col">
                            <label for="address2" class="form-label">{{trans('website_trans.address_2')}}</label>
                            <input type="text" class="form-control" value="{{$orderadresess->address2}}" name="address2" readonly id="address2" placeholder="address2">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="city" class="form-label">{{trans('website_trans.city')}}</label>
                            <input type="text" class="form-control" value="{{$orderadresess->city}}" name="city" readonly id="city" placeholder="city">
                        </div>
                        <div class="col">
                            <label for="country" class="form-label">{{trans('website_trans.country')}}</label>
                            <input type="text" class="form-control" value="{{$orderadresess->country}}" name="country" readonly id="country" placeholder="country">
                        </div>
                        <div class="col">
                            <label for="pincode" class="form-label">{{trans('website_trans.pincode')}}</label>
                            <input type="text" class="form-control" value="{{$orderadresess->pincode}}" name="pincode" readonly id="pincode" placeholder="pincode">
                        </div>
                        {{-- <input type="hidden" name="total_price" value="{{$total_price}}"> --}}
                    </div>
                    {{-- <div class="col-8" style="margin-top: 20px; margin-left:250px">
                        <button type="submit" class="btn btn-success">Place Order</button>
                    </div> --}}
                </form>
            </div>
        </div>
    </div>
    </div>
    <!-- /.card-body -->
</div>
@endsection

@section('script')
<!-- DataTables  & Plugins -->
<script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/assets/plugins/jszip/jszip.min.js"></script>
<script src="/assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
    <script src="{{asset('assets/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script>
            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            });
        </script>
@endsection
