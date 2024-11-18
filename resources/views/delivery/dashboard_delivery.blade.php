
@extends('dashboard.master')


@section('title')
DeliveryDashboard
@endsection

@section('css')
<style>
    .input-group {
    width: 50%;
    margin: 0 auto;
}

.btn-primary {
    background-color: #007bff;
    border: none;
}

.card {
    max-width: 600px;
    margin: 0 auto;
}

</style>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{trans('delivery.DeliveryDashboard')}}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">{{trans('delivery.Home')}}</a></li>
                <li class="breadcrumb-item active">{{trans('delivery.DeliveryDashboard')}}</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="container">
                <form action="{{ route('delivery.search') }}" method="GET" class="mb-4">
                    <div class="input-group">
                        <input type="text" name="order_number" class="form-control" placeholder="Enter Order Number" required>
                        <button type="submit" class="btn btn-primary">{{__('delivery.Search')}}</button>
                    </div>
                </form>

                @if(isset($order))
                    <!-- Display the order details if found -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                            <th>{{trans('order_trans.user')}}</th>
                            <th>{{trans('order_trans.number')}}</th>
                            <th>{{trans('order_trans.totalPrice')}}</th>
                            <th>{{trans('order_trans.actions')}}</th>

                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <td>{{$order->user->fname}}</td>
                                <td>{{$order->number}}</td>
                                <td>{{$order->total}}</td>

                                <td>
                                    <a href="{{route('delivery.orderdetails',$order->id)}}" class="btn btn-sm btn-outline-success">{{trans('order_trans.order_details')}}</a>
                                    <a href="{{route('order.editdelivery',$order->id)}}" class="btn btn-sm btn-outline-primary">{{trans('delivery.complete')}}</a>

                                </td>
                                </tr>


                        </table>
                        </div>

                @elseif(isset($notFound))
                    <!-- If the order is not found, show a message -->
                    <div class="alert alert-danger">Order not found</div>
                @endif
            </div>

        </div>


@endsection

@section('script')

@endsection
