@extends('layouts.app')

@section('title')
    Admin - Edit Hasil Tes
@endsection

@section('content')
    <div class="page-content">
        <div class="container">
            
            <div class="row">
                <a href="{{route('admin-data-user','all')}}" class="">
                    <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-arrow-left-circle mb-3" fill="lightgrey" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path fill-rule="evenodd" d="M8.354 11.354a.5.5 0 0 0 0-.708L5.707 8l2.647-2.646a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708 0z"/>
                        <path fill-rule="evenodd" d="M11.5 8a.5.5 0 0 0-.5-.5H6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5z"/>
                    </svg>
                  </a>
                <div class="col-12 col-md-10 offset-md-1">
                    @if($data)
                    <div class="card">
                        <div class="card-header">

                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h5 class="m-0">
                                        Hasil Tes
                                    </h5>
                                </div>
                                <div class="col-md-6 badge-biodata text-right">    
                                        <a href="{{route('admin-edit-biodata',$data->id)}}" class="btn btn-success btn-edit-biodata btn-sm float-right ml-1">Edit</a>
                                </div>
                            </div>   
                        </div>
                        
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-2 mb-3">
                                        <img src="{{asset('storage/'.$data->user->biodata->gambar)}}" class="w-100 p-1 shadow">
                                    </div>
                                    <div class="col-12 col-md-10">
                                        <table class="w-50 mt-2">
                                            <tr>
                                                <td>Nomor Tes</td>
                                                <td>:</td>
                                                <td>{{$data->nomor_tes}}</td>
                                            </tr>
                                            <tr>
                                                <td>Nama</td>
                                                <td>:</td>
                                                <td>{{$data->user->biodata->nama}}</td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>:</td>
                                                <td>{{$data->user->email}}</td>
                                            </tr>
                                            <tr>
                                                <td>Nomor HP</td>
                                                <td>:</td>
                                                <td>{{$data->user->biodata->no_hp}}</td>
                                            </tr>
                                            <form action="{{route('admin-update-tes',$data->id)}}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                            <tr>
                                                <td>Tes Membaca</td>
                                                <td>:</td>
                                                <td>
                                                    <select name="tes_baca" id="">
                                                        <option disabled></option>
                                                        <option value="Sangat Baik">Sangat Baik</option>
                                                        <option value="Baik">Baik</option>
                                                        <option value="Kurang Baik">Kurang Baik</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tes Menulis</td>
                                                <td>:</td>
                                                <td>
                                                    <select name="tes_tulis" id="">
                                                        <option disabled></option>
                                                        <option value="Sangat Baik">Sangat Baik</option>
                                                        <option value="Baik">Baik</option>
                                                        <option value="Kurang Baik">Kurang Baik</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <td>:</td>
                                                <td>
                                                <select name="status" id="">
                                                    <option value="Belum Verifikasi">Belum Verifikasi</option>
                                                    <option value="Diterima">Diterima</option>
                                                    <option value="Ditolak">Ditolak</option>
                                                </select>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td colspan="3"> <br></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3"><button type="submit" class="btn btn-primary btn-block">Edit</button></td>
                                            </tr>
                                            </form>
                                        </table>
                                    </div>
                                </div>

                            </div>
                                    
                        @else
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mt-2">Hasil Tes</h5>
                            </div>
                            <div class="card-body text-center">
                                <img src="{{ asset('images/notfound.jpg') }}" class="m-3"/>
                                <h5 class="card-title text-primary">Siswa belum mengisi biodata</h5>
                                <a href="{{route('admin-data-user','all')}}" class="btn btn-primary btn-block">Isi Biodata</a>
                            </div>
                        </div>
                            
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection