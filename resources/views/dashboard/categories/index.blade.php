
        @extends('dashboard.master')


        @section('title')
        {{__('main_header.categories')}}
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
                        <h1 class="m-0">{{trans('main_header.categories')}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('categories.index')}}">{{trans('main_header.categories')}}</a></li>
                        <li class="breadcrumb-item active">{{trans('main_header.dashboard')}}</li>
                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                </div>

        {{-- ================================================== --}}
        <div class="card">
            <div class="card-header">
            <h3 class="card-title"><a href="{{route('categories.create')}}" class="btn btn-outline-primary">{{trans('buttons_trans.create')}}</a></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                <th>#</th>
                <th>{{trans('category_trans.name')}}</th>
                <th>{{trans('category_trans.image')}}</th>
                <th>{{trans('category_trans.is_showing')}}</th>
                <th>{{trans('category_trans.is_popular')}}</th>
                <th>{{trans('buttons_trans.Actions')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($categories as $category )
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$category->name}}</td>
                    <td><img src="{{asset($route.'/'.$category->image)}}" alt="" class="img-thumbnail" style="max-width:100px;"></td>
                    <td>@if($category->is_showing == 1)
                        <span class="badge badge-success">{{trans('category_trans.showing')}}</span>
                    @else
                        <span class="badge badge-danger">{{trans('category_trans.hidden')}}</span>
                    @endif</td>
                    <td> @if($category->is_popular == 1)
                        <span class="badge badge-success">{{trans('category_trans.popular')}}</span>
                    @else
                        <span class="badge badge-danger">{{trans('category_trans.no_popular')}}</span>
                    @endif</td>
                    <td>
                        <a href="{{route('categories.show',$category->id)}}" class="btn btn-sm btn-outline-success">{{trans('buttons_trans.show')}}</a>
                        <a href="{{route('categories.edit',$category->id)}}" class="btn btn-sm btn-outline-warning">{{trans('buttons_trans.edit')}}</a>
                        @include('dashboard.includes.delete_modal',['type'=>'category','data'=>$category,'routes'=>'categories.destroy'])
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
