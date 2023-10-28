

var options = {
    series: [{
    name: 'OPEN',
    data: [44, 55, 57, 56, 61, 58, 63, 60]
  }, {
    name: 'PROGRESS',
    data: [76, 85, 101, 98, 87, 150, 91, 114]
  }, {
    name: 'CLOSE',
    data: [35, 41, 36, 26, 45, 48, 52, 53]
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


