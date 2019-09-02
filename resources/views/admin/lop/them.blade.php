@extends('admin.layout.index')
@section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Lớp
                            <small>Thêm</small>
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
                      <form action="{{route('themLop')}}" method="post">
                        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>" />
                            <div class="form-group">
                                <label>Tên Lớp</label>
                                <input class="form-control" name="txtTen" placeholder=" Tên Lớp" />
                            </div>
                             <div class="form-group">
                                <label>Chuyên Ngành</label><br/>
                                <select name="cboCn" class="form-control" >
                                    <option value="" >Chọn</option>
                                        @foreach($dscn as $cn)
                                    <option value="{{$cn->maCN}}">{{$cn->tenCN}}</option>
                                        @endforeach
                                </select>
                            </div> 
                             <div class="form-group">
                                <label>Khóa</label><br/>
                                <select name="cboKhoa" class="form-control" >
                                    <option value="" >Chọn</option>
                                        @foreach($dsk as $k)
                                    <option value="{{$k->maKhoa}}">{{$k->tenKhoa}}</option>
                                        @endforeach
                                </select>
                            </div> 
                           <button type="submit" class="btn btn-default">Thêm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection