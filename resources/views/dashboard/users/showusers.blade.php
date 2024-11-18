
@extends('dashboard.master')


@section('title')
{{trans('users_trans.users')}}
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
                <h1 class="m-0">{{trans('users_trans.users')}}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('users.index')}}">{{trans('users_trans.users')}}</a></li>
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
        <th>{{trans('users_trans.name')}}</th>
        <th>{{trans('users_trans.email')}}</th>
        <th>{{trans('users_trans.status')}}</th>
        <th>{{trans('users_trans.create_at')}}</th>
        <th>{{trans('users_trans.actions')}}</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user )
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$user->fname}}</td>
            <td>{{$user->email}}</td>
            <td><span class="badge badge-primary">user</span></td>
            <td>{{ $user->created_at->format('d/m/Y') }}</td>
            <td>
                <a href="{{route('users.show',$user->id)}}" class="btn btn-sm btn-outline-success">{{__('buttons_trans.userdetails')}}</a>
                <a href="{{route('users.edit',$user->id)}}" class="btn btn-sm btn-outline-primary">{{__('buttons_trans.edit')}}</a>
                {{-- @include('dashboard.includes.editStatus_user_model',['type'=>'user','data'=>$user,'routes'=>'users.update']) --}}
                @include('dashboard.includes.delete_modal',['type'=>'user','data'=>$user,'routes'=>'users.destroy'])

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
