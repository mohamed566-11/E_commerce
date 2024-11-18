
@extends('dashboard.master')


@section('title')
dashboard
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
                <h1 class="m-0">{{trans('main_sidbar_translate.dashboard')}}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">{{__('main_sidbar_translate.Home')}}</a></li>
                <li class="breadcrumb-item active">{{trans('main_sidbar_translate.dashboard')}}</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div>


{{App::getlocale()}}





@php
// echo 'Current PHP version: ' . phpversion();
@endphp

@endsection

@section('script')

@endsection
