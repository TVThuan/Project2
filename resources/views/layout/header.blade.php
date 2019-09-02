<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <b class="navbar-brand">Quản Lý Điểm </b>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="sinhVien/trangchu/diem/{{session('masv')}}">Xem Điểm</a>
                    </li>
                    <li>
                        <a href="sinhVien/trangchu/thongtincanhan/{{session('masv')}}">Thông Tin Cá Nhân</a>
                    </li>
                   
                    <li>
                        <a href="sinhVien/trangchu/doimatkhau">Đổi mật khẩu</a>
                    </li>
                </ul>
                    
                        <ul class="nav navbar-nav pull-right">
                                <li>
                                    <a href="sinhVien/trangchu/thongtincanhan">
                                        <span class ="glyphicon glyphicon-user"></span>
                                       {{session('users')}}
                                    </a>
                                </li>
                                <li>
                                    <a href="sinhVien/dangxuat">Đăng xuất</a>
                                </li>
                        </ul>
            </div>


            
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>