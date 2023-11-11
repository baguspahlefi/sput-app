@extends('layouts.app')
@section('title')
    SPUT - MoM 1 Reports
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
                            Report Meeting Level 1
                        </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-4">
                        <div class="card">
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
                                <button class="btn btn-outline-success mt-2 px-3" style="float:right;">Filter</button>
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
                            <li><a class="dropdown-item" href="#">Export PDF</a></li>
                            <li><a class="dropdown-item" href="#">Export Excel</a></li>
                            <li><a class="dropdown-item" href="#">Export Word</a></li>
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
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
@endsection

