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
                @role('ADMIN')
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
                                <form action="{{route('daftarHadir1.store')}}" id="submit-form" method="POST" enctype="multipart/form-data" class="row g-3 mt-2">
                                        @csrf
                                        <div class="col-6">
                                            <p class="fs-5 my-auto mx-auto">Id Daftar Hadir</p>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control" id="id_daftar_hadir" name="id_daftar_hadir" type="text" value="{{$item->id}}" placeholder="Default input" readonly>
                                        </div>
                                
                                        <div class="col-6">
                                            <p class="fs-5 my-auto mx-auto">Nama</p>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control" id="nama" name="nama" type="text" placeholder="Default input">
                                        </div>
                                        <div class="col-6">
                                            <p class="fs-5 my-auto mx-auto">NRP</p>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control" id="NRP" name="NRP" placeholder="Masukan NRP" type="text"/>
                                        </div>
                                        <div class="col align-self-end">
                                            <button type="submit" class="btn btn-success float-end savebtn">Submit</button>
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
                                            @foreach($item->daftar_hadir as $item)
                                                <tr>
                                                    <td class="text-center" class="text-center" scope="col">{{$loop->iteration}}</td>
                                                    <td class="text-center" scope="col">{{$item->nama}}<span><i class="fa fa-pencil pull-right"></i></span></td>
                                                    <td class="text-center" scope="col">{{$item->NRP}} <span><i class="fa fa-pencil pull-right"></i></span></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <div id="result"></div>
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
                                                @foreach($item->daftar_hadir as $item)
                                                <tr>
                                                    <td class="text-center" class="text-center" scope="col">{{$loop->iteration}}</td>
                                                    <td class="text-center" scope="col">{{$item->nama}}<span><i class="fa fa-pencil pull-right"></i></span></td>
                                                    <td class="text-center" scope="col">{{$item->NRP}} <span><i class="fa fa-pencil pull-right"></i></span></td>
                                                </tr>
                                            @endforeach
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
                            @foreach($level1 as $item)
                            <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td class="text-center">{{$item->judul}}</td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}</td>
                                <td class="text-center">
                                    <button class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#exampleModalHadir{{$item->id}}">Lihat Daftar Hadir {{$item->id}}</button>
                                </td>
                                <td class="text-center">
                                    <a href="{{route('detail.show',$item->id)}}"><img src="{{url('assets/icon/detail.png')}}" width="32" alt=""></a>
                                    @role('ADMIN')
                                    <a class="mx-1" href="#"><img src="{{url('assets/icon/edit.png')}}" width="32" alt=""></a>
                                    <a href="detail.html"><img src="{{url('assets/icon/delete.png')}}" width="32" alt=""></a>
                                    @endrole
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>

@endsection


<script type="text/javascript">

    $(document).ready(function(){

        var options = { 

            complete: function(response) 

            {    

	            if($.isEmptyObject(response.responseJSON.error)){

	            	$('#nama').val('');

	                $('#nrp').val('');

	            }else{

	                printErrorMsg(response.responseJSON.error);

	            }

            },

            error:function(response){

            	console.log(response);

            }

        };

        $('.savebtn').click(function(e) {

            e.preventDefault(); 

            $(this).parents("form").ajaxSubmit(options);

        });

        function printErrorMsg(msg) {

            $('.error-msg').find('ul').html('');

            $('.error-msg').css('display','block');

            $.each( msg, function( key, value ) {

                $(".error-msg").find("ul").append('<li>'+value+'</li>');

            });

        }

    });

</script>
