@extends('layouts.app')

@section('title')
    Admin - Biodata
@endsection

@section('content')
    <div class="page-content">
        <div class="container">
            <a href="{{route('admin-data-user',['status'=>'all','year_id'=>0])}}" class="">
                <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-arrow-left-circle mb-3" fill="lightgrey" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path fill-rule="evenodd" d="M8.354 11.354a.5.5 0 0 0 0-.708L5.707 8l2.647-2.646a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708 0z"/>
                    <path fill-rule="evenodd" d="M11.5 8a.5.5 0 0 0-.5-.5H6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5z"/>
                </svg>
              </a>
            <div class="row">
                <div class="col-12 col-md-10 offset-md-1">
                    @if($data->biodata)
                    <div class="card">
                        <div class="card-header">

                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h5 class="m-0">
                                        Biodata {{$data->name}}
                                    </h5>
                                </div>
                                <div class="col-md-6 badge-biodata text-right">
                                    <form method="post" action="{{route('admin-delete-biodata',$data->id)}}">
                                        @csrf
                                        @method('DELETE')
                                    <span class="badge
                                        @if($data->biodata->status == 'Diterima') badge-success
                                        @elseif($data->biodata->status == 'Ditolak') badge-danger
                                        @elseif($data->biodata->status == 'Belum Verifikasi') badge-secondary 
                                        @endif"
                                    >
                                        Status siswa : {{$data->biodata->status}}
                                    </span>

                                    
                                        <button type="submit" onclick="return confirm('Delete data?');" class="btn btn-danger btn-edit-biodata btn-sm float-right ml-1">Delete</button>
                                        <a href="{{route('admin-edit-biodata',$data->id)}}" class="btn btn-success btn-edit-biodata btn-sm float-right ml-1">Edit</a>
                                    </form>
                                </div>
                            </div>   
                        </div>
                        
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-2 mb-3">
                                        <img src="@if (!$data->biodata->gambar){{asset('images/profile.jpg')}} @else {{asset('storage/'.$data->biodata->gambar)}} @endif" class="w-100 p-1 shadow">
                                    </div>
                                    <div class="col-12 col-md-10"> 
                                        <div class="table-responsive">
                                            <table class="table-borderless">
                                                <tr>
                                                <td class="w-25">Nama Lengkap</td>
                                                <td>:</td>
                                                <td>{{$data->biodata->nama}}</td>
                                                </tr>
                                        
                                                <tr>
                                                <td>Jenis Kelamin</td>
                                                <td>:</td>
                                                <td>{{$data->biodata->jenis_kelamin}}</td>
                                                </tr>
                                        
                                                <tr>
                                                <td>Tempat, Tanggal Lahir</td>
                                                <td>:</td>
                                                <td>{{$data->biodata->tempat_lahir}}, {{$data->biodata->tanggal_lahir}}</td>
                                                </tr>
                                        
                                                <tr>
                                                <td>Agama</td>
                                                <td>:</td>
                                                <td>{{$data->biodata->agama}}</td>
                                                </tr>
                                                
                                                <tr>
                                                <td>Kewarganegaraan</td>
                                                <td>:</td>
                                                <td>{{$data->biodata->kewarganegaraan}}</td>
                                                </tr>
                                                
                                                <tr>
                                                <td>Jumlah Saudara</td>
                                                <td>:</td>
                                                <td>{{$data->biodata->jml_saudara}}</td>
                                                </tr>
                                                
                                                <tr>
                                                <td>Berat Badan</td>
                                                <td>:</td>
                                                <td>{{$data->biodata->berat_badan}}</td>
                                                </tr>
                                                
                                                <tr>
                                                <td>Tinggi Badan</td>
                                                <td>:</td>
                                                <td>{{$data->biodata->tinggi_badan}}</td>
                                                </tr>
                                                
                                                <tr>
                                                <td>Golongan darah</td>
                                                <td>:</td>
                                                <td>{{$data->biodata->goldar}}</td>
                                                </tr>
                                                
                                                <tr>
                                                <td>Alamat</td>
                                                <td>:</td>
                                                <td>{{$data->biodata->alamat}}</td>
                                                </tr>
                                                
                                                <tr>
                                                <td>Nomor HP</td>
                                                <td>:</td>
                                                <td>{{$data->biodata->no_hp}}</td>
                                                </tr>
                                
                                                <tr>
                                                <td colspan="3"><hr></td>
                                                </tr>

                                                <tr>
                                                <td>Tahun Akademik</td>
                                                <td>:</td>
                                                <td>{{$data->biodata->academic->academic_year}}</td>
                                                </tr>

                                                <tr>
                                                <td colspan="3"><hr></td>
                                                </tr>
                                
                                                <tr>
                                                <td>Nama Ayah</td>
                                                <td>:</td>
                                                <td>{{$data->biodata->nama_ayah}}</td>
                                                </tr>
                                
                                                <tr>
                                                <td>Pendidikan Terakhir Ayah</td>
                                                <td>:</td>
                                                <td>{{$data->biodata->pendidikan_ayah}}</td>
                                                </tr>
                                
                                                <tr>
                                                <td>Pekerjaan Ayah</td>
                                                <td>:</td>
                                                <td>{{$data->biodata->pekerjaan_ayah}}</td>
                                                </tr>
                                
                                                <tr>
                                                <td colspan="3"><hr></td>
                                                </tr>
                                
                                                <tr>
                                                <td>Nama Ibu</td>
                                                <td>:</td>
                                                <td>{{$data->biodata->nama_ibu}}</td>
                                                </tr>
                                
                                                <tr>
                                                <td>Pendidikan Terakhir Ibu</td>
                                                <td>:</td>
                                                <td>{{$data->biodata->pendidikan_ibu}}</td>
                                                </tr>
                                
                                                <tr>
                                                <td>Pekerjaan Ibu</td>
                                                <td>:</td>
                                                <td>{{$data->biodata->pekerjaan_ibu}}</td>
                                                </tr>
                                
                                                <tr>
                                                <td colspan="3"><hr></td>
                                                </tr>
                                
                                                <tr>
                                                <td>Nama Wali</td>
                                                <td>:</td>
                                                <td>{{$data->biodata->wali}}</td>
                                                </tr>
                                
                                                <tr>
                                                <td>Pendidikan Terakhir Wali</td>
                                                <td>:</td>
                                                <td>{{$data->biodata->pendidikan_wali}}</td>
                                                </tr>
                                
                                                <tr>
                                                <td>Pekerjaan Wali</td>
                                                <td>:</td>
                                                <td>{{$data->biodata->pekerjaan_wali}}</td>
                                                </tr>

                                                <tr>
                                                    <td colspan="3"><hr></td>
                                                </tr>
                                                
                                                <tr>
                                                <td>Akte Kelahiran</td>
                                                <td>:</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#akte">
                                                        Lihat data
                                                    </button>    
                                                </td>
                                                </tr>

                                                <tr>
                                                <td>Kartu Keluarga</td>
                                                <td>:</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#kk">
                                                        Lihat data
                                                    </button>     
                                                </td>
                                                </tr>

                                            </table>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="akte" tabindex="-1" aria-labelledby="akte" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">                            
                                        <div class="modal-body">
                                            <img src="{{asset('storage/'.$data->biodata->akte)}}" style="width:100%; height:100%;" alt="">
                                        </div>                            
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="kk" tabindex="-1" aria-labelledby="kk" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">                            
                                        <div class="modal-body">
                                            <img src="{{asset('storage/'.$data->biodata->kk)}}"  style="width:100%; height:100%;" alt="">
                                        </div>                            
                                    </div>
                                </div>
                            </div>
                        @else
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mt-2">Biodata {{$data->name}}</h5>
                            </div>
                            <div class="card-body text-center">
                                <img src="{{ asset('images/notfound.jpg') }}" class="m-3"/>
                                <h5 class="card-title text-primary">Biodata belum diisi</h5>
                                <a href="{{route('admin-create-biodata',$data->id)}}" class="btn btn-primary btn-block">Isi Biodata</a>
                            </div>
                        </div>
                            
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection