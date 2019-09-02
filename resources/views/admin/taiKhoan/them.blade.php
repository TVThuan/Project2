@extends('admin.layout.index')
@section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    
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
                        <form action="admin/sinhVien/them" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="col-lg-12">
                                    <h1 class="page-header">Tài Khoản </h1>
                            </div>
                            <div class="form-group">
                                <label>Mã Sinh Viên</label>
                                <input class="form-control" name="txtMa" placeholder="Mã Sinh Viên" required="" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="txtEmail" placeholder="Email" required="" />
                            </div>
                            <div class="form-group">
                                <label>PassWord</label>
                                <input  type='PassWord' class="form-control" name="txtPass" placeholder="PassWord" required="" />
                            </div>
                            
                            <div class="form-group">
                                <label>Phân Quyền</label>
                                <label class="radio-inline">
                                    <input  name="txtLevel" value="0" checked="" type="radio">Sinh Viên
                                <label class="radio-inline"><input type="radio" name="txtLevel" value="1">Admin</label>
                                </label>
                            </div>

                             <div class="form-group">
                                <label>Họ Tên Sinh Viên</label>
                                <input class="form-control" name="txtTen" placeholder="Họ Tên Sinh Viên" required="" />
                            </div>

                             <div class="form-group">
                                <label>Ngày Sinh</label>
                                <input type="date" class="form-control" name="txtNs" placeholder="Ngày Sinh" required="" />
                            </div>
        
                             <div class="form-group">
                                <label>Giới Tính</label>
                                <label class="radio-inline">
                                    <input name="rdoGT" value="1" type="radio">Nam
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoGT" value="0" type="radio">Nữ
                                </label>
                            </div>
                            
                             <div class="form-group">
                                <label>Địa Chỉ</label>
                                <input class="form-control" name="txtDc" placeholder="Địa Chỉ" required="" />
                            </div>
                             <div class="form-group">
                                <label>Số Điện Thoại</label>
                                <input class="form-control" name="txtsdt" placeholder="Số Điện Thoại" required="" />
                            </div>
                            <div class="form-group">
                               <label>Lớp</label><br/>
                                <select name="cboLop" class="form-control">
                                        <option value="">Chọn</option>
                                        @foreach($dsLop as $lop)
                                        <option value="{{$lop->maLop}}">{{$lop->tenLop}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="form-group">
                               <label>Khóa</label><br/>
                                <select name="cboKhoa" class="form-control">
                                        <option value="">Chọn</option>
                                        @foreach($listKhoa as $listKhoa)
                                        <option value="{{$listKhoa->maKhoa}}">{{$listKhoa->tenKhoa}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <button type="submit" class="btn btn-default">Thêm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection