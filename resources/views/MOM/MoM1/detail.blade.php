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
                            {{$item->judul}}
                        </h2><br>
                        <h4 class="text-dark">
                            {{ \Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}
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
                                    <th class="col text-center">pic</th>
                                    <th class="col text-center">DUE</th>
                                    <th class="col text-center">Status</th>
                                    <th class="col text-center">Evidence</th>
                                    <th class="col text-center">Action</th>
                                    <th class="col text-center">Action</th>
                                </tr>
                            </thead>
                          
                            <tbody>
                                @if(count($details) > 0)
                                @foreach($details as $key => $detail)
                                    @if($detail->id_meeting_level_1 == $item->id)
                                    <tr>
                                        <td class="text-center"></td>
                                        <td class="text-center">{{$detail->point_of_meeting}}</td>
                                        <td class="text-center">{{$detail->pic}}</td>
                                        <td class="text-center">{{$detail->due}}</td>
                                        <td class="text-center">{{$detail->status}}</td>
                                        <td class="text-center">{{$key}}</td>
                                        <td>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModalEvidance{{$detail->id}}">
                                                <img src="https://media.istockphoto.com/id/499775926/id/foto/produksi-batubara-di-salah-satu-lapangan-terbuka.webp?s=1024x1024&w=is&k=20&c=Ymb8XaVLVyQHjJ8Yt5NaQASkvzb7tWSqluhc9sf9kb0=" alt="" width="200" class="img-thumbnail">
                                            </a>
                                        </td>
                                        <td>
                                            <a class="" href="#"><img src="{{url('assets/icon/edit.png')}}" width="32" alt=""></a>
                                            <a class="mx-1" href="#" data-bs-toggle="modal" data-bs-target="#exampleModalGambar{{$detail->id}}"><img src="{{url('assets/icon/gallery.png')}}" width="32" alt=""></a>
                                            <form action="{{route('detail1.destroy',$detail->id)}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" style="border: none; background: none">
                                                    <img src="{{url('assets/icon/delete.png')}}" width="32" alt="">
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endif
                                      <!-- Modal Evidance Edit-->
                                    <div class="modal fade" id="exampleModalGambar{{$detail->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title text-center fs-5" id="exampleModalLabel">Tambah gambar {{$detail->id}}</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <form action="{{route('detail1.store_evidance')}}" id="submit-form" method="POST" enctype="multipart/form-data" class="row g-3 mt-2">
                                                                @csrf
                                                                <div class="row" hidden>
                                                                    <div class="col-6">
                                                                        <p class="fs-5 my-auto mx-auto">Id Daftar Hadir</p>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input class="form-control" id="id" name="id_detaillvl1" type="text" value="{{$detail->id}}" placeholder="Default input" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <p class="fs-5 my-auto mx-auto">Nama</p>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input class="form-control" id="nama" name="nama_gambar" type="text" placeholder="Default input">
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-2">
                                                                    <div class="col-6">
                                                                            <p class="fs-5 my-auto mx-auto">Upload Evidance</p>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="file" class="form-control" id="inputGroupFile02" name="path_gambar">
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-3">
                                                                    <div class="col align-self-end">
                                                                        <button type="submit" class="btn btn-success float-end savebtn">Submit</button>
                                                                    </div> 
                                                                </div>     
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <h5>Nama</h5>
                                                        </div>
                                                        <div class="col-4">
                                                            <h5>Gambar</h5>
                                                        </div>
                                                        <div class="col-4">

                                                        </div>
                                                    </div>
                                                    <hr>
                                                    @foreach($detail->evidance_level_1 as $evidance)
                                                    <div class="row mt-4">
                                                        <div class="col-4">
                                                            <p>{{$evidance->nama_gambar}}</p>
                                                        </div>
                                                        <div class="col-4">
                                                            <img src="{{Storage::url($evidance->path_gambar)}}" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="col-4 text-end">
                                                            <form action="{{route('evidance1.destroy',$evidance->id)}}" method="POST">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" style="border: none; background: none">
                                                                    <img src="{{url('assets/icon/delete.png')}}" width="32" alt="">
                                                                </button>
                                                            </form>
                                                            
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    @endforeach
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal Evidance -->
                                    <div class="modal fade" id="exampleModalEvidance{{$detail->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title text-center fs-5" id="exampleModalLabel">Gambar Evidence {{$detail->id}} </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <div id="carouselExample" class="carousel slide">
                                                <div class="carousel-inner">
                                                        
                                                    <div class="carousel-item active">
                                                        <img src="https://upload.wikimedia.org/wikipedia/commons/9/92/The_death.png" class="d-block w-100" alt="...">
                                                 
                                                    </div>
                                                    @foreach($detail->evidance_level_1 as $img)
                                                    <div class="carousel-item">
                                                        <img src="{{ Storage::url($img->path_gambar) }}" class="d-block w-100" alt="...">
                                                    </div>
                                                    @endforeach
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
                                            </div>
                                        </div>
                                    </div>
                                @endforeach     
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
                            <form action="{{route('detail1.store')}}" method="post" class="row g-3" >
                                @csrf 
                                <div class="col-6 d-none">
                                    <input class="form-control" type="text" id="id" name="id" value="{{$item->id}}" placeholder="Default input" aria-label="default input example">
                                </div>
                                <div class="col-6">
                                    <p class="fs-5 my-auto mx-auto">Point Of Meeting</p>
                                </div>
                                <div class="col-6">
                                    <input class="form-control" type="text" id="point_of_meeting" name="point_of_meeting" placeholder="Default input" aria-label="default input example">
                                </div>
                                <div class="col-6">
                                    <p class="fs-5 my-auto mx-auto">pic</p>
                                </div>
                                <div class="col-6">
                                    <select id="pic" name="pic" class="form-select" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        @foreach($pic as $pic)
                                        <option value="{{$pic->pic}}">{{$pic->pic}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6">
                                    <p class="fs-5 my-auto mx-auto">DUE</p>
                                </div>
                                <div class="col-6">
                                    <input placeholder="Select date" id="due" name="due" type="date" id="example" class="form-control">
                                </div>
                                <div class="col-6">
                                    <p class="fs-5 my-auto mx-auto">Status</p>
                                </div>
                                <div class="col-6">
                                    <select id="status" name="status" class="form-select" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        @foreach($status as $status)
                                        <option value="{{$status->status}}">{{$status->status}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
                </div>

                
               
            </div>
        </section>
    </main>
</div>
@endsection

