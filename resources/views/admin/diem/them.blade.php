@extends('admin.layout.index')

@section('css')
    <style>
        #selectLop, #selectSv {
            display: none;
        }
    </style>
@endsection

@section('content')     
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thêm Điểm   
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
        <div class="col-sm-12">
        <div class="col-sm-1"><input type="hidden" name="_token" value="{{csrf_token()}}"></div>
        <div class="col-sm-4">
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
            <div class="form-group" id="selectSv">
                <label>Sinh Viên</label>
                <select name="sinhvien" class="form-control" id="id_SinhVien">
                </select>
            </div>
            <div class="form-group">
                 <label>Môn</label>
                    <select class="form-control" name="maMon">
                       <option>Chọn Môn</option>
                       @foreach($mon as $mon)
                        <option value="{{$mon->maMon}}">{{$mon->tenMon}}</option>
                       @endforeach
                    </select>
            </div> 
        </div>
        <div class="col-sm-2"></div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>Điểm Lý Thuyết </label>
                <input type="text" name="txtDiem" class="form-control" placeholder="Điểm Lý Thuyết" value="" id="diemlt1">
                
            </div>
            <div class="form-group">
                <label>Điểm Thi Lại Lý Thuyết</label>
                <input type="text" name="txtDiem2" class="form-control abc" placeholder="Điểm Thi Lại Lý Thuyết" value="" disabled="" id="diemlt2">
                
            </div>
            <div class="form-group">
                <label>Điểm Thực Hành </label>
                <input type="text" name="txtDiem3" class="form-control" placeholder="Điểm Thực Hành" value="" id="diemth1">
                
            </div>
            <div class="form-group">
                <label>Điểm Thi Lại Thực Hành</label>
                <input type="text" name="txtDiem4" class="form-control abc" placeholder="Điểm Thi Lại Thực Hành" value="" disabled="" id="diemth2">
                
            </div>
        </div>
        <div class="col-sm-1"></div>
        </div>  
        <div align="center"><input type="submit" value="Thêm" class="btn btn-primary" style="width: 100px"></div>
    </form>
    <input type="hidden" name="_token" value="{{csrf_token()}}">
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
                    append += '<option selected disabled>--- Sinh Viên ---</option>';
                    for(var i = 0; i < data.tenSinhVien.length ; i++)
                    {
                        // console.log(i);
                        append += '<option value="' + data.tenSinhVien[i].maSv +  '">' + data.tenSinhVien[i].hoTen + '</option>';
                    }
                    $('#id_SinhVien').html(' ');
                    $('#id_SinhVien').append(append);
                },
            });
        });
    });
</script>
<script>
        $(document).ready(function(){
           var diemThiFinalLan1 = $('#diemlt1').val();
           var diemThiSkillLan1 = $('#diemth1').val();
           if(diemThiFinalLan1 < 5)
           {
                $('#diemlt2').removeAttr('disabled');
           }else{
                $('#diemlt2').attr('disabled','');
           }

           if(diemThiSkillLan1<5)
           {
                $('#diemth2').removeAttr('disabled');
           }else{
                $('#diemth2').attr('disabled','');
           }
           $("#diemlt1").keyup(function(){
                var diemThiFinalLan1=$(this).val();
                if(diemThiFinalLan1 < 5)
               {
                    $('#diemlt2').removeAttr('disabled');
               }else{
                    $('#diemlt2').attr('disabled','');
               }
           });

           $("#diemth1").keyup(function(){
                var diemThiSkillLan1=$(this).val();
                if(diemThiSkillLan1 < 5)
               {
                    $('#diemth2').removeAttr('disabled');
               }else{
                    $('#diemth2').attr('disabled','');
               }
           });
        });
    </script>

@endsection