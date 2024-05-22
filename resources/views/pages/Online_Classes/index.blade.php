@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{ trans('الحصص الاونلاين.title_page') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('الحصص الاونلاين') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">


    @if ($errors->any())
    <div class="error">{{ $errors->first('Name') }}</div>
    @endif



    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                    {{ trans('اضافة حصة') }}
                </button>
                <br><br>

                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('Grades_trans.Name') }}</th>
                                <th>{{ trans('Grades_trans.Notes') }}</th>
                                <th>{{ trans('Grades_trans.Processes') }}</th>
                                <th>الصف</th>
                                <th>المادة</th>
                                <th>التصنيف</th>
                                <th>اسم الحصة</th>
                                <th>التاريخ</th>

                            </tr>
                        </thead>
                        <tbody>

                    </table>
                </div>


            </div>
        </div>
    </div>





    <!-- row closed -->
    @endsection
    @section('js')
    @toastr_js
    @toastr_render
    @endsection