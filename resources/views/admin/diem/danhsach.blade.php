@extends('admin.layout.index')
@section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                        <h1>Thông Tin Sinh Viên</h1>
                <form action="admin/sinhVien/diem/{{$ds->maSv}}" method="post">
                    <table cellpadding="0px" cellspacing="0px" >
                        <tr>
                            <td>Mã Sinh Viên </td>
                            <td><input class="form-control" type="type" name="ma" value="{{$ds->maSv}}" readonly=""></td>
                        </tr>
                        <tr>
                            <td>Sinh Viên </td>
                            <td><input class="form-control" type="type" name="ten" value="{{$ds->hoTen}}" readonly=""></td>
                        </tr>
                         <tr>
                            <td>Ngày Sinh</td>
                            <td class="form-control" >{{date('d-m-Y', strtotime($ds->ngaySinh))}}</td>
                        </tr>
                        <tr>
                            <td >Giới Tính </td>
                                <td class="form-control">@if($ds->gioiTinh == 1)
                                      {{"Nam"}}
                                        @else
                                         {{"Nữ"}}
                                         @endif
                                </td>
                        </tr>
                        <tr>
                            <td>Địa Chỉ </td>
                            <td><input class="form-control" type="type" name="ten" value="{{$ds->diaChi}}" readonly=""></td>
                        </tr>
                         <tr>
                            <td>Số Điện Thoại </td>
                            <td><input class="form-control" type="type" name="soDienThoai" value="{{$ds->soDienThoai}}" readonly=""></td>
                        </tr>
                         <tr>
                            <td>Lớp </td>
                            <td><input class="form-control" type="type" name="lop" value="{{$ds->tenLop}}" readonly=""></td>
                        </tr>
                  </table>
                  <br/>
                  <br/>
               <a href="admin/diem/themdiem/{{$ds->maSv}}" class="create-modal btn btn-success btn-sm"><h4>Thêm Điểm</h4></a>
                <a href="admin/diem/inPhieuDiem/{{$ds->maSv}}" class="create-modal btn btn-success btn-sm"><h4>In Phiếu Điểm</h4></a>
                  <h3>Kết Quả Học Tập</h3>
                <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr align="center">
                                <th>Môn</th>
                                <th>Điểm Thi Fianl Lần 1</th>
                                <th>Điểm Thi Fianl Lần 2</th>
                                <th>Điểm Thi Skill Lần 1</th>
                                <th>Điểm Thi Skill Lần 2</th>
                                <th>Xóa Điểm</th>
                                <th>Sửa Điểm</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach($dsd as $list)
                            <tr>
                                <td>{{$list->tenMon}}</td>
                                <td>{{$list->diemThiFinalLan1}}</td>
                                <td>{{$list->diemThiFinalLan2}}
                                    @if($list->diemThiFinalLan2 == 0)
                                        {{"Không"}}
                                        @else
                                     @endif
                                </td>
                                <td>{{$list->diemThiSkillLan1}}</td>
                                <td>{{$list->diemThiSkillLan2}}
                                    @if($list->diemThiSkillLan2 == 0)
                                      {{"Không "}}
                                        @else
                                    @endif
                            </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i> <a href="admin/diem/xoa/{{$ds->maSv}}/{{$list->maMon}}"  onclick="return confirm('Bạn Có Chắc Muốn Xóa Không?');">Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/diem/sua/{{$ds->maSv}}/{{$list->maMon}}">Edit</a></td>
                            </tr>
                         @endforeach
                        </tbody>
                    </table>
                </form>
                </div>  
            </div>  
        </div>
@endsection