
@extends('dashboard.master')


@section('title')
{{trans('users_trans.deliveries')}}
@endsection

@section('css')

@endsection
@section('content')
    <!-- row -->
    <div class="row" style="margin-left: 240px;width: 1150px;margin-bottom: 50px">
        <div class="col-md-12 mb-50">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="card-body">
                        <div class="tab nav-border">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" id="home-02-tab" data-toggle="tab" href="#home-02"
                                       role="tab" aria-controls="home-02"
                                       aria-selected="true">{{trans('delivery.orders_done')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-02-tab" data-toggle="tab" href="#profile-02"
                                       role="tab" aria-controls="profile-02"
                                       aria-selected="false">{{trans('delivery.orders_notdone')}}</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="home-02" role="tabpanel"
                                     aria-labelledby="home-02-tab">
                                     <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                        <th>{{trans('order_trans.orderNumber')}}</th>
                                        <th>{{__('delivery.status')}}</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($orders as $orderdetail )
                                        @if ($orderdetail->delivery_order_status == 'done')
                                        <tr>
                                            <td>{{$orderdetail->order_number}}</td>
                                            <td>
                                                <span class="badge badge-success">{{$orderdetail->delivery_order_status}}</span>
                                            </td>


                                            </tr>
                                        @endif
                                        @endforeach

                                    </table>
                                </div>

                                <div class="tab-pane fade" id="profile-02" role="tabpanel"
                                     aria-labelledby="profile-02-tab">
                                     <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                        <th>{{trans('order_trans.orderNumber')}}</th>
                                        <th>{{__('delivery.status')}}</th>


                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($orders as $orderdetail )
                                        @if ($orderdetail->delivery_order_status == 'notdone')
                                        <tr>
                                            <td>{{$orderdetail->order_number}}</td>
                                            <td>
                                                <span class="badge badge-danger">{{$orderdetail->delivery_order_status}}</span>
                                            </td>

                                            </tr>
                                        @endif
                                        @endforeach

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- row closed -->
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
// <script>
//             $(function() {
//                 $("#example1").DataTable({
//                     "responsive": true,
//                     "lengthChange": false,
//                     "autoWidth": false,
//                     "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
//                 }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

//             });
//         </script>
@endsection
