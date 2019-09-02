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
    <form method="post" action="{{route('themdiemc2')}}"> 
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
            <div class="form-group">
                <label>Môn</label>
                    <select class="form-control" name="maMon" id="mon">
                    <option>Chọn</option>
                    @foreach($mon as $mon)
                     <option value="{{$mon->maMon}}" >{{$mon->tenMon}}</option>
                    @endforeach    
                    </select>
            </div> 
                        <br/>
            <div class="row" id="selectSv">
            <div  class="row" id="id_SinhVien"></div>
            </div>
        </div>
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
                    append +='<table class="table table-striped table-bordered table-hover"><th>Họ Tên</th><th>Final</th><th>Final 2</th><th>Skill</th><th>Skill 2</th></table'
                    for(var i = 0; i < data.length ; i++)
                    {
                
                            append+='<tbody>'
                            append+='<tr>'
                            append+='<td>'+ data[i].hoTen +'</td>';
                            append+='<input type="hidden" value="'+data[i].maSv+'" name="txtMaSv[]">';
                            append+='<td><input type="text" name="diemlt1[]" class="form-control "></td>'
                            append+='<td><input type="text" name="diemlt2[]" class="form-control "></td>'
                            append+='<td><input type="text" name="diemth1[]" class="form-control "></td>'
                            append+='<td><input type="text" name="diemth2[]" class="form-control "></td>'
                    }
                    append+='<input type="hidden" value="'+$('#mon').val()+'" name="maMon">';
                    append+='</tbody>'
                    append+='<td><div align="center"><input type="submit" value="Thêm" class="btn btn-primary" style="width: 100px"></div></td>'
                    $('#id_SinhVien').html(' ');
                    $('#id_SinhVien').append(append);
                },
            });
        });
    });
</script>
@endsection