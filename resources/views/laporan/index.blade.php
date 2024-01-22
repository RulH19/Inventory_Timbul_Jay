@extends('layout.app')
@section('title', 'Data Barang')
@section('content')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Laporan</h6>
    </div>
    <div class="card-body">
        <div id="grafik"></div>
    </div>
</div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    var totalKeuntungan = <?php echo json_encode($seriesData ) ?>;
    var bulan = <?php echo json_encode($bulan) ?>;
    Highcharts.chart('grafik',{
        chart: {
            type: 'column'
        },
        title : {
            text : 'Laporan'
        },
        xAxis :{
            categories : bulan
        },
        yAxis :{
            title :{
                text : 'Nominal Pendapatan Bulanan'
            }
        },
        plotOptions :{
            series:{
                allowPointSelect : true
            }
        },
        series : totalKeuntungan
    })
</script>

@endsection
