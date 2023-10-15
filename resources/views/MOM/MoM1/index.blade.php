@extends('layouts.app')
@section('title')
    SPUT - MoM
@endsection
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid bg-light ">
            @if (session('success'))
                <div class="alert alert-success mt-4">
                    {{session('success')}}
                </div>
            @endif
            <div class="row">
                <div class="col">
                    <h3 class="mt-4 text-success">Daily Meeting Lv 1</h3>
                </div>
            </div>
            <div class="row">
                @role('ADMIN')
                <div class="col-12 float-end">
                    <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Tambah Meeting
                    </button>

                    <!-- Modal Tambah Meeting-->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title text-center fs-5" id="exampleModalLabel">Tambah Meeting</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form action="{{route('MoM1.store')}}" id="submit-form" method="POST" enctype="multipart/form-data" class="row g-3 mt-2">
                                    @csrf
                                        <div class="col-6">
                                            <p class="fs-5 my-auto mx-auto">Judul</p>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control" name="judul" type="text" placeholder="Default input" aria-label="default input example">
                                        </div>
                                        <div class="col-6">
                                            <p class="fs-5 my-auto mx-auto">Tanggal</p>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control" id="date" name="tanggal" placeholder="MM/DD/YYY" type="date"/>
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
                  
                    @endrole

                    
                    
                </div>
          
           
            </div>
            <div class="row">
                <div class="card-body" style="overflow-x: auto;">
                    <table class="table" id="datatablesSimple">
                        <thead>
                            
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Judul</th>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Daftar Hadir</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        
                        </thead> 
                        <tbody>
                            @foreach($level1 as $item)
                            <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td class="text-center">{{$item->judul}}</td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}</td>
                                <td class="text-center">
                                    <button class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#exampleModalHadir{{$item->id}}">Lihat Daftar Hadir</button>
                                </td>
                                <td class="text-center">
                                    <a href="{{route('detail1.index',$item->id)}}"><img src="{{url('assets/icon/detail.png')}}" width="32" alt=""></a>
                                    @role('ADMIN')
                                    <a class="mx-1" href="#" data-bs-toggle="modal" data-bs-target="#exampleModalEdit-{{$item->id}}"><img src="{{url('assets/icon/edit.png')}}" width="32" alt=""></a>
                                    <form action="{{ route('MoM1.destroy', ['id' => $item->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="border: none; background: none"><img src="{{url('assets/icon/delete.png')}}" width="32" alt=""></button>
                                    </form>
                                    @endrole
                                </td>
                            </tr>
                            <!-- Modal Edit Meeting-->
                            <div class="modal fade" id="exampleModalEdit-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title text-center fs-5" id="exampleModalLabel">Edit Meeting</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <form action="{{route('MoM1.update',$item->id)}}" id="submit-form" method="POST" enctype="multipart/form-data" class="row g-3 mt-2">
                                            @csrf
                                            @method('PUT')
                                                <div class="col-6">
                                                    <p class="fs-5 my-auto mx-auto">Judul</p>
                                                </div>
                                                <div class="col-6">
                                                    <input class="form-control" name="judul" value="{{$item->judul}}" type="text" placeholder="Default input" aria-label="default input example">
                                                </div>
                                                <div class="col-6">
                                                    <p class="fs-5 my-auto mx-auto">Tanggal</p>
                                                </div>
                                                <div class="col-6">
                                                    <input class="form-control" id="date" name="tanggal" value="{{$item->tanggal}}" placeholder="MM/DD/YYY" type="date"/>
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
                            @role('ADMIN')
                            <!-- Modal Daftar Hadir Admin-->
                            <div class="modal fade" id="exampleModalHadir{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title text-center fs-5" id="exampleModalLabel">Rincian Daftar Hadir Pegawai</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <form action="{{route('daftarHadir1.store')}}" id="submit-form" method="POST" enctype="multipart/form-data" class="row g-3 mt-2">
                                                        @csrf
                                                        <div class="row" hidden>
                                                            <div class="col-6">
                                                                <p class="fs-5 my-auto mx-auto">Id Daftar Hadir</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <input class="form-control" id="id_daftar_hadir" name="id_daftar_hadir" type="text" value="{{$item->id}}" placeholder="Default input" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <p class="fs-5 my-auto mx-auto">Nama</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <input class="form-control" id="nama" name="nama" type="text" placeholder="Default input">
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col-6">
                                                                    <p class="fs-5 my-auto mx-auto">nrp</p>
                                                            </div>
                                                            <div class="col-6">
                                                                    <input class="form-control" id="nrp" name="nrp" placeholder="Masukan nrp" type="text"/>
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
                                            <div class="row mt-4">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <h5 class="text-center">No</h5>
                                                        </div>
                                                        <div class="col-4">
                                                            <h5 class="text-center">Nama</h5>
                                                        </div>
                                                        <div class="col-4">
                                                            <h5 class="text-center">NRP</h5>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <form action="{{route('daftarHadir1.update')}}" method="post">
                                                        @csrf
                                                        @method('put')
                                                    @foreach($item->daftar_hadir as $daftar_hadir)
                                                        <div class="row">
                                                            <input type="hidden" name="daftar_hadir_id[]" value="{{ $daftar_hadir->id }}">
                                                            <div class="col-4">
                                                                <p class="text-center">{{$loop->iteration}}</p>
                                                            </div>
                                                            <div class="col-4">
                                                                <p class="text-center">
                                                                    <input class="form-control w-80" name="nama_{{ $daftar_hadir->id }}"  value="{{$daftar_hadir->nama}}" readonly ondblclick="editInPlaceNama(this)">
                                                                    <p class="edit-message fs-6">Klik 2 kali untuk mengedit</p>
                                                                </p>
                                                            </div>
                                                            <div class="col-4">
                                                                <p class="text-center">
                                                                    <input class="form-control w-80" name="nrp_{{ $daftar_hadir->id }}"  value="{{$daftar_hadir->nrp}}" readonly ondblclick="editInPlaceNRP(this)">
                                                                    <p class="edit-message fs-6">Klik 2 kali untuk mengedit</p>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    
                                                        
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            @else
                            <!-- Modal Daftar Hadir User-->
                            <div class="modal fade" id="exampleModalHadir{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title text-center fs-5" id="exampleModalLabel">Rincian Daftar Hadir Pegawai</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row mt-4">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <h5 class="text-center">No</h5>
                                                        </div>
                                                        <div class="col-4">
                                                            <h5 class="text-center">Nama</h5>
                                                        </div>
                                                        <div class="col-4">
                                                            <h5 class="text-center">NRP</h5>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    @foreach($item->daftar_hadir as $item)
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <p class="text-center">{{$loop->iteration}}</p>
                                                            </div>
                                                            <div class="col-4">
                                                                <p class="text-center">{{$item->nama}}</p>
                                                            </div>
                                                            <div class="col-4">
                                                                <p class="text-center">{{$item->nrp}}</p>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                        
                                                </div>
                                            </div>      
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endrole
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>

@endsection

