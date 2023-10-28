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
            <div class="row">
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            Column Chart MoM Level 1
                        </div>
                        <div class="card-body"><div id="chart" width="100%" height="50"></div></div>
                        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            Column Chart MoM Level 1
                        </div>
                        <div class="card-body"><canvas id="multiBarChart1" width="100%" height="50"></canvas></div>
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
            <div class="row">
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            Column Chart MoM Level 2
                        </div>
                        <div class="card-body"><canvas id="multiBarChart2" width="100%" height="50"></canvas></div>
                        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-pie me-1"></i>
                            Pie Chart MoM Level 2
                        </div>
                        <div class="card-body"><canvas id="piechartMoM2" width="100%" height="288"></canvas></div>
                        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            Column Chart MoM Level 3
                        </div>
                        <div class="card-body"><canvas id="multiBarChart3" width="100%" height="50"></canvas></div>
                        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-pie me-1"></i>
                            Pie Chart MoM Level 3
                        </div>
                        <div class="card-body"><canvas id="piechartMoM3" width="100%" height="288"></canvas></div>
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
{{-- <script>
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

var ctx = document.getElementById('multiBarChart1').getContext('2d');
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
<script>
var data = @json($statusMoM2_2);

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

var ctx = document.getElementById('multiBarChart2').getContext('2d');
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
    var ctx = document.getElementById("piechartMoM2");
    var data = @json($statusMoM2);
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: data.labelsMoM2,
    datasets: [{
      data: data.dataMoM2,
      backgroundColor: ['#007bff', '#dc3545', '#ffc107'],
    }],
  },
  options: {
        responsive: true,         // Membuat chart responsif
        maintainAspectRatio: false // Tidak mempertahankan rasio aspek
  }
});
</script>
<script>
var data = @json($statusMoM3_2);

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

var ctx = document.getElementById('multiBarChart3').getContext('2d');
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
    var ctx = document.getElementById("piechartMoM3");
    var data = @json($statusMoM3);
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: data.labelsMoM3,
    datasets: [{
      data: data.dataMoM3,
      backgroundColor: ['#007bff', '#dc3545', '#ffc107'],
    }],
  },
  options: {
        responsive: true,         // Membuat chart responsif
        maintainAspectRatio: false // Tidak mempertahankan rasio aspek
  }
});
</script> --}}

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    var statusCountsHCGS = {!! json_encode($statusCountsHCGS) !!};
    var statusCountsFAT = {!! json_encode($statusCountsFAT) !!};
    var statusCountsEngineeringRoad = {!! json_encode($statusCountsEngineeringRoad) !!};
    var statusCountsPortOperation = {!! json_encode($statusCountsPortOperation) !!};
    var statusCountsSM = {!! json_encode($statusCountsSM) !!};
    var statusCountsPLANT = {!! json_encode($statusCountsPLANT) !!};
    var statusCountsSHE = {!! json_encode($statusCountsSHE) !!};
    var statusCountsProjectManagement = {!! json_encode($statusCountsProjectManagement) !!};

    var options = {
        series: [{
        name: 'OPEN',
        data: [
            statusCountsHCGS.OPEN || 0,
            statusCountsFAT.OPEN || 0,
            statusCountsEngineeringRoad.OPEN || 0,
            statusCountsPortOperation.OPEN || 0,
            statusCountsSM.OPEN || 0,
            statusCountsPLANT.OPEN || 0,
            statusCountsSHE.OPEN || 0,
            statusCountsProjectManagement.OPEN || 0
        ]
    }, {
        name: 'PROGRESS',
        data: [
            statusCountsHCGS.PROGRESS || 0,
            statusCountsFAT.PROGRESS || 0,
            statusCountsEngineeringRoad.PROGRESS || 0,
            statusCountsPortOperation.PROGRESS || 0,
            statusCountsSM.PROGRESS || 0,
            statusCountsPLANT.PROGRESS || 0,
            statusCountsSHE.PROGRESS || 0,
            statusCountsProjectManagement.PROGRESS || 0
        ]
    }, {
        name: 'CLOSE',
        data: [
            statusCountsHCGS.CLOSE || 0,
            statusCountsFAT.CLOSE || 0,
            statusCountsEngineeringRoad.CLOSE || 0,
            statusCountsPortOperation.CLOSE || 0,
            statusCountsSM.CLOSE || 0,
            statusCountsPLANT.CLOSE || 0,
            statusCountsSHE.CLOSE || 0,
            statusCountsProjectManagement.CLOSE || 0
        ]
    }],
        chart: {
        type: 'bar',
        height: 350
    },
    plotOptions: {
        bar: {
        horizontal: false,
        columnWidth: '55%',
        endingShape: 'rounded'
        },
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
    },
    xaxis: {
        categories: ['HCGS', 'FAT', 'Engineering Road', 'Port Operation', 'SM', 'PLANT', 'SHE', 'Project Management'],
    },
    yaxis: {
        title: {
        text: 'Jumlah Status'
        }
    },
    fill: {
        opacity: 1
    },
    tooltip: {
        y: {
        formatter: function (val) {
            return val 
        }
        }
    }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();

</script>


@endsection


