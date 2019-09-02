@extends('admin.layout.index')
@section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thêm Khóa   
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
                        <form action="admin/khoa/them" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                             <div class="form-group">
                                <label>Tên Khóa</label>
                                <input class="form-control" name="txtTen" placeholder="Tên Khóa" />
                            </div>
                            <button type="submit" class="btn btn-default">Thêm Khóa Học</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection