@extends('layouts.app_pdf')
@section('title')
    SPUT - MoM 1 Detail PDF
@endsection
<link href=" {{url('css/styles.css')}} " rel="stylesheet" />

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
    <center><span class="minutes-of-meeting">MINUTES OF MEETING</span></center>
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
              <th class="col">PIC</th>
              <th class="col">DUE</th>
              <th class="col">Status</th>
            </tr>
            </thead>
            <tbody>
              @php
                  $iterationCount = 0;
              @endphp
              @foreach($details as $key => $detail)
              @if($detail->id_meeting == $item->id)
              @php
              $iterationCount++;
              @endphp
              <tr>
                <td>{{$iterationCount}}</th>
                <td class="text-center">
                    {{-- Displaying the title (assuming title and points are separated by newline) --}}
                    {{ $meetingDetails = explode("\n", $detail->point_of_meeting)[0] }}
                    <br>
                    {{-- Displaying points as a list without bullet points --}}
                    <ul style="list-style-type: none; padding-left: 0;">
                        @foreach(array_slice(explode("\n", $detail->point_of_meeting), 1) as $point)
                            <li>{{ trim($point) }}</li>
                        @endforeach
                    </ul>
                </td>
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