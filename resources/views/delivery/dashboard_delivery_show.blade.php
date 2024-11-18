
@extends('dashboard.master')


@section('title')
{{trans('order_trans.orders')}}
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
                <li class="breadcrumb-item"><a href="{{route('orders.index')}}">{{trans('order_trans.orders')}}
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

            </tr>
        @endforeach

    </table>
    <div style="font-size: 35px;margin-top:10px">
    <span>{{trans('order_trans.totalPrice')}} : </span>
    <span class="badge badge-success">{{ $orderdetails->first()->order->total ?? 0 }}</span>
    </div>
    <div class="container p-3" style="margin-top: 50px;margin-bottom: 50px">
        <h4>{{__('order_trans.Order Tracking')}}</h4>
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
