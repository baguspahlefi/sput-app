@extends('layouts.app')
@section('title')
    SPUT - Dashboard
@endsection
@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Charts</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Charts</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    Chart.js is a third party plugin that is used to generate the charts in this template. The charts below have been customized - for further customization options, please visit the official
                    <a target="_blank" href="https://www.chartjs.org/docs/latest/">Chart.js documentation</a>
                    .
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area me-1"></i>
                    Area Chart Example
                </div>
                <div class="card-body"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            Column Chart MoM Level 1
                        </div>
                        <div class="card-body"><canvas id="multiBarChart" width="100%" height="50"></canvas></div>
                        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-pie me-1"></i>
                            Pie Chart MoM Level 1
                        </div>
                        <div class="card-body"><canvas id="piechartMoM1" width="100%" height="288"></canvas></div>
                        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                    </div>
                </div>
            </div>
        </div>
        
    </main>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="{{url('assets/demo/chart-area-demo.js')}}"></script>
<script src="{{url('assets/demo/chart-bar-demo.js')}}"></script>
<script src="{{url('assets/demo/chart-pie-demo.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js" crossorigin="anonymous"></script>
<script>
var data = @json($statusMoM1_2);

var labels = [...new Set(data.map(item => item.pic))];
var statuses = [...new Set(data.map(item => item.status))];
var datasets = [];

statuses.forEach(status => {
    var statusData = data.filter(item => item.status === status).map(item => item.id_count);
    datasets.push({
        label: status,
        data: statusData,
        backgroundColor: getRandomColor(),
        borderWidth: 1
    });
});

var ctx = document.getElementById('multiBarChart').getContext('2d');
var multiBarChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: datasets
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

function getRandomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

</script>
<script>
    var ctx = document.getElementById("piechartMoM1");
    var data = @json($statusMoM1);
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: data.labelsMoM1,
    datasets: [{
      data: data.dataMoM1,
      backgroundColor: ['#007bff', '#dc3545', '#ffc107'],
    }],
  },
  options: {
        responsive: true,         // Membuat chart responsif
        maintainAspectRatio: false // Tidak mempertahankan rasio aspek
  }
});
</script>

@endsection


