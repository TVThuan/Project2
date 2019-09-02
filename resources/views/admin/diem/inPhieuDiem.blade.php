@extends('admin.layout.index')
@section('content') 
<style type="text/css">
    .content_thuphi{
        width: 80%;
        border: 1px solid #4a7da3;
        background-color: hsl(0, 0%, 95%)   ;
        border-radius: 3px;
        color: black;
        margin: auto;
        padding-top:10px;
        font-size: 13px;
       float: right;
    }

    .control-label{
        text-align: right;
        position: inherit;
        top: 5px;
    }
    .input_thu{
        position: inherit;
        right: 20px;
    }
    
    #content_body{
        width: 800px;
        overflow-y: auto;
        max-height: 800px;
        background-color: white;
        margin:auto;
        font-family: initial;
        font-size: 14px;
        border:1px solid #4a7da3;
        margin-bottom: 10px;
    }
</style>
<header class="header_main">
    <i class="fas fa-file"></i>&nbsp;&nbsp;Kết Quả Học Tập
</header>
<div class="content_thuphi">
    <div class="row" style="padding-left: 13px;">
        <div class="col-sm-12" id="header_thuphi">
            <div class="col-sm-3">
                <button id="print" class="btn btn-info btn-color" data-toggle="tooltip" data-placement="top" title="Print"><span class="glyphicon glyphicon-print" ></span>&nbsp;In</button>    
            </div>
        </div>
    </div>
    <br>
    <div class="row">  
    </div>
    <br>
    <div class="row" id="content_body">
        <div class="container-fluid" id="contentprint">
                <div class="col-sm-12" style="padding-top: 10px;">
                    <table>
                        <tr>
                            <td width="45%">
                                <p align="center">
                                    <p style="font-size: 12px" align="center"><b style="color: hsl(3, 89%, 47%)">TRƯỜNG ĐẠI HỌC BÁCH KHOA HÀ NỘI</b><br><b style="color: hsl(176, 96%, 34%)">HỌC VIỆN CÔNG NGHỆ THÔNG TIN BÁCH KHOA</b></p>
                                </p>
                            </td>
                            <td width="2%"></td>
                            <td>
                                <p align="center"><b>HỌC VIỆN CÔNG NGHỆ THÔNG TIN BÁCH KHOA - TRƯỜNG ĐẠI HỌC BÁCH KHOA HÀ NỘI</b><br>
                                    Tầng 5, nhà A17, số 17 Tạ Quang Bửu, Phường Bách Khoa, Quận Hai Bà Trưng, Hà Nội, Việt Nam</p>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-12" style="text-align: center">
                    <P>
                        <b style="font-size: 20px;">BẢNG ĐIỂM CHI TIẾT CÁ NHÂN <b style="color: hsl(176, 96%, 34%)" id="name_lop"></b></b><br>
                         @foreach($ds as $ds) 
                            <p> Họ Tên Sinh Viên : {{$ds->hoTen}}</p>
                             <p>Lớp : {{$ds->tenLop}}</p>
                             <p>Khóa Học: {{$ds->tenKhoa}}</p>
                             <p>Chuyên Ngành : {{$ds->tenCN}}</p>

                        @endforeach<br/>
                    </P>
                </div>

                <div class="col-sm-12">
                    <table class="table table-hover table-striped table-bordered table-condensed table-responsive table_export" border="1" cellpadding="5" cellspacing="0" width="100%">
                        <thead>
                            <tr style="background-color: hsl(163, 81%, 90%); font-size: 14px">
                                <th>Môn Học</th>
                                <th>Điểm Lý Thuyết 1</th>
                                <th>Điểm Lý Thuyết 2</th>
                                <th>Điểm Thực Hành 1</th>
                                <th>Điểm Thực Hành 2</th>
                               
                            </tr>
                        </thead>
                        <tbody id="content_phi_lop">
                            @foreach($dsdiem as $list)
                            <tr style="height: 30px;">
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
                            </tr> 
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</div>

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