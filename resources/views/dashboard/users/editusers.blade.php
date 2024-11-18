
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
<form class="row" method="post" action="{{ route('users.update',$user->id) }}" >
    @csrf
    @method('PUT')
    <div class="col-sm-6">
<div class="form-group">
<label for="fname" class="col-md-4 col-form-label text-md-end">{{ __('users_trans.FirstName') }}</label>
<input id="fname" value="{{ $user->fname }}" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" required autocomplete="fname" autofocus>

@error('fname')
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror
</div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="lname" class="col-md-4 col-form-label text-md-end">{{ __('users_trans.LastName') }}</label>
            <input id="lname" value="{{ $user->lname }}" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" required autocomplete="lname" autofocus>

            @error('lname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="email"  class="col-md-4 col-form-label text-md-end">{{ __('users_trans.Email Address') }}</label>


                <input id="email"  type="email" value="{{ $user->email }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('users_trans.phone number') }}</label>


            <input id="phone" type="number" value="{{ $user->phone }}" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="address1" class="col-md-4 col-form-label text-md-end">{{ __('users_trans.Address') }}</label>


            <input id="address1" type="text" value="{{ $user->address1 }}" class="form-control @error('address1') is-invalid @enderror" name="address1" value="{{ old('address1') }}" required autocomplete="address1">

            @error('address1')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="country" class="col-md-4 col-form-label text-md-end">{{ __('users_trans.country') }}</label>


            <input id="country" type="text" value="{{ $user->country }}" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required autocomplete="country">

            @error('country')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('users_trans.Password') }}</label>


                <input id="password" type="password"  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
    </div>

    <div class="button" style="margin-top: 40px" >
        <button type="submit" class="btn btn-primary">
            {{ trans('buttons_trans.edit') }}
        </button>
    </div>

</form>
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
