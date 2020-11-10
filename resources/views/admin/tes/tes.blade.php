@extends('layouts.app')

@section('title')
    Admin - Hasil Tes
@endsection

@section('content')
    <div class="page-content">
        <div class="container">
            
            <div class="row">
                <a href="{{route('admin-data-user',['status'=>'all','year_id'=>0])}}" class="">
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
                                        <a href="{{route('admin-edit-tes',$data->id)}}" class="btn btn-success btn-edit-biodata btn-sm float-right ml-1">Edit</a>
                                </div>
                            </div>   
                        </div>
                        
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-2 mb-3">
                                        <img src="{{asset('storage/'.$data->user->biodata->gambar)}}" class="w-100 p-1 shadow">
                                    </div>
                                    <div class="col-12 col-md-5">
                                        <table class="w-100 mt-2">
                                            <tr>
                                                <td>Nomor Tes</td>
                                                <td>:</td>
                                                <td>{{$data->nomor_tes}}</td>
                                            </tr>
                                            <tr>
                                                <td>Tahun Akademik</td>
                                                <td>:</td>
                                                <td>{{$data->user->biodata->academic->academic_year}}</td>
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
                                            <tr>
                                                <td>Tes Membaca</td>
                                                <td>:</td>
                                                <td>@if($data->tes_baca) {{$data->tes_baca}} @else Siswa belum mengikuti Tes @endif</td>
                                            </tr>
                                            <tr>
                                                <td>Tes Menulis</td>
                                                <td>:</td>
                                                <td>@if($data->tes_tulis) {{$data->tes_tulis}} @else Siswa belum mengikuti Tes @endif</td>
                                            </tr>
                                            <tr>
                                                <td>Status Siswa</td>
                                                <td>:</td>
                                                <td>{{$data->user->biodata->status}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        @if($data->user->biodata->status == 'Diterima')
                                            <img class="w-100" src="{{asset('images/approv.png')}}" alt="">
                                        @elseif($data->user->biodata->status == 'Ditolak')
                                            <img class="w-100" src="{{asset('images/rejec.png')}}" alt="">
                                        @endif
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
                                <a href="{{route('admin-create-biodata',$id)}}" class="btn btn-primary btn-block">Isi Biodata</a>
                            </div>
                        </div>
                            
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection