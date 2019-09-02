@extends('admin.layout.index')
@section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Môn
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
                                <th>Môn</th>
                                <th>Chuyên Ngành</th>
                                <th>Thi Final</th>
                                <th>Thi Skill</th>
                                <th>Xóa</th>
                                <th>Cập Nhật</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ds as $mon)
                            <tr class="odd gradeX" align="center">  
                                <td>{{$mon->tenMon}}</td>
                                <td>{{$mon->tenCN}}</td>
                                
                                <td>@if($mon->Final == 1)
                                        {{"Có"}}
                                    @else
                                        {{"Không"}}
                                    @endif
                                </td>
                                <td>@if($mon->Skill == 1)
                                        {{"Có"}}
                                    @else
                                        {{"Không"}}
                                    @endif</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/mon/xoa/{{$mon->maMon}}" onclick="return confirm('Bạn Có Chắc Muốn Xóa Không?');"> Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/mon/sua/{{$mon->maMon}}">Cập Nhật</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>  
            </div>  
        </div>
@endsection