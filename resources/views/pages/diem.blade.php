@extends('layout.index')
@section('content')
   <div class="container">

    	<div class="row carousel-holder">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
				  	<div class="panel-heading">Điểm Cá Nhân<br/><th>Họ Tên : {{session('users')}}</th></tr></div>
				  	<div class="panel-body">

                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                            
                            <tr align="center">
                                <th>Môn</th>
                                <th>Điểm Thi Fianl Lần 1</th>
                                <th>Điểm Thi Fianl Lần 2</th>
                                <th>Điểm Thi Skill Lần 1</th>
                                <th>Điểm Thi Skill Lần 2</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                         @foreach($dsd as $list)
                            <tr>
                                <td>{{$list->tenMon}}</td>
                                <td>{{$list->diemThiFinalLan1}}</td>
                                <td>{{$list->diemThiFinalLan2}}
                                    @if($list->diemThiFinalLan2 == 0)
                                        {{"Không"}}
                                        @else
                                     @endif
                                </td>
                                <td>{{$list->diemThiSkillLan1}}</td>
                                <td>{{$list->diemThiSkillLan2}}
                                    @if($list->diemThiSkillLan2 == 0)
                                      {{"Không  "}}
                                        @else
                                    @endif
                            </td>
                            @endforeach
                        </div>
				  	</div>
				</div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </div>
@endsection
@section('script')
<script type="text/javascript">
    $('.timkiem').keyup(function(){
        // alert($('.timkiem').val());
        var txt=$('.timkiem').val();
        $.post('ajax.php',{data:txt},function(data){
            $('.danhsach').html(data);
        });
    });
</script>
@endsection
