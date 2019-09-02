@extends('layout.index')
@section('content')
   <div class="container">
    	<div class="row carousel-holder">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
				  	<div class="panel-heading">Đổi Mật Khẩu</div>
				  	<div class="panel-body">
				    	<form action="" method="post">
				    		<input type="hidden" name="_token" value="{{csrf_token()}}">
							<br>
							<div>
								
				    			<label>Đổi mật khẩu</label>
							  	<input type="password" class="form-control abc" name="password" aria-describedby="basic-addon1"  placeholder="Mật Khẩu">
							</div>
							<br>
							<div>
				    			<label>Nhập lại mật khẩu</label>
							  	<input type="password" class="form-control abc" name="passwordAgain" aria-describedby="basic-addon1" placeholder="Nhập Lại Mật Khẩu">
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
