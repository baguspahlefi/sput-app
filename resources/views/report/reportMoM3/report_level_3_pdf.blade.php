@extends('layouts.app_pdf')
@section('title')
    SPUT - MoM 3 REPORT PDF
@endsection
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
<link href=" {{url('css/styles.css')}} " rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<style>
  table {
      width: 100%;
      border-collapse: collapse;
  }

  table, th, td {
      border: 1px solid black;
  }
  th{
    background-color: yellow;
  }

  th, td {
      padding: 5px;
      text-align: left;
  }
  body.tabel {
            text-align: center;
        }

        h1 {
            font-size: 36px;
            margin: 0;
        }

        hr {
            border: none;
            border-top: 1px solid #000;
            width: 80%;
            display: inline-block;
            margin: 20px 0;
        }

        .minutes-of-meeting {
            font-size: 18px;
            display: inline-block;
        }
        h1 {
            font-size: 36px;
            margin: 0;
            text-align: center;
        }

        p {
            font-size: 18px;
            margin: 0;
        }
</style>
@section('content')
<body onload="window.print();">
    <h1>PT. KALIMANTAN PRIMA PERSADA</h1>
    <center><hr></center>
    <center><span class="minutes-of-meeting">REPORTS MINUTES OF MEETING LEVEL 3</span></center>
    <center><hr></center>
    
  <div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>No</th>
              <th class="col">Point Of Meeting</th>
              <th class="col">pic</th>
              <th class="col">DUE</th>
              <th class="col">Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $key => $detail)
              <tr>
                  <td class="text-center">{{$loop->iteration}}</td>
                  <td class="text-center">{{$detail->point_of_meeting}}</td>
                  <td class="text-center">{{$detail->pic}}</td>
                  <td class="text-center">{{$detail->due}}</td>
                  <td class="text-center">{{$detail->status}}</td>
            @endforeach
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- ./wrapper -->
  </body>

  @endsection