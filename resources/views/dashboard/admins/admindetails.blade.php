
@extends('dashboard.master')


@section('title')
{{trans('users_trans.admins')}}
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
                <h1 class="m-0">{{trans('users_trans.admins')}}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admins')}}">{{trans('users_trans.admins')}}</a></li>
                <li class="breadcrumb-item active">{{trans('main_header.dashboard')}}</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div>

{{-- ================================================== --}}
<div class="col-12" style="margin-top: 20px">
        <div class="card">
            <div class="card-title text-center"><h3>{{trans('users_trans.admindetails')}}</h3></div>
            <div class="card-body">
                <form >

                    <div class="row">
                        <div class="col">
                            <label for="firstname" class="form-label">{{trans('website_trans.first_name')}}</label>
                            <input type="text"  class="form-control" value="{{$user->fname}}" name="fname" readonly  id="firstname" placeholder="your first name">
                        </div>
                        <div class="col">
                            <label for="lastname" class="form-label">{{trans('website_trans.last_name')}}</label>
                            <input type="text" value="{{$user->lname}}" class="form-control" name="lname" readonly id="lastname" placeholder="your last name">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="email" class="form-label">{{trans('website_trans.email')}}</label>
                            <input type="email" value="{{$user->email}}" class="form-control" name="email" readonly id="email" placeholder="your email">
                        </div>
                        <div class="col">
                            <label for="phone" class="form-label">{{trans('website_trans.phone')}}</label>
                            <input type="phone" class="form-control" value="{{$user->phone}}" name="phone" readonly id="phone" placeholder="your phone">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="address1" class="form-label">{{trans('website_trans.address_1')}}</label>
                            <input type="text" class="form-control" value="{{$user->address1}}" name="address1" readonly id="address1" placeholder="address1">
                        </div>
                        <div class="col">
                            <label for="address2" class="form-label">{{trans('website_trans.address_2')}}</label>
                            <input type="text" class="form-control" value="{{$user->address2}}" name="address2" readonly id="address2" placeholder="address2">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="city" class="form-label">{{trans('website_trans.city')}}</label>
                            <input type="text" class="form-control" value="{{$user->city}}" name="city" readonly id="city" placeholder="city">
                        </div>
                        <div class="col">
                            <label for="country" class="form-label">{{trans('website_trans.country')}}</label>
                            <input type="text" class="form-control" value="{{$user->country}}" name="country" readonly id="country" placeholder="country">
                        </div>
                        <div class="col">
                            <label for="pincode" class="form-label">{{trans('website_trans.pincode')}}</label>
                            <input type="text" class="form-control" value="{{$user->pincode}}" name="pincode" readonly id="pincode" placeholder="pincode">
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
