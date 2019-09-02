@extends('admin.layout.index')
@section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Khóa
                            <small>Sửa</small>
                        </h1>
                    </div>
                    <div class="col-lg-7" style="padding-bottom:120px">
                         @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br/>
                                @endforeach
                            </div>
                        @endif

                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                        <form action="admin/khoa/sua/up" method="POST">
                            <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>" />
                            <div class="form-group">
                                <label>Mã Khóa</label>
                                <input class="form-control" name="txtMa" placeholder="Mã Khóa" value="{{$ds->maKhoa}}" readonly="" />
                            </div>
                            <div class="form-group">
                                <label>Tên Khóa</label>
                                <input class="form-control" name="txtTen" placeholder="Điền Tên Khóa" value="{{$ds->tenKhoa}}" />
                            </div>
                            <input type="submit" class="btn btn-default" value="Cập Nhật"/>
                            <button type="reset" class="btn btn-default">Làm Mới</button>
                        <form>
                    </div>
                    <a href="admin/khoa/danhSach" class="btn btn-default">Quay Lại Danh Sách</a>
                </div>
            </div>
        </div>
@endsection