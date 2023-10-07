@extends('layouts.app')
@section('title')
    SPUT - MoM 1 Detail
@endsection
<style>
    /* CSS untuk menambahkan nomor urutan hanya pada baris yang memiliki data */
    /* CSS untuk menambahkan nomor urutan hanya pada baris yang memiliki data */
    table {
        counter-reset: rowNumber;
    }
    
    table tbody tr {
        counter-increment: rowNumber;
    }
    
    table tbody tr td:first-child::before {
        content: counter(rowNumber);
    }
    
</style>
@section('content')
<div id="layoutSidenav_content">
    <main>
        <!-- Section input  -->
        <section id="pantau-panjar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col my-4">
                        <h2 class="text-dark">
                            {{$items->judul}}
                        </h2><br>
                        <h4 class="text-dark">
                            {{ \Carbon\Carbon::parse($items->date)->format('d F Y') }}
                        </h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-4 mb-2">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Tambah Tabel
                        </button>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Export Excel
                        </button>
                    </div>
                    <div class="col-12" style="overflow-x: auto;">
                        <table id="datatablesSimple" class="table table-bordered border-light">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th class="col text-center">Point Of Meeting</th>
                                    <th class="col text-center">PIC</th>
                                    <th class="col text-center">DUE</th>
                                    <th class="col text-center">Status</th>
                                    <th class="col text-center">Evidence</th>
                                    <th class="col text-center">Action</th>
                                </tr>
                            </thead>
                          
                            <tbody>
                                @if(count($details) > 0)
                                @foreach($details as $key => $detail)
                                    @if($detail->id_meeting_level_1 == $items->id)
                                    <tr>
                                        <td class="text-center"></td>
                                        <td class="text-center">{{$detail->point_of_meeting}}</td>
                                        <td class="text-center">{{$detail->pic}}</td>
                                        <td class="text-center">{{ \Carbon\Carbon::parse($detail->due)->format('d F Y') }}</td>
                                        <td class="text-center">{{$detail->status}} </td>
                                        <td>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModalEvidance">
                                                <img src="https://media.istockphoto.com/id/499775926/id/foto/produksi-batubara-di-salah-satu-lapangan-terbuka.webp?s=1024x1024&w=is&k=20&c=Ymb8XaVLVyQHjJ8Yt5NaQASkvzb7tWSqluhc9sf9kb0=" alt="" width="200" class="img-thumbnail">
                                            </a>
                                        </td>
                                        <td>
                                            <a class="mx-1" href="#"><img src="{{url('assets/icon/edit.png')}}" width="32" alt=""></a>
                                            <a href="detail.html"><img src="{{url('assets/icon/delete.png')}}" width="32" alt=""></a>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                            @else
                                <tr>
                                    <td class="colspan-7"> Kosong </td>
                                </tr>
                            @endif
                            
                                
                            </tbody>
                        </table>
                    </div>
                </div>
        
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title text-center fs-5" id="exampleModalLabel">Tambah Tabel</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="row g-3">
                                <div class="col-6">
                                    <p class="fs-5 my-auto mx-auto">Point Of Meeting</p>
                                </div>
                                <div class="col-6">
                                    <input class="form-control" type="text" placeholder="Default input" aria-label="default input example">
                                </div>
                                <div class="col-6">
                                    <p class="fs-5 my-auto mx-auto">PIC</p>
                                </div>
                                <div class="col-6">
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <p class="fs-5 my-auto mx-auto">DUE</p>
                                </div>
                                <div class="col-6">
                                    <input placeholder="Select date" type="date" id="example" class="form-control">
                                </div>
                                <div class="col-6">
                                    <p class="fs-5 my-auto mx-auto">Status</p>
                                </div>
                                <div class="col-6">
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                </div>
                </div>

                <!-- Modal Evidance -->
                <div class="modal fade" id="exampleModalEvidance" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title text-center fs-5" id="exampleModalLabel">Gambar Evidence</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div id="carouselExample" class="carousel slide">
                                    <div class="carousel-inner">
                                      <div class="carousel-item active">
                                        <img src="data:image/jpeg;base64,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" class="d-block w-100" alt="...">
                                      </div>
                                      <div class="carousel-item">
                                        <img src="data:image/jpeg;base64,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" class="d-block w-100" alt="...">
                                      </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                      <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                      <span class="visually-hidden">Next</span>
                                    </button>
                                  </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success">Simpan</button>
                            </div>
                        </div>
                    </div>
                    </div>
               
            </div>
        </section>
    </main>
</div>
@endsection

