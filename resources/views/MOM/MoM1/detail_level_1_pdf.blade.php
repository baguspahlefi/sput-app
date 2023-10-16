@extends('layouts.app_pdf')
@section('title')
    SPUT - MoM 1 Detail PDF
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

  th, td {
      padding: 5px;
      text-align: left;
  }
  body {
            text-align: center;
            margin-top: 100px;
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

        .container {
            text-align: center;
            margin-top: 100px;
        }

        .column {
            display: inline-block;
            width: 45%; /* Lebar kolom kiri dan kanan */
            vertical-align: top;
        }

        .left-column {
            text-align: right;
            padding-right: 20px;
        }

        .right-column {
            text-align: left;
            padding-left: 20px;
        }

        h1 {
            font-size: 36px;
            margin: 0;
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
    <center><span class="minutes-of-meeting">MINUTES OF MEETING</span></center>
    <center><hr></center>

    <div class="container">
      <div class="column left-column">
          <h5>MEETING TITLE:</h5>
          <p>Daily Meeting Level 1</p>
      </div>
      <div class="column right-column">
          <h5>AGENDA:</h5>
          <p>OPRENG Perform</p>
      </div>
    </div>
    
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
              @foreach($details as $key => $detail)
              @if($detail->id_meeting_level_1 == $item->id)
              <tr>
                <td>{{$loop->iteration}}</th>
                <td>{{$detail->point_of_meeting}}</td>
                <td>{{$detail->pic}}</td>
                <td>{{$detail->due}}</td>
                <td>{{$detail->status}}</td>
              </tr>
              @endif
              @endforeach
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