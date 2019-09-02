@extends('admin.layout.index')
@section('content') 
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thêm Điểm Sinh Viên
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
                        <form action="{{route('themdiem')}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Mã Sinh Viên</label>
                                <input class="form-control" name="maSv" placeholder="Mã Sinh Viên" value="{{$ds->maSv}}"readonly="" />
                            </div> 
                            <div class="form-group">
                                 <label>Môn</label>
                                    <select class="form-control" name="maMon">
                                        <option>Chọn</option>
                                         @foreach($mon as $mon)
                                             <option value="{{$mon->maMon}}" >{{$mon->tenMon}}</option>
                                        @endforeach    
                                    </select>
                            </div> 
                            <div class="form-group">
                                <label>Điểm Final Thi Lần 1</label>
                                <input type="text" name="txtDiem" class="form-control" placeholder="Điểm Final"  id="diemlt1">
                                
                            </div>
                            <div class="form-group">
                
                                    <label>Điểm Thi Lại Final 2</label>
                                <input type="text" class="form-control abc" name="txtDiem2" placeholder="Điểm Final Lần 2" id="diemlt2"  disabled="" />
                            </div>  
                                             
                            <div class="form-group">
                                <label>Điểm Skill Thi Lần 1</label>
                                <input type="text" name="txtDiem3" class="form-control" placeholder="Điểm Skill"  id="diemth1"/>
                                
                            </div>
                             <div class="form-group">
                                <label>Điểm Thi Lại Skill 2</label>
                                    <input type="text" class="form-control abc " name="txtDiem4" placeholder="Điểm Skill Lần 2"  id="diemth2" disabled="" />
                            </div>  
                            <input type="submit" class="btn btn-default" value="Thêm Điểm" />
                        </form>
                    </div>
                     <a href="admin/sinhVien/diem/{{$ds->maSv}}" class="btn btn-default">Quay Lại Trang Điểm</a>
                </div>
            </div>
        </div> 
        
@endsection


@section('script')
    <script>
        $(document).ready(function(){
           var diemThiFinalLan1 = $('#diemlt1').val();
           var diemThiSkillLan1 = $('#diemth1').val();
          $("#diemlt1").keyup(function(){
              var diemThiFinalLan1=$(this).val();
              if(diemThiFinalLan1 < 5)
             {
                  $('#diemlt2').removeAttr('disabled');
             }
             else{
                  $('#diemlt2').attr('disabled','');
             }
           });

           $("#diemth1").keyup(function(){
                var diemThiSkillLan1=$(this).val();
                if(diemThiSkillLan1 < 5)
               {
                    $('#diemth2').removeAttr('disabled');
               }
               else{
                    $('#diemth2').attr('disabled','');
               }
           });
        });
    </script>

@endsection