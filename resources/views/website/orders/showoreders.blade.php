
@extends('layouts.master')

@section('title')
{{__('website_trans.MyOrders')}}
@endsection

@section('css')

@endsection
@section('content')

    <!-- Content Wrapper. Contains page content -->
       <!-- Start Breadcrumbs -->
       <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">{{__('website_trans.MyOrders')}}
                        </h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i>{{__('website_trans.Home')}}
                            </a></li>
                        <li>{{__('website_trans.MyOrders')}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->


{{-- ================================================== --}}
<div class="card p-5">
    <div class="card-header">
    {{-- <h3 class="card-title"><a href="{{route('products.create')}}" class="btn btn-outline-primary">{{trans('buttons_trans.create')}}</a></h3> --}}
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <table id="example1" class="table table-bordered table-hover">
        <thead>
            <tr>
        <th>#</th>
        <th>{{trans('website_trans.Name')}}</th>
        <th>{{trans('order_trans.number')}}</th>
        <th>{{trans('order_trans.totalPrice')}}</th>
        <th>{{trans('order_trans.status')}}</th>
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
            <td>@if($order->status == 'completed')
                <span class="badge bg-success">{{trans('order_trans.completed')}}</span>
            @elseif ($order->status == 'cancelled')
                <span class="badge bg-danger">{{trans('order_trans.cancelled')}}</span>
            @elseif ($order->status == 'delivered')
                <span class="badge bg-info">{{trans('order_trans.delivered')}}</span>
            @else
            <span class="badge bg-warning">{{trans('order_trans.pending')}}</span>

            @endif</td>


            <td>
                <a href="{{route('frontorderdetails',$order->id)}}" class="btn btn-sm btn-outline-success">{{trans('order_trans.order_details')}}</a>
                @if ($order->status == 'pending')

                <a href="{{route('CancelOrder',$order->id)}}" class="btn btn-sm btn-outline-danger">{{__('website_trans.CancelOrder')}}</a>
                @endif
                {{-- @include('dashboard.includes.editStatus_model',['type'=>'order','data'=>$order,'routes'=>'order.edit']) --}}
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
