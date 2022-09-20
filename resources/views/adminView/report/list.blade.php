@extends('layout.admin')

@section('content')
<style>

</style>
<div> Trong ngày: {{$countDay}}</div>
<div>Trong tháng: {{$countMounth}}</div>
<div>Tổng Số lượng truy cập: {{$countSum}}</div>
<a href="/admin/report-detail">Xem thống kê theo ngày</a>
<div id="columnchart_values" style="width: 900px; height: 300px;"></div>

@endsection
@section('script')
<script type="text/javascript" src="/js/loader.js"></script>
<script type="text/javascript">
  google.charts.load("current", {packages:['corechart']});
  google.charts.setOnLoadCallback(drawChart);
  var year = parseInt(<?php echo date("Y"); ?>);
  var jArray = <?php echo json_encode($data); ?>;
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ["Element", "Lượt truy cập", { role: "style" } ],
      ["1/"+year, jArray[1], "#b87333"],
      ["2/"+year,jArray[2], "#b87333"],
      ["3/"+year,  jArray[3], "#b87333"],
      ["4/"+year,  jArray[4], "#b87333"],
      ["5/"+year,  jArray[5], "#b87333"],
      ["6/"+year, jArray[6], "#b87333"],
      ["7/"+year,  jArray[7], "#b87333"],
      ["8/"+year, jArray[8], "#b87333"],
      ["9/"+year, jArray[9], "#b87333"],
      ["10/"+year,  jArray[10], "#b87333"],
      ["11/"+year,  jArray[11], "#b87333"],
      ["12/"+year,  jArray[12], "#b87333"]
    ]);

    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1,
                     { calc: "stringify",
                       sourceColumn: 1,
                       type: "string",
                       role: "annotation" },
                     2]);


    var options = {
      title: "Thông kê lượt truy cập theo tháng năm " +year,
      width: 1200,
      height: 800,
      bar: {groupWidth: "95%"},
      legend: { position: "none" },
    };
    var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
    chart.draw(view, options);
}
</script>
@endsection
