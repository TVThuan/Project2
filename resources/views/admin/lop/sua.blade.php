 @extends('admin.layout.index')
@section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Lớp
                            <small>{{$objLop->tenLop}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
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
                        <form action="admin/lop/sua/{{$objLop->maLop}}" method="POST">
                        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>" />
                            <div class="form-group">
                                <label>Tên Lớp</label>
                                <input class="form-control" name="txtTen" value="{{$objLop->tenLop}}" />
                            </div>
                            <div class="form-group">
                                <label>Chuyên Ngành</label><br/>
                                <select name="txtChuyenNganh" class="form-control">
                                    @foreach($cn as $cn)
                                    <option 
                                       @if($objLop->maCN == $cn->maCN)
                                        {{"selected"}}
                                       @endif 
                                        value="{{$cn->maCN}}">{{$cn->tenCN}}</option>
                                    </option>
                                     @endforeach
                                </select>
                            </div>
                            
                           
                            <button type="submit" class="btn btn-default">Cập Nhật</button>
                           
                        </form>
                    </div>
                    <a href="admin/lop/danhSach" class="btn btn-default">Quay Lại Danh Sách</a>
                </div>
   
            </div>
        
        </div>
 
@endsection