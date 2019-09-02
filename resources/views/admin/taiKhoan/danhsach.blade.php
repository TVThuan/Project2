@extends('admin.layout.index')
@section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tài Khoản
                            <small>Danh Sách</small>
                        </h1>
                    </div>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>Tên Tài Khoản</th>
                                <th>Họ Và Tên</th>
                                <th>Địa Chỉ</th>
                                <th>Số Điện Thoại</th>
                                <th>Quyền</th>
                                <th>Cập Nhât</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ds as $tk)
                            <tr class="odd gradeX" align="center">
                                <td>{{$tk->email}}</td>
                                <td>{{$tk->hoTen}}</td>
                                <td>{{$tk->diaChi}}</td>
                                <td>{{$tk->soDienThoai}}</td>
                                <td>
                                    @if($tk->PQ == 0)
                                        <p style="color: red">{{ "Sinh Viên" }}</p>
                                    @else
                                        <p style="color: blue">{{ "Quản Trị" }}</p>
                                    
                                    @endif
                                </td>
                                 <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/taiKhoan/sua/{{$tk->maSv}}">Cập Nhật</a></td>
                            </tr>
                            @endforeach
                           
                        </tbody>

                    </table>
                </div>  
                 
            </div>  
        </div>
@endsection