@extends('layouts.admin')
@section('content')
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="main-sparkline8-hd">
    <br>
<div class="sparkline8-graph">
<center><h2>Dashboard</h2></center>
<hr>
Selamat Datang di Halaman Admin Perpustakaan SMPN 2 DAYEUHKOLOT.
<hr>
<h4>Statistik Penulis</h4>
<canvas id="barChart" width=50px height=15px></canvas>
</div>
</div>
</div>
</div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/Chart.min.js') }}"></script>
<script>
  // Get context with jQuery - using jQuery's .get() method.
  var data = {
  labels: {!! json_encode($authors) !!},
  datasets: [{
  label: 'Jumlah buku',
  data: {!! json_encode($books) !!},
  backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
  ],
  borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
  ],
  borderWidth: 1
  }]
  };
  var options = {
  scales: {
  yAxes: [{
  ticks: {
  beginAtZero: true,
  stepSize: 1
  }
  }]
  },
  legend: {
  display: false
  },
  elements: {
  point: {
  radius: 0
  }
  }

  };
 
  var barChartCanvas = $("#barChart").get(0).getContext("2d");
  var barChart = new Chart(barChartCanvas, {
  type: 'bar',
  data: data,
  options: options
  });
</script>
@endsection