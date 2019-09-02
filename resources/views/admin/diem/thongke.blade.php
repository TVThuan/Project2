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
                        <h1 class="page-header">Thống Kê Điểm
                            <small>Theo Lớp</small>
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
            $.ajax({
                url: '{{ url('Ajax/get_diem_sv') }}',
                method: 'get',
                data: {
                    _token: token,
                    id: id
                },
                success: function(data){
                    $('#id_SinhVien').html(data);
                },
            });
        });
    });
</script>
@endsection
@section('script')
<script type="text/javascript">
    
        function printData()
        {
           var data_print=document.getElementById('contentprint');
           newWin= window.open("");
           newWin.document.write(data_print.outerHTML);
           newWin.print();
           newWin.close();
        }
        
        $('#print').on('click',function(){
            printData();
        });
</script>
@endsection