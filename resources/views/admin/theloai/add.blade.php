@extends('admin.layout.index')
@section('title','Them The Loai')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thể Loại
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @include('admin.errors.error')
                @include('admin.errors.success')
                <form action="{{ route('tl.postadd') }}" method="POST">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Thêm Thể Loại</label>
                        <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" />
                    </div>
                    <button type="submit" class="btn btn-default">Category Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
@stop
