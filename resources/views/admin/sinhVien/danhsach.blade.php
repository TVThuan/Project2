@extends('admin.layout.index')
@section('content')
@section('css')
    <style>
        #selectLop, #selectSv {
            display: none;
        }
    </style>
@endsection
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sinh Viên
                            <small>Danh Sách</small>
                        </h1>
                    </div>
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
    <form method="post" action="{{route('themdiemc1')}}"> 
        <div class="col-sm"><input type="hidden" name="_token" value="{{csrf_token()}}"></div>
            <div class="form-group">
                <label>Khóa</label>
                <select name="cboCn" class="form-control" id="id_Khoa">
                    <option>Chọn </option>
                    @foreach($khoa as $khoa)
                        <option value="{{$khoa->maKhoa}}" >{{$khoa->tenKhoa}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group" id="selectLop">
                <label>Lớp</label>
                 <select name="lop" class="form-control" id="id_Lop">
                </select>
            </div>
            <br/>
            <div class="row" id="selectSv"></div>
            <div class="row" id="id_SinhVien"></div>
        </div>
    </form>
                    
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        $("#id_Khoa").change(function(){
            $('#selectLop').show();
            $('#selectSv').hide();
            var id = $(this).val();
            var token = $('input[name=_token]').val();
            var append = ' ';
            $.ajax({
                url: '{{ url('Ajax/getLop') }}',
                method: 'get',
                data: {
                    _token: token,
                    id: id
                },
                success: function(data){
                    // console.log(data);
                    append += '<option selected disabled>--- Lớp ---</option>';
                    for(var i = 0; i < data.length ; i++)
                    {
                        // console.log(i);
                        append += '<option value="' + data[i].maLop +  '">' + data[i].tenLop + '</option>';
                    }
                    $('#id_Lop').html(' ');
                    $('#id_Lop').append(append);
                },
            });
        });  
        $("#id_Lop").change(function(){
            $('#selectSv').show();
            var id = $(this).val();
            var token = $('input[name=_token]').val();
            var append = ' ';
            $.ajax({
                url: '{{ url('Ajax/getSv') }}',
                method: 'get',
                data: {
                    _token: token,
                    id: id
                },
                success: function(data){
                    console.log(data);
                    append +='<table  class="table table-striped table-bordered table-hover" ><th>Họ Tên</th><th>Ngày Sinh</th> <th>Giới Tính</th><th>Địa Chỉ</th><th>Số Điện Thoại</th><th>Xóa</th><th>Sửa</th><th>Điểm</th></table'
                    var gt='';
                    for(var i = 0; i < data.tenSinhVien.length ; i++) 
                    {
                        if(data.tenSinhVien[i].gioiTinh==1) gt='Nam';else gt='Nữ';
                            append+='<tbody>'
                            append+='<tr>'
                            append+='<td>'+ data.tenSinhVien[i].hoTen +'</td>';
                            append+='<td>'+ data.tenSinhVien[i].ngaySinh +'</td>';
                            append+='<td>'+ gt +'</td>';
                            append+='<td>'+ data.tenSinhVien[i].diaChi +'</td>';
                            append+='<td>'+ data.tenSinhVien[i].soDienThoai +'</td>';
                            append+='<td><div align="center"><a href="admin/sinhVien/xoa/'+data.tenSinhVien[i].maSv+'" onclick="return ConfirmDelete(Bạn Có Chắc Muốn Xóa Không?)">Xóa<i class"fas fa-times-circle"></i></div></td>';
                            append+='<td><div align="center"><a href="admin/sinhVien/sua/'+data.tenSinhVien[i].maSv+'">Sửa<i class"fas fa-times-circle"></i></div></td>';
                             append+='<td><div align="center"><a href="admin/sinhVien/diem/'+data.tenSinhVien[i].maSv+'">Điểm<i class"fas fa-times-circle"></i></div></td>';
                    }
                    append+='</tbody>'
                    $('#id_SinhVien').html(' ');
                    $('#id_SinhVien').append(append);
                },
            });
        });
    });
</script>
@endsection