@extends('admin.layout.index')
@section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Môn
                            <small>{{$objMon->tenMon}}</small>
                        </h1>
                    </div>
                    <div class="col-lg-7" style="padding-bottom:120px">
                        
                        <form action="admin/mon/sua/{{$objMon->maMon}}" method="POST">
                            <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>" />
                            <div class="form-group">
                                <label>Mã Môn</label>
                                <input class="form-control" name="txtMa" placeholder="Mã Chuyên Ngành" value="{{$objMon->maMon}}" readonly="true" />
                            </div>
                            <div class="form-group">
                                <label>Tên Môn</label>
                                <input class="form-control" name="txtTen" placeholder="Điền Tên Chuyên Ngành" value="{{$objMon->tenMon}}" />
                            </div>

                            
                            <div class="form-group">
                                <label>Chuyên Ngành</label><br/>
                                <select name="txtChuyenNganh" class="form-control">
                                    @foreach($cn as $cn)
                                    <option 
                                       @if($objMon->maCN == $cn->maCN)
                                        {{"selected"}}
                                       @endif 
                                        value="{{$cn->maCN}}">{{$cn->tenCN}}</option>
                                    </option>
                                     @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Thi Final</label><br/>
                                <input type="radio" name="rdbthiFinal" value="1" checked="checked" />Có
                                <input type="radio" name="rdbthiFinal" value="0" @if($objMon->Final==0)
                                    checked="checked"
                                         @endif
                                    />Không
                            </div> 
                            <div class="form-group">
                                <label>Thi Skill</label><br/>
                                <input type="radio" name="rdbthiSkill" value="1" checked="checked" />Có
                                <input type="radio" name="rdbthiSkill" value="0"
                                @if($objMon->Skill==0)
                                    checked="checked"
                                @endif
                                />Không
                            </div>    
                            <input type="submit" class="btn btn-default" value="Cập Nhật"/>
                            <button type="reset" class="btn btn-default">Làm Mới</button>
                        <form>
                    </div>
                    <a href="admin/mon/danhSach" class="btn btn-default">Quay Lại Danh Sách</a>
                </div>
            </div>
        </div>
@endsection