
        @extends('dashboard.master')


        @section('title')
        {{__('main_header.products')}}
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
                        <h1 class="m-0">{{trans('main_header.products')}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('products.index')}}">{{trans('main_header.products')}}</a></li>
                        <li class="breadcrumb-item active">{{trans('main_header.dashboard')}}</li>
                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                </div>

        {{-- ================================================== --}}
        <div class="card">
            <div class="card-header">
            <h3 class="card-title"><a href="{{route('products.create')}}" class="btn btn-outline-primary">{{trans('buttons_trans.create')}}</a></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                <th>#</th>
                <th>{{trans('product_trans.name')}}</th>
                <th>{{trans('product_trans.category')}}</th>
                <th>{{trans('product_trans.image')}}</th>
                <th>{{trans('product_trans.status')}}</th>
                <th>{{trans('product_trans.trend')}}</th>
                <th>{{trans('buttons_trans.Actions')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $product )
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->category->name}}</td>
                    <td><img src="{{asset($route.'/'.$product->image)}}" alt="" class="img-thumbnail" style="max-width:100px;"></td>
                    <td>@if($product->status == 1)
                        <span class="badge badge-success">{{trans('product_trans.showing')}}</span>
                    @else
                        <span class="badge badge-danger">{{trans('product_trans.hidden')}}</span>
                    @endif</td>
                    <td> @if($product->trend == 1)
                        <span class="badge badge-success">{{trans('product_trans.trending')}}</span>
                    @else
                        <span class="badge badge-danger">{{trans('product_trans.not_trending')}}</span>
                    @endif</td>
                    <td>
                        <a href="{{route('reviews_product.show',$product->id)}}" class="btn btn-sm btn-outline-primary">reviews</a>

                        <a href="{{route('products.show',$product->id)}}" class="btn btn-sm btn-outline-success">{{trans('buttons_trans.show')}}</a>
                        <a href="{{route('products.edit',$product->id)}}" class="btn btn-sm btn-outline-warning">{{trans('buttons_trans.edit')}}</a>
                        @include('dashboard.includes.delete_modal',['type'=>'product','data'=>$product,'routes'=>'products.destroy'])
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
        </script>
        @endsection
