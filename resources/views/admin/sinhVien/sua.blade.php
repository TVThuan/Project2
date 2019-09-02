@extends('admin.layout.index')
@section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sinh Viên
                            <small>{{$ds->hoTen}}</small>
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
                        <form action="admin/sinhVien/sua/{{$ds->maSv}}" method="POST">
                            <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>" />
                            <div class="form-group">
                                <label>Mã Sinh Viên</label>
                                <input class="form-control" name="Ma" placeholder="Mã Sinh Viên" value="{{$ds->maSv}}" readonly="" />
                            </div>

                            <div class="form-group">
                                <label>Họ Tên Sinh Viên</label>
                                <input class="form-control" name="Ten" placeholder="Họ Tên Sinh Viên" value="{{$ds->hoTen}}" />
                            </div>
                             <div class="form-group">
                                <label>Ngày Sinh</label>
                                <input type="date" class="form-control" name="Ns" placeholder="Ngày Sinh" value="{{$ds->ngaySinh}}" />
                            </div>   
                            <div class="form-group">
                                <label>Giới Tính</label>
                                <input type="radio" name="rdbGt" value="1" checked="checked" />Nam
                                <input type="radio" name="rdbGt" value="0" @if($ds->gioiTinh==0)
                                    checked="checked"
                                         @endif
                                    />Nữ
                            </div> 
                            <div class="form-group">
                                <label>Địa Chỉ</label>
                                <input class="form-control" name="Dc" placeholder="Địa Chỉ" value="{{$ds->diaChi}}" />
                            </div> 
                            <div class="form-group">
                                <label>Số Điện Thoại</label>
                                <input class="form-control" name="Sdt" placeholder="Số Điện Thoại" value="{{$ds->soDienThoai}}" />
                            </div> 
                            <div class="form-group">
                                <label>Lớp</label><br/>
                                <select name="Lop" class="form-control">
                                    @foreach($lop as $clas)
                                    <option 
                                       @if($ds->maLop == $clas->maLop)
                                        {{"selected"}}
                                       @endif 
                                    value="{{$clas->maLop}}">{{$clas->tenLop}}</option>
                                    </option>
                                     @endforeach
                                </select>
                            </div>
                            <input type="submit" class="btn btn-default" value="Cập Nhật"/>
                            <button type="reset" class="btn btn-default">Làm Mới</button>
                            
                        <form>

                    </div>
                   <a href="admin/sinhVien/danhSach" class="btn btn-default">Quay Lại Danh Sách</a>
                        
                    
                </div>
            </div>
        </div>
@endsection