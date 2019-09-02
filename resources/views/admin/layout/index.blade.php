<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <title>Admin</title>
    <base href="{{asset('')}}">
   

    <!-- DataTables Responsive CSS -->
    <link href="admin_asset/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <link href="admin_asset/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="admin_asset/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="admin_asset/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="admin_asset/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="admin_asset/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    @yield('css')
</head>

<body>

    <div id="wrapper">

        @include('admin.layout.header')
       
     	@yield('content')

    </div>
    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="admin_asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="admin_asset/bower_components/metisMenu/dist/metisMenu.min.js"></script>
    
    <!-- Custom Theme JavaScript -->
    <script src="admin_asset/dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="admin_asset/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.printPage.js"></script>

    @yield('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#dataTables-example').DataTable({
                "language":{
                    "lengthMenu": "Hiển thị _MENU_ kết quả trên 1 trang",
                    "zeroRecords": "Không có kết quả",
                    "info": "Đang hiển thị _PAGE_ của _PAGES_",
                    "search":         "Tìm:",
                    "infoEmpty": "No records available",
                    "infoFiltered": "(filtered from _MAX_ total records)",
                    "paginate": {
                     "first":      "First",
                     "last":       "Last",
                     "next":       "Sau",
                     "previous":   "Trước"
                                },
                }
            });
        });
    </script>
    </body>

</html>
