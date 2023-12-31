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
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Charts</li>
            </ol>
                
            <div class="row">
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            Column Chart MoM Level 1
                        </div>
                        <div class="card-body"><div id="multiBarChart1" width="100%" height="50"></div></div>
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
                        <div class="card-body"><div id="multiBarChart2" width="100%" height="50"></div></div>
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
                        <div class="card-body"><div id="multiBarChart3" width="100%" height="50"></div></div>
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

<script src="https://cdn.jsdelivr.net/npm/chart.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> 
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
</script>


<script>
    var statusCountsHCGS1 = {!! json_encode($statusCountsHCGS1) !!};
    var statusCountsFAT1 = {!! json_encode($statusCountsFAT1) !!};
    var statusCountsEPR1 = {!! json_encode($statusCountsEPR1) !!};
    var statusCountsSHE1 = {!! json_encode($statusCountsSHE1) !!};
    var statusCountsPS1 = {!! json_encode($statusCountsPS1) !!};
    var statusCountsProjectManagement1 = {!! json_encode($statusCountsProjectManagement1) !!};
    var statusCountsMD1 = {!! json_encode($statusCountsMD1) !!};

    var options = {
        series: [{
        name: 'OPEN',
        data: [
            statusCountsHCGS1.OPEN || 0,
            statusCountsFAT1.OPEN || 0,
            statusCountsEPR1.OPEN || 0,
            statusCountsPS1.OPEN || 0,
            statusCountsSHE1.OPEN || 0,,
            statusCountsProjectManagement1.OPEN || 0,
            statusCountsMD1.OPEN || 0
        ]
    }, {
        name: 'PROGRESS',
        data: [
            statusCountsHCGS1.PROGRESS || 0,
            statusCountsFAT1.PROGRESS || 0,
            statusCountsEPR1.PROGRESS || 0,
            statusCountsPS1.PROGRESS || 0,
            statusCountsSHE1.PROGRESS || 0,
            statusCountsProjectManagement1.PROGRESS || 0,
            statusCountsMD1.PROGRESS || 0
        ]
    }, {
        name: 'CLOSE',
        data: [
            statusCountsHCGS1.CLOSE || 0,
            statusCountsFAT1.CLOSE || 0,
            statusCountsEPR1.CLOSE || 0,
            statusCountsPS1.CLOSE || 0,
            statusCountsSHE1.CLOSE || 0,
            statusCountsProjectManagement1.CLOSE || 0,
            statusCountsMD1.CLOSE || 0
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
        categories: ['HCGS', 'FAT', 'Eng, Port & Road', 'Plant & SM', 'SHE', 'Project Management','MD'],
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

    var chart = new ApexCharts(document.querySelector("#multiBarChart1"), options);
    chart.render();

</script>

<script>
    var statusCountsHCGS2 = {!! json_encode($statusCountsHCGS2) !!};
    var statusCountsFAT2 = {!! json_encode($statusCountsFAT2) !!};
    var statusCountsEPR2 = {!! json_encode($statusCountsEPR2) !!};
    var statusCountsPS2 = {!! json_encode($statusCountsPS2) !!};
    var statusCountsSHE2 = {!! json_encode($statusCountsSHE2) !!};
    var statusCountsProjectManagement2 = {!! json_encode($statusCountsProjectManagement2) !!};
    var statusCountsMD2 = {!! json_encode($statusCountsMD2) !!};

    var options = {
        series: [{
        name: 'OPEN',
        data: [
            statusCountsHCGS2.OPEN || 0,
            statusCountsFAT2.OPEN || 0,
            statusCountsEPR2.OPEN || 0,
            statusCountsPS2.OPEN || 0,
            statusCountsSHE2.OPEN || 0,
            statusCountsProjectManagement2.OPEN || 0,
            statusCountsMD2.OPEN || 0
        ]
    }, {
        name: 'PROGRESS',
        data: [
            statusCountsHCGS2.PROGRESS || 0,
            statusCountsFAT2.PROGRESS || 0,
            statusCountsEPR2.PROGRESS || 0,
            statusCountsPS2.PROGRESS || 0,
            statusCountsSHE2.PROGRESS || 0,
            statusCountsProjectManagement2.PROGRESS || 0,
            statusCountsMD2.PROGRESS || 0
        ]
    }, {
        name: 'CLOSE',
        data: [
            statusCountsHCGS2.CLOSE || 0,
            statusCountsFAT2.CLOSE || 0,
            statusCountsEPR2.CLOSE || 0,
            statusCountsPS2.CLOSE || 0,
            statusCountsSHE2.CLOSE || 0,
            statusCountsProjectManagement2.CLOSE || 0,
            statusCountsMD2.CLOSE || 0
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
        categories: ['HCGS', 'FAT', 'Eng, Port & Road', 'Plant & SM', 'SHE', 'Project Management','MD'],
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

    var chart = new ApexCharts(document.querySelector("#multiBarChart2"), options);
    chart.render();

</script>

<script>
    var statusCountsHCGS3 = {!! json_encode($statusCountsHCGS3) !!};
    var statusCountsFAT3 = {!! json_encode($statusCountsFAT3) !!};
    var statusCountsEPR3 = {!! json_encode($statusCountsEPR3) !!};
    var statusCountsPS3 = {!! json_encode($statusCountsEPR3) !!};
    var statusCountsSHE3 = {!! json_encode($statusCountsSHE3) !!};
    var statusCountsProjectManagement3 = {!! json_encode($statusCountsProjectManagement3) !!};
    var statusCountsMD3 = {!! json_encode($statusCountsMD3) !!};

    var options = {
        series: [{
        name: 'OPEN',
        data: [
            statusCountsHCGS3.OPEN || 0,
            statusCountsFAT3.OPEN || 0,
            statusCountsEPR3.OPEN || 0,
            statusCountsPS3.OPEN || 0,
            statusCountsSHE3.OPEN || 0,
            statusCountsProjectManagement3.OPEN || 0,
            statusCountsMD3.OPEN || 0
        ]
    }, {
        name: 'PROGRESS',
        data: [
            statusCountsHCGS3.PROGRESS || 0,
            statusCountsFAT3.PROGRESS || 0,
            statusCountsEPR3.PROGRESS || 0,
            statusCountsPS3.PROGRESS || 0,
            statusCountsSHE3.PROGRESS || 0,
            statusCountsProjectManagement3.PROGRESS || 0,
            statusCountsMD3.PROGRESS || 0
        ]
    }, {
        name: 'CLOSE',
        data: [
            statusCountsHCGS3.CLOSE || 0,
            statusCountsFAT3.CLOSE || 0,
            statusCountsEPR3.CLOSE || 0,
            statusCountsPS3.CLOSE || 0,
            statusCountsSHE3.CLOSE || 0,
            statusCountsProjectManagement3.CLOSE || 0,
            statusCountsMD3.CLOSE || 0
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
        categories: ['HCGS', 'FAT', 'Eng, Port & Road', 'Plant & SM', 'SHE', 'Project Management','MD'],
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

    var chart = new ApexCharts(document.querySelector("#multiBarChart3"), options);
    chart.render();

</script>


@endsection


