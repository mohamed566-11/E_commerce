
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
        <th>{{trans('order_trans.user')}}</th>
        <th>{{trans('order_trans.number')}}</th>
        <th>{{trans('order_trans.totalPrice')}}</th>
        <th>{{trans('order_trans.status')}}</th>
        <th>{{trans('order_trans.payment_status')}}</th>
        <th>{{trans('order_trans.actions')}}</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($orders as $order )
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$order->user->fname}}</td>
            <td>{{$order->number}}</td>
            <td>{{$order->total}}</td>
            <td>@if($order->status == 'delivered')
                <span class="badge badge-info">{{trans('order_trans.delivered')}}</span>
            @elseif ($order->status == 'cancelled')
                <span class="badge badge-danger">{{trans('order_trans.cancelled')}}</span>
            @elseif ($order->status == 'completed')
                <span class="badge badge-success">{{trans('order_trans.completed')}}</span>
            @else
            <span class="badge badge-warning">{{trans('order_trans.pending')}}</span>

            @endif</td>
            <td>@if($order->payment_status == 'paid')
                <span class="badge badge-success">{{trans('order_trans.paid')}}</span>
            @elseif ($order->payment_status == 'failed')
                <span class="badge badge-danger">{{trans('order_trans.failed')}}</span>
            @else
            <span class="badge badge-warning">{{trans('order_trans.pending')}}</span>

            @endif</td>

            <td>
                <a href="{{route('orderdetails',$order->id)}}" class="btn btn-sm btn-outline-success">{{trans('order_trans.order_details')}}</a>
                {{-- <a href="{{route('editstatus',$order->id)}}" class="btn btn-sm btn-outline-primary">edit_atatus</a> --}}
                @if ($order->status == 'pending')
                @include('dashboard.includes.add_orderToDelivery_model',['type'=>'addToDelivery','data'=>$order,'routes'=>'order.addToDelivery'])
                @endif
                @include('dashboard.includes.editStatus_model',['type'=>'order','data'=>$order,'routes'=>'order.edit'])
                @include('dashboard.includes.delete_modal',['type'=>'order','data'=>$order,'routes'=>'order.destroy'])

            </td>
            </tr>
        @endforeach

    </table>
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
