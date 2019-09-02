@extends('admin.layout.index')
@section('content')
       <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Chuyên Ngành
                            <small>Danh Sách</small>
                        </h1>
                    </div>
                     @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>Chuyên Ngành</th>
                                <th>Xoá</th>
                                <th>Cập Nhật</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ds as $cn)
                            <tr class="odd gradeX" align="center">
                                <td>{{$cn->tenCN}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i> <a href="admin/chuyenNganh/xoa/{{$cn->maCN}}"  onclick="return confirm('Bạn Có Chắc Muốn Xóa Không?');">Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/chuyenNganh/sua/{{$cn->maCN}}">Cập Nhật</a></td>
                            </tr>
                            @endforeach
                        </tbody>   
                    </table> 
                </div>  
            </div>  
        </div>
@endsection