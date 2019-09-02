@extends('layout.index')
@section('content')
   <div class="container">
    	<div class="row carousel-holder">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
				  	<div class="panel-heading">Thông Tin Cá Nhân</div>
				  	<div class="panel-body">
				    	<form action="" method="post">
				    		<input type="hidden" name="_token" value="{{csrf_token()}}">
							<br>
							<div>
								
				    			<label>Họ Tên</label>
							  	<input type="text" class="form-control abc" name="ten" aria-describedby="basic-addon1"placeholder="Họ Và Tên" value="{{$ds->hoTen}}">
							</div>
							<br>
							<div>
				    			<label>Ngày Sinh</label>
							  	<input type="date" class="form-control abc" name="ngaysinh" aria-describedby="basic-addon1" placeholder="Ngày Sinh" value="{{$ds->ngaySinh}}">
							</div>
							<br>
							
							<div>
				    			<label>Địa Chỉ</label>
							  	<input type="text" class="form-control " name="diachi" aria-describedby="basic-addon1" value="{{$ds->diaChi}}">
							</div>
							<br>
							<div>
				    			<label>Email</label>
							  	<input type="text" class="form-control abc" aria-describedby="basic-addon1" disabled="" value="{{$ds->email}}">
							</div>
							<br>
								<input type="submit" value="Cập Nhật" class="btn btn-default">
				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </div>
@endsection
