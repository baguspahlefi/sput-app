@extends('layouts.app')
@section('title')
    SPUT - Pengaturan Akun
@endsection
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid bg-light ">
            <div class="row">
                <div class="col">
                    <h3 class="mt-4 text-success">Pengaturan Akun</h3>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <div class="card-body" style="overflow-x: auto;">
                        <table class="table" id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th class="text-center">NRP</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Jabatan</th>
                                    <th class="text-center">Akses Menu</th>
                                </tr>
                            </thead> 
                            <tbody>
                                @foreach ($items as $item)
                                <tr>
                                    <td class="text-center">{{$item->NRP}}</td>
                                    <td class="text-center">{{$item->name}}</td>
                                    <td class="text-center">{{$item->roles->map->name->implode(', ')}}</td>
                                    <td class="text-center">
                                        <button class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#ModalAksesMenu-{{$item->id}}">Lihat Akses Menu {{$item->id}}</button>
                                    </td>
                                </tr>
                                  <!-- Modal Akses Menu-->
        <div class="modal fade" id="ModalAksesMenu-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title text-center fs-5" id="exampleModalLabel">Rincian Daftar Hadir Pegawai</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form action="{{route('pengaturanAkun.edit',$item->id)}}" id="submit-form" method="POST" enctype="multipart/form-data" class="row g-3 mt-2">
                            @csrf
                            <div class="col-6">
                                <p class="fs-5 my-auto mx-auto">Level 1</p>
                            </div>
                            <div class="col-6">
                                <h4>{{$item->id}}</h4>
                            </div>
                            <div class="col-6">
                                <p class="fs-5 my-auto mx-auto">Level 1</p>
                            </div>
                            <div class="col-6">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="1">
                                </div>
                            </div>
                    
                            <div class="col-6">
                                <p class="fs-5 my-auto mx-auto">Level 2</p>
                            </div>
                            <div class="col-6">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                </div>   
                            </div>
                            <div class="col-6">
                                <p class="fs-5 my-auto mx-auto">Level 3</p>
                            </div>
                            <div class="col-6">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                </div>  
                            </div>
                            <div class="col align-self-end">
                                <button type="submit" class="btn btn-success float-end savebtn">Submit</button>
                            </div>               
                        </form>        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
        </div>
      
    </main>
</div>
@endsection
