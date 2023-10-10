@extends('layouts.app')
@section('title')
    SPUT - Pengaturan Akun
@endsection
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid bg-light ">
            @if (session('flash_message_success'))
                <div class="alert alert-success mt-4">
                    {{session('flash_message_success')}}
                </div>
            @endif
            <div class="row">
             
                <div class="col">
                    <h3 class="mt-4 text-success">Pengaturan Akun</h3>
                </div>
                <div class="col-12">
                        <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Tambah Akun
                        </button>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <div class="card-body" style="overflow-x: auto;">
                        <table class="table" id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th class="text-center">nrp</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Jabatan</th>
                                    <th class="text-center">Edit Akses</th>
                                </tr>
                            </thead> 
                            <tbody>
                                @foreach ($items as $item)
                                <tr>
                                    <td class="text-center">{{$item->nrp}}</td>
                                    <td class="text-center">{{$item->name}}</td>
                                    <td class="text-center">{{$item->roles->map->name->implode(', ')}}</td>
                                    <td class="text-center">
                                        <a class="mx-1" href="#" data-bs-toggle="modal" data-bs-target="#ModalAksesMenu-{{$item->id}}"><img src="{{url('assets/icon/edit.png')}}" width="32" alt=""></a>
                                        <a href="detail.html"><img src="{{url('assets/icon/delete.png')}}" width="32" alt=""></a>
                                    </td>
                                </tr>
                                  <!-- Modal Akses Menu-->
                                <div class="modal fade" id="ModalAksesMenu-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title text-center fs-5" id="exampleModalLabel">Akses Akun</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form onsubmit="return handleData()" action="{{route('pengaturanAkun.update',$item->id)}}" id="submit-form" method="post" enctype="multipart/form-data" class="row g-3 mt-2">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <p class="fs-5 my-auto mx-auto">nrp</p>
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <input class="form-control" type="text" id="nrp" name="nrp" value="{{$item->nrp}}" aria-label="default input example">
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="fs-5 my-auto mx-auto">Nama Lengkap</p>
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <input class="form-control" type="text" id="nrp" name="name" value="{{$item->name}}" aria-label="default input example">
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="fs-5 my-auto mx-auto">Jabatan</p>
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <div class="input-group mb-3">
                                                                <select class="form-select border focus:border-primary rounded-md shadow-sm" id="inputGroupSelect02" name="pic">
                                                                    <option selected>{{$item->roles->map->name->implode(', ')}}</option>    
                                                                    @foreach($pic as $itempic)
                                                                    <option value="{{$itempic->pic}}">{{$itempic->pic}}</option>
                                                                    @endforeach  
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="fs-5 my-auto mx-auto">Akses MoM level 1</p>
                                                        </div>
                                                        <div class="col-6 mb-3 form-check form-switch">
                                                            <input id="toggle_value-{{$item->id}}" type="hidden" name="level1"  value="{{$item->level1}}">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault-{{$item->id}}" {{ $item->level1 == 1 ? 'checked' : '' }}>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="fs-5 my-auto mx-auto">Akses MoM level 2</p>
                                                        </div>
                                                        <div class="col-6 mb-3 form-check form-switch">
                                                            <input id="toggle_value-{{$item->id}}" type="hidden" name="level2"  value="{{$item->level2}}">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault-{{$item->id}}" {{ $item->level1 == 1 ? 'checked' : '' }}>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="fs-5 my-auto mx-auto">Akses MoM level 3</p>
                                                        </div>
                                                        <div class="col-6 mb-3 form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="1">
                                                        </div>
                                                    </div>
                                                   
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success float-end savebtn">Submit</button> 
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const toggleSwitch = document.getElementById('flexSwitchCheckDefault-{{$item->id}}');
                                        const hiddenInput = document.getElementById('toggle_value-{{$item->id}}');

                                        toggleSwitch.addEventListener('change', function() {
                                            if (this.checked) {
                                                hiddenInput.value = 1;
                                            } else {
                                                hiddenInput.value = 0;
                                            }
                                            console.log('Nilai toggle_value:', hiddenInput.value);
                                        });
                                    });
                                </script>
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






