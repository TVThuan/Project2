@extends('admin.layout.index')
@section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Chuyên Ngành
                            <small>{{$ds->tenCN}}</small>
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
                        <form action="admin/chuyenNganh/sua/up" method="POST">
                            <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>" />  
                            <div class="form-group">
                                <label>Mã Chuyên Ngành</label>
                                <input class="form-control" name="txtMa" placeholder="Mã Chuyên Ngành" value="{{$ds->maCN}}" readonly="false" />
                                <label>Tên Chuyên Ngành</label>
                                <input class="form-control" name="txtTen" placeholder="Điền Tên Chuyên Ngành" value="{{$ds->tenCN}}" />
                            </div>
                            <input type="submit" class="btn btn-default" value="Cập Nhật"/>
                            
                        <form>
                    </div>
                    <a href="admin/chuyenNganh/danhSach" class="btn btn-default">Quay Lại Danh Sách</a>
                </div>
            </div>
        </div>
@endsection