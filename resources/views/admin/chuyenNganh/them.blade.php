@extends('admin.layout.index')
@section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thêm Chuyên Ngành   
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
                        <form action="admin/chuyenNganh/them" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Tên Chuyên Ngành</label>
                                <input class="form-control" name="txtTen" placeholder="Tên Chuyên Ngành" />
                            </div> 
                            <button type="submit" class="btn btn-default">Thêm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> 

<!--Ngu lần 1
<<div class="modal fade" id="customer" role='dialog'>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss='modal'>&times;</button>
            </div>
            <h4 class="modal-title">CUsstomer</h4>
        </div>
        <div class="modal-body">
            <form action="#" method="POST" id="frmCustomer">
                <div class="row">
                    <div class="col-lg-4 col-sm-4">
                        <div class="form-group">
                            <input type="text" name="first_name" id="first_name">
                        </div>
                    </div>
                </div>
        
                <div class="modal-footer">
                    <input type="submit" value="Save" id="save" class="btn btn-primary" name="">
                    <button type="button" class="btn btn-default" data-dismiss='modal'>CLose</button>
                </div>
            </form>
        </div>
    </div>
</div>  -->
@endsection 
