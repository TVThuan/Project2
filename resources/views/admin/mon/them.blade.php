@extends('admin.layout.index')
@section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thêm Môn   
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
                        <form action="admin/mon/them" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" class="form-control" name="txtMa" placeholder="Mã Môn" />
                            

                             <div class="form-group">
                                <label>Tên Môn</label>
                                <input class="form-control" name="txtTen" placeholder="Tên Môn" />
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
                                <label>Thi Final</label><br/>
                                <input type="radio" name="rdbthiFinal" value="1"/>Có&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="rdbthiFinal" value="0"/>Không
                            </div> 
                            <div class="form-group">
                                <label>Thi Skill</label><br/>
                                <input type="radio" name="rdbthiSkill" value="1"/>Có&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="rdbthiSkill" value="0"/>Không
                            </div> 
                            <button type="submit" class="btn btn-default">Thêm Môn</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection