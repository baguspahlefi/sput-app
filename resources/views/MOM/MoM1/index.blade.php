@extends('layouts.app')
@section('title')
    SPUT - MoM
@endsection
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid bg-light ">
            <div class="row">
                <div class="col">
                    <h3 class="mt-4 text-success">Daily Meeting Lv 1</h3>
                </div>
            </div>
            <div class="row">
                @role('admin')
                <div class="col-12 float-end">
                    <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Tambah Meeting
                    </button>

                    <!-- Modal Meeting-->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title text-center fs-5" id="exampleModalLabel">Tambah Meeting</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="row g-3">
                                        <div class="col-6">
                                            <p class="fs-5 my-auto mx-auto">Judul</p>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control" type="text" placeholder="Default input" aria-label="default input example">
                                        </div>
                                        <div class="col-6">
                                            <p class="fs-5 my-auto mx-auto">Tanggal</p>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"/>
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
                    @endrole

                    @role('admin')
                    <!-- Modal Daftar Hadir Admin-->
                    <div class="modal fade" id="exampleModalHadir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title text-center fs-5" id="exampleModalLabel">Rincian Daftar Hadir Pegawai</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="row mt-2 g-3">
                                        <div class="col-6">
                                            <p class="fs-5 my-auto mx-auto">Nama</p>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control" type="text" placeholder="Default input" aria-label="default input example">
                                        </div>
                                        <div class="col-6">
                                            <p class="fs-5 my-auto mx-auto">NIP</p>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control" id="text" name="NIP" placeholder="Masukan NIP" type="text"/>
                                        </div>
                                        <div class="col align-self-end">
                                            <button type="button" class="btn btn-success float-end ">Submit</button>
                                        </div>
                                                    
                                    </form>
                                    <div class="container" style="margin-top: 50px;">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" scope="col">No</th>
                                                    <th class="text-center" scope="col">Nama</th>
                                                    <th class="text-center" scope="col">NIP</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center" class="text-center" scope="col">1</td>
                                                    <td class="text-center" scope="col">Jordan Al muttadlo <span><i class="fa fa-pencil pull-right"></i></span></td>
                                                    <td class="text-center" scope="col">231124121231 <span><i class="fa fa-pencil pull-right"></i></span></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center" class="text-center" scope="col">1</td>
                                                    <td class="text-center" scope="col">Jordan Al muttadlo <span><i class="fa fa-pencil pull-right"></i></span></td>
                                                    <td class="text-center" scope="col">231124121231 <span><i class="fa fa-pencil pull-right"></i></span></td>
                                                </tr>
                                                    <tr>
                                                    <td class="text-center" class="text-center" scope="col">1</td>
                                                    <td class="text-center" scope="col">Jordan Al muttadlo <span><i class="fa fa-pencil pull-right"></i></span></td>
                                                    <td class="text-center" scope="col">231124121231 <span><i class="fa fa-pencil pull-right"></i></span></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center" class="text-center" scope="col">1</td>
                                                    <td class="text-center" scope="col">Jordan Al muttadlo <span><i class="fa fa-pencil pull-right"></i></span></td>
                                                    <td class="text-center" scope="col">231124121231 <span><i class="fa fa-pencil pull-right"></i></span></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center" class="text-center" scope="col">1</td>
                                                    <td class="text-center" scope="col">Jordan Al muttadlo <span><i class="fa fa-pencil pull-right"></i></span></td>
                                                    <td class="text-center" scope="col">231124121231 <span><i class="fa fa-pencil pull-right"></i></span></td>
                                                </tr>
                                                    <tr>
                                                    <td class="text-center" class="text-center" scope="col">1</td>
                                                    <td class="text-center" scope="col">Jordan Al muttadlo <span><i class="fa fa-pencil pull-right"></i></span></td>
                                                    <td class="text-center" scope="col">231124121231 <span><i class="fa fa-pencil pull-right"></i></span></td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    @else
                    <!-- Modal Daftar Hadir User-->
                    <div class="modal fade" id="exampleModalHadir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title text-center fs-5" id="exampleModalLabel">Rincian Daftar Hadir Pegawai</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container" style="margin-top: 50px;">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" scope="col">No</th>
                                                    <th class="text-center" scope="col">Nama</th>
                                                    <th class="text-center" scope="col">NIP</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center" class="text-center" scope="col">1</td>
                                                    <td class="text-center" scope="col">Jordan Al muttadlo</td>
                                                    <td class="text-center" scope="col">231124121231</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center" class="text-center" scope="col">1</td>
                                                    <td class="text-center" scope="col">Jordan Al muttadlo</td>
                                                    <td class="text-center" scope="col">231124121231</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center" class="text-center" scope="col">1</td>
                                                    <td class="text-center" scope="col">Jordan Al muttadlo</td>
                                                    <td class="text-center" scope="col">231124121231</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>      
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
                            <tr>
                                <td class="text-center">1</td>
                                <td class="text-center">Contoh Judul Meeting 1</td>
                                <td class="text-center">30 September 2023</td>
                                <td class="text-center">
                                    <button class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#exampleModalHadir">Lihat Daftar Hadir</button>
                                </td>
                                <td class="text-center">
                                    <a href="{{route('detail')}}"><img src="{{url('assets/icon/detail.png')}}" width="32" alt=""></a>
                                    @role('admin')
                                    <a class="mx-1" href="#"><img src="{{url('assets/icon/edit.png')}}" width="32" alt=""></a>
                                    <a href="detail.html"><img src="{{url('assets/icon/delete.png')}}" width="32" alt=""></a>
                                    @endrole
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">1</td>
                                <td class="text-center">Contoh Judul Meeting 1</td>
                                <td class="text-center">30 September 2023</td>
                                <td class="text-center">
                                    <button class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#exampleModalHadir">Lihat Daftar Hadir</button>
                                </td>
                                <td class="text-center">
                                    <a href="{{route('detail')}}"><img src="{{url('assets/icon/detail.png')}}" width="32" alt=""></a>
                                    @role('admin')
                                    <a class="mx-1" href="#"><img src="{{url('assets/icon/edit.png')}}" width="32" alt=""></a>
                                    <a href="detail.html"><img src="{{url('assets/icon/delete.png')}}" width="32" alt=""></a>
                                    @endrole
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">1</td>
                                <td class="text-center">Contoh Judul Meeting 1</td>
                                <td class="text-center">30 September 2023</td>
                                <td class="text-center">
                                    <button class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#exampleModalHadir">Lihat Daftar Hadir</button>
                                </td>
                                <td class="text-center">
                                    <a href="{{route('detail')}}"><img src="{{url('assets/icon/detail.png')}}" width="32" alt=""></a>
                                    @role('admin')
                                    <a class="mx-1" href="#"><img src="{{url('assets/icon/edit.png')}}" width="32" alt=""></a>
                                    <a href="detail.html"><img src="{{url('assets/icon/delete.png')}}" width="32" alt=""></a>
                                    @endrole
                                </td>
                            </tr>
                      
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection

