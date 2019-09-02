@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa Điểm Sinh Viên
                    <small>{{$ds->hoTen}}</small>
                </h1>
            </div>
            <div class="col-lg-7" style="padding-bottom:120px;">
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
                <form action="{{route('get_postsuaDiem',[$ds->maSv,$ds->maMon])}}" method="POST">
                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token()?>" />
                    <div class="form-group">
                        <label>Môn</label>
                        <input class="form-control" name="txtMa" placeholder="Môn" value="{{$ds->tenMon}}" readonly="" />
                    </div>

                    <div class="form-group">
                        
                        <label>Điểm Lý Thuyết</label>
                        <input class="form-control " name="diem1" placeholder="Điểm Lý Thuyết" value="{{$ds->diemThiFinalLan1}}" id="diemlt1">
                    </div>
                    <div class="form-group">
                        <label>Điểm Thi Lại Lý Thuyết</label>
                        <input class="form-control " name="diem2" placeholder="Điểm Thi Lại Lý Thuyết" value="{{$ds->diemThiFinalLan2}}" id="diemlt2" disabled="">
                    </div>
                    <div class="form-group">
                        <label>Điểm Thực Hành</label>
                        <input class="form-control " name="diem3" placeholder="Điểm Thực Hành" value="{{$ds->diemThiSkillLan1}}" id="diemth1">
                    </div>
                    <div class="form-group">
                        <label>Điểm Thi Lại Thực Hành</label>
                        <input class="form-control " name="diem4" placeholder="Điểm Thi Lại Thực Hành" value="{{$ds->diemThiSkillLan2}}" id="diemth2" disabled="">
                    </div>
                    <input type="submit" class="btn btn-default" value="Cập Nhật"/>
                    
                <form>
            </div>
             <a href="admin/sinhVien/diem/{{$ds->maSv}}" class="btn btn-default">Quay Lại Danh Sách</a>
        </div>
    </div>
</div>
@endsection
@section('script')
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