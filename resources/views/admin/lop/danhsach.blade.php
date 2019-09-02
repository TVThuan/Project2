@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Lớp
                            <small>Danh Sách</small>
                        </h1>
                    </div>
                    @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                 <!--   <div class="form-group">
                        <label>Khoá</label><br/>
                            <select name="" class="form-control" id="Khoa">
                                <option value="" >Chọn</option>
                                   @foreach($dsk as $khoa)
                                <option value="{{$khoa->maKhoa}}" >{{$khoa->tenKhoa}}</option>
                                    @endforeach
                            </select>
                    </div>  
                -->
                 
                   <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>Lớp</th>
                                <th>Chuyên Ngành</th>
                                <th>Khóa</th>
                                <th>Xóa</th>
                                <th>Cập Nhật</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ds as $list)
                            <tr class="odd gradeX" align="center">
                                <td>{{$list->tenLop}}</td>
                                <td>{{$list->tenCN}}</td>
                                <td>{{$list->tenKhoa}}</td>

                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i> <a href="admin/lop/xoa/{{$list->maLop}}"  onclick="return confirm('Bạn Có Chắc Muốn Xóa Không?');">Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/lop/sua/{{$list->maLop}}">Cập Nhật </a></td>
                            </tr>
                            @endforeach
                        </tbody>
                   
                    </table>
             
                    
            </div>
           
        </div>
       
@endsection
<!--
@section('script')

     <script>
        $(document).ready(function(){
            $("#Khoa").change(function(){
                var idKhoa=$(this).val();
                $.get("admin/ajax/lop/"+idKhoa,function(data){
                    $("#Lop").html(data);
                });
            });
        });
    </script>  


     <script>
        $(document).ready(function(){
            $("#Lop").change(function(){
                var idLop=$(this).val();
                $.get("admin/ajax/lop/"+idLop,function(data){
                    $("#danhsach").html(data);
                });
            });
        });
    </script>

@endsection-->