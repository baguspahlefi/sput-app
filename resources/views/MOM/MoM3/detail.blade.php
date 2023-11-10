@extends('layouts.app')
@section('title')
    SPUT - MoM 3 Detail
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
                        @role('ADMIN')
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Tambah Tabel
                        </button>

                        <button type="button" class="btn btn-success" style="float: right" data-bs-toggle="modal" data-bs-target="#exampleModalImport">
                            Import Excel
                        </button>

                         <!-- Modal Import Excel -->
                         <div class="modal fade" id="exampleModalImport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form method="post" action="{{route('MoM3.uploadExcel',$item->id)}}" enctype="multipart/form-data">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                                        </div>
                                        <div class="modal-body">
                 
                                            {{ csrf_field() }}
                 
                                            <label>Pilih file excel</label>
                                            <div class="form-group">
                                                <input type="file" name="file" required="required">
                                            </div>
                 
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Import</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                          
                        <a class="btn btn-success me-2" style="float: right" href="{{route('MoM3.formatExcel',$item->id)}}">
                            Download Format
                        </a>
                        @endrole
                        <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Menu Export
                        </button>
                        <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="{{route('MoM3.cetakPdf',$item->id)}}">Export PDF</a></li>
                              <li><a class="dropdown-item" href="{{route('MoM3.cetakExcel',$item->id)}}">Export Excel</a></li>
                              <li><a class="dropdown-item" href="{{route('MoM3.cetakWord',$item->id)}}">Export Word</a></li>
                        </ul>
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
                                    <th class="col text-center">Aksi</th>
                    
                                </tr>
                            </thead>
                          
                            <tbody>
                                @if(count($details) > 0)
                                @foreach($details as $key => $detail)
                                    @if($detail->id_meeting == $item->id)
                                    <tr>
                                        <td class="text-center"></td>
                                        <td class="text-center">{{$detail->point_of_meeting}}</td>
                                        <td class="text-center">{{$detail->pic}}</td>
                                        <td class="text-center">{{$detail->due}}</td>
                                        <td class="text-center">{{$detail->status}}</td>
                                        <td>
                                            @foreach($detail->evidance_level_3 as $gambarTabel)
                                            @if($loop->first)
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModalEvidance{{$detail->id}}">
                                                    <img src="{{ Storage::url($gambarTabel->path_gambar) }}" alt="" width="200" class="img-thumbnail">
                                                </a>
                                            @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            <a class="" href="#" data-bs-toggle="modal" data-bs-target="#exampleModalEdit-{{$detail->id}}"><img src="{{url('assets/icon/edit.png')}}" width="32" alt=""></a>
                                            <a class="ms-1" href="#" data-bs-toggle="modal" data-bs-target="#exampleModalGambar{{$detail->id}}"><img src="{{url('assets/icon/gallery.png')}}" width="32" alt=""></a>
                                            @role('ADMIN')
                                            <form class="d-inline" action="{{route('detail3.destroy',$detail->id)}}" method="POST" onsubmit="return confirm('Apakah anda yakin menghapusnya?')>
                                                @csrf
                                                @method('delete')
                                                <button type="submit" style="border: none; background: none">
                                                    <img src="{{url('assets/icon/delete.png')}}" width="32" alt="">
                                                </button>
                                            </form>
                                            @endrole
                                        </td>
                                    </tr>
                                    @endif
                                    @role('ADMIN')
                                     <!-- Modal Edit Meeting Admin-->
                                    <div class="modal fade" id="exampleModalEdit-{{$detail->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title text-center fs-5" id="exampleModalLabel">Tambah Tabel</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('detail3.update',$detail->id)}}" method="post" class="row g-3" >
                                                        @csrf 
                                                        @method('PUT')
                                                        <div class="col-6 d-none">
                                                            <input class="form-control" type="text" id="id" name="id" value="{{$item->id}}" placeholder="Default input" aria-label="default input example">
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="fs-5 my-auto mx-auto">Point Of Meeting</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <textarea class="form-control" id="point_of_meeting" name="point_of_meeting" aria-label="With textarea" required>{{$detail->point_of_meeting}}</textarea>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="fs-5 my-auto mx-auto">pic</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <select id="pic" name="pic" value="{{$detail->pic}}" class="form-select" aria-label="Default select example" required>
                                                                <option selected>{{$detail->pic}}</option>
                                                                @foreach($pic as $picEdit)
                                                                <option value="{{$picEdit->pic}}">{{$picEdit->pic}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="fs-5 my-auto mx-auto">DUE</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <input placeholder="Select date" id="due" name="due" value="{{$detail->due}}" type="date" id="example" class="form-control" required>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="fs-5 my-auto mx-auto">Status</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <select id="status" name="status" value="{{$detail->status}}" class="form-select" aria-label="Default select example" required>
                                                                <option selected>{{$detail->status}}</option>
                                                                @foreach($status as $statusEdit)
                                                                <option value="{{$statusEdit->status}}">{{$statusEdit->status}}</option>
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
                                    @endrole
                                     <!-- Modal Edit Meeting User-->
                                     <div class="modal fade" id="exampleModalEdit-{{$detail->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title text-center fs-5" id="exampleModalLabel">Edit Tabel</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('detail3.update',$detail->id)}}" method="post" class="row g-3" >
                                                        @csrf 
                                                        @method('PUT')
                                                        <div class="col-6 d-none">
                                                            <input class="form-control" type="text" id="id" name="id" value="{{$item->id}}" placeholder="Default input" aria-label="default input example">
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="fs-5 my-auto mx-auto">Point Of Meeting</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <textarea class="form-control" aria-label="With textarea" id="point_of_meeting" name="point_of_meeting" required>{{$detail->point_of_meeting}}</textarea>
                                                        </div>
                                                        <div class="col-6 d-none">
                                                            <p class="fs-5 my-auto mx-auto">pic</p>
                                                        </div>
                                                        <div class="col-6 d-none">
                                                            <select id="pic" name="pic" value="{{$detail->pic}}" class="form-select" aria-label="Default select example">
                                                                <option selected>{{$detail->pic}}</option>
                                                                @foreach($pic as $picEdit)
                                                                <option value="{{$picEdit->pic}}">{{$picEdit->pic}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-6 d-none">
                                                            <p class="fs-5 my-auto mx-auto">DUE</p>
                                                        </div>
                                                        <div class="col-6 d-none">
                                                            <input placeholder="Select date" id="due" name="due" value="{{$detail->due}}" type="date" id="example" class="form-control">
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="fs-5 my-auto mx-auto">Status</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <select id="status" name="status" value="{{$detail->status}}" class="form-select" aria-label="Default select example">
                                                                <option selected>{{$detail->status}}</option>
                                                                @foreach($status as $statusEdit)
                                                                <option value="{{$statusEdit->status}}">{{$statusEdit->status}}</option>
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
                                      <!-- Modal Evidance Edit-->
                                    <div class="modal fade" id="exampleModalGambar{{$detail->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title text-center fs-5" id="exampleModalLabel">Tambah gambar</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <form action="{{route('detail3.store_evidance')}}" id="submit-form" method="POST" enctype="multipart/form-data" class="row g-3 mt-2">
                                                                @csrf
                                                                <div class="row" hidden>
                                                                    <div class="col-6">
                                                                        <p class="fs-5 my-auto mx-auto">Id Daftar Hadir</p>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input class="form-control" id="id" name="id_detaillvl3" type="text" value="{{$detail->id}}" placeholder="Default input" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <p class="fs-5 my-auto mx-auto">Nama</p>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input class="form-control" id="nama" name="nama_gambar" type="text" placeholder="Default input" required>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-2">
                                                                    <div class="col-6">
                                                                            <p class="fs-5 my-auto mx-auto">Upload Evidance</p>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="file" class="form-control" id="inputGroupFile02" name="path_gambar" >
                                                                        <span><p class="text-danger fs-6">Pastikan ukuran tidak lebih dari 5Mb dan format gambar harus png ,jpg dan jpeg</p></span>
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
                                                    @foreach($detail->evidance_level_3 as $evidance)
                                                    <div class="row mt-4">
                                                        <div class="col-4">
                                                            <p>{{$evidance->nama_gambar}}</p>
                                                        </div>
                                                        <div class="col-4">
                                                            <img src="{{Storage::url($evidance->path_gambar)}}" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="col-4 text-end">
                                                            <form action="{{route('evidance3.destroy',$evidance->id)}}" method="POST">
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
                                                            @foreach($detail->evidance_level_3 as $img)
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
                                @endif   
                            </tbody>
                        </table>
                    </div>
                </div>
        
                <!-- Modal Tambah Meeting -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title text-center fs-5" id="exampleModalLabel">Tambah Tabel</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('detail3.store')}}" method="post" class="row g-3" >
                                    @csrf 
                                    <div class="col-6 d-none">
                                        <input class="form-control" type="text" id="id" name="id" value="{{$item->id}}" placeholder="Default input" aria-label="default input example" required>
                                    </div>
                                    <div class="col-6">
                                        <p class="fs-5 my-auto mx-auto">Point Of Meeting</p>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group">
                                            <textarea class="form-control" id="point_of_meeting" name="point_of_meeting" aria-label="With textarea"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <p class="fs-5 my-auto mx-auto">pic</p>
                                    </div>
                                    <div class="col-6">
                                        <select id="pic" name="pic" class="form-select" aria-label="Default select example" required>
                                            @foreach($pic as $pic)
                                            <option value="{{$pic->pic}}">{{$pic->pic}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <p class="fs-5 my-auto mx-auto">DUE</p>
                                    </div>
                                    <div class="col-6">
                                        <input placeholder="Select date" id="due" name="due" type="date" id="example" class="form-control" required>
                                    </div>
                                    <div class="col-6">
                                        <p class="fs-5 my-auto mx-auto">Status</p>
                                    </div>
                                    <div class="col-6">
                                        <select id="status" name="status" class="form-select" aria-label="Default select example" required>
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

