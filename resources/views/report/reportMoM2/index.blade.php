@extends('layouts.app')
@section('title')
    SPUT - MoM 2 Reports
@endsection
@section('content')
<div id="layoutSidenav_content">
    <main>
        <!-- Section input  -->
        <section id="pantau-panjar">
            @if (session('failed'))
                <div class="alert alert-danger">
                    {{ session('failed') }}
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="container-fluid">
                <div class="row">
                    <div class="col my-4">
                        <h2 class="text-success">
                            Report Meeting Level 2
                        </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-4">
                    <div class="card">
                            <form action="{{route('MoM2.filter')}}" method="POST" id="filterForm">
                                @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <label class="ms-1" for="start-date">Start date</label>
                                        <input placeholder="Select date" id="due" name="startDate" type="date" id="example" class="form-control" required>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="ms-1" for="start-date">End date</label>
                                        <input placeholder="Select date" id="due" name="endDate" type="date" id="example" class="form-control" required>
                                    </div>
                                </div>
                                <button class="btn btn-outline-success mt-2 mb-2 px-3" style="float:right;">Filter</button>
                                <button class="btn btn-reset mt-2 mb-2 px-3" style="float:right;" type="reset">Reset</button>
                            </form>
                            <div class="clear-filter">
                                <a class="btn btn-reset mt-2" style="float:right;" href="{{route('MoM2.reports')}}">Clear Filter</a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-4 mb-2">  
                        <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Menu Export
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <form method="post" action="{{ route('MoM2.reportPDF') }}">
                                    @csrf
                                    <input placeholder="Select date" id="due" name="startDate" type="date" id="example" class="form-control d-none" value="{{$tanggalAwal}}">
                                
                                    <input placeholder="Select date" id="due" name="endDate" type="date" id="example" class="form-control d-none" value="{{$tanggalAkhir}}">
                                
                                    <button class="dropdown-item" type="submit">Export PDF</button>
                                </form>                                
                            </li>
                            <li>
                                <form method="post" action="{{ route('MoM2.reportExcel') }}">
                                    @csrf
                                    <input placeholder="Select date" id="due" name="startDate" type="date" id="example" class="form-control d-none" value="{{$tanggalAwal}}">
                                
                                    <input placeholder="Select date" id="due" name="endDate" type="date" id="example" class="form-control d-none" value="{{$tanggalAkhir}}">
                                
                                    <button class="dropdown-item" type="submit">Export Excel</button>
                                </form>    
                            </li>
                            <li>
                                <form method="post" action="{{ route('MoM2.reportWord') }}">
                                    @csrf
                                    <input placeholder="Select date" id="due" name="startDate" type="date" id="example" class="form-control d-none" value="{{$tanggalAwal}}">
                                
                                    <input placeholder="Select date" id="due" name="endDate" type="date" id="example" class="form-control d-none" value="{{$tanggalAkhir}}">
                                
                                    <button class="dropdown-item" type="submit">Export Word</button>
                                </form>  
                            </li>
                        </ul>
                    </div>
                    <div class="col-12" style="overflow-x: auto;">
                        <table id="datatablesSimple" class="table table-bordered border-light table-word">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th class="col text-center">Point Of Meeting</th>
                                    <th class="col text-center">pic</th>
                                    <th class="col text-center">DUE</th>
                                    <th class="col text-center">Status</th>
                                    <th class="col text-center">Evidence</th>              
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
                                        <td>
                                            @foreach($detail->evidance_level_2 as $gambarTabel)
                                            @if($loop->first)
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModalEvidance{{$detail->id}}">
                                                    <img src="{{ Storage::url($gambarTabel->path_gambar) }}" alt="" width="150" class="img-thumbnail">
                                                </a>
                                            @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                    <!-- Modal Evidance -->
                                    <div class="modal fade" id="exampleModalEvidance{{$detail->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-fullscreen">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title text-center fs-5" id="exampleModalLabel">Gambar Evidence </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <section aria-label="Newest Photos">
                                                        <div class="carousel" data-carousel>
                                                        <button class="carousel-button prev" data-carousel-button="prev">&#8656;</button>
                                                        <button class="carousel-button next" data-carousel-button="next">&#8658;</button>
                                                            <ul data-slides>
                                                            @foreach($detail->evidance_level_2 as $img)
                                                                <li class="slide" {{ $key == 0 ? 'data-active' : '' }}>
                                                                        <img src="{{Storage::url($img->path_gambar)}}" alt="Nature Image #1">
                                                                </li>
                                                            @endforeach
                                                            </ul>
                                                        </div>
                                                    </section>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach       
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
@endsection

