@extends('admin.layout.index')
@section('content')
<script src="https://code.highcharts.com/highcharts.js"></script>
<!-- <script src="https://code.highcharts.com/modules/exporting.js"></script> -->
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
@section('script')
<script type="text/javascript">
Highcharts.chart('container', {
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie'
  },
  title: {
    text: 'Thống Kê Điểm Học Viên Công Nghệ Thông Tin BKACAD'
  },
  tooltip: {
    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
      dataLabels: {
        enabled: true,
        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
        style: {
          color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
        }
      }
    }
  },
  series: [{
    name: 'Điểm',
    colorByPoint: true,
    data: [{
      name: ' Qua Môn',
      y: 73,
      sliced: true,
      selected: true
    }, {
      name: ' Nợ Môn',
      y: 1,
    },{
      name: 'Thi Lại',
      y: 15
    }]
  }]
});
</script>
@endsection
@endsection

