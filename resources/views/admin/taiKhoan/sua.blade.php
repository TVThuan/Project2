@extends('admin.layout.index')
@section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tài Khoản
                            <small>{{$ds->hoTen}}</small>
                        </h1>
                    </div>
                    <div class="col-lg-7" style="padding-bottom:120px">
                         @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                        <form action="admin/taiKhoan/sua/{{$ds->maSv}}" method="POST">
                            <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>" />
                            <div class="form-group">
                                <label>Họ Tên</label>
                                <input class="form-control" name="hoTen"  value="{{$ds->hoTen}}" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="Email"  value="{{$ds->email}}" readonly="" />
                            </div>   
                            <div class="form-group">
                                <input type="checkbox" name="changePassword" id="changePassword">
                                <label>Đổi mật khẩu</label>
                                <input type="password" class="form-control password" name="password" placeholder="Nhập mật khẩu" disabled="" />
                            </div>  
                             <div class="form-group">
                                <label>Nhập lại mật khẩu</label>
                                <input type="password" class="form-control password" name="password" placeholder="Nhập lại mật khẩu" disabled="" />
                            </div> 
                            <div class="form-group">
                                <label>Phân Quyền</label>
                                <input type="radio" name="PQ" value="1" checked="checked" />Admin
                                <input type="radio" name="PQ" value="0" @if($ds->PQ==0)
                                    checked=""
                                         @endif
                                    />Sinh Viên
                            </div> 
                           <!-- <div class="form-group">
                                <label>Địa Chỉ</label>
                                <input class="form-control" name="diaChi" placeholder="Địa Chỉ" value="{{$ds->diaChi}}" />
                            </div> 
                            <div class="form-group">
                                <label>Số Điện Thoại</label>
                                <input class="form-control" name="soDienThoai" placeholder="Số Điện Thoại" value="{{$ds->soDienThoai}}" />
                            </div> -->
                            
                            <input type="submit" class="btn btn-default" value="Cập Nhật"/>
                            <button type="reset" class="btn btn-default">Làm Mới</button>
                        <form>
                    </div>
                    <a href="admin/taikhoan/danhSach" class="btn btn-default">Quay Lại Danh Sách</a>
                </div>
            </div>
        </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('#changePassword').change(function(){
                if($(this).is(":checked"))
                {
                    $(".password").removeAttr('disabled');
                }
                else{
                    $(".password").attr('disabled','');
                }
            });
        });
    </script>
@endsection