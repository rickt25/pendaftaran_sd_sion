@extends('layouts.app')

@section('title')
    Overview - Admin
@endsection

@section('content')
    <div class="page-content">
        <div class="container">
            <div class="row">
                <a href="/admin" class="" style="margin-left: 15px">
                    <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-arrow-left-circle mb-3" fill="lightgrey" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path fill-rule="evenodd" d="M8.354 11.354a.5.5 0 0 0 0-.708L5.707 8l2.647-2.646a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708 0z"/>
                        <path fill-rule="evenodd" d="M11.5 8a.5.5 0 0 0-.5-.5H6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5z"/>
                    </svg>
                </a>

                <div class="col-2" style="margin-left: 85px;">
                    <select id="year-selector" class="form-control" onchange="selectYear()">
                        @foreach ($akademik as $tahun)
                            <option value="{{$tahun->id}}" @if($tahun->id == $year) selected @endif>{{$tahun->academic_year}}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="row">
                <table class="table w-75 m-auto">
                    <thead>
                        <tr>
                            <th>Status Pendaftaran</th>
                            <th>Jumlah</th>
                            <th>Detail</th>
                            <th>PDF</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <!--<tr>
                            <td>Total Pendaftar</td>
                            <td> Siswa</td>
                            <td><a href=" class="btn btn-info btn-block">View Data</a></td>
                            <td><a href="/pdf" class="btn btn-primary btn-block">Print PDF</td>
                        </tr> -->
                        <tr>
                            <td>Siswa sudah verifikasi</td>
                            <td>{{$diterima + $ditolak}} Siswa</td>
                            <td><a href="{{route('view-all',$year)}}" class="btn btn-info btn-block">View Data</a></td>
                            <td><a href="{{route('download-pdf',$year)}}" class="btn btn-primary btn-block">Cetak Laporan</td>
                        </tr>
                        <tr>
                            <td>Diterima</td>
                            <td>{{$diterima}} Siswa</td>
                            <td><a href="{{route('view-diterima',$year)}}" class="btn btn-info btn-block">View Data</a></td>
                            <td><a href="{{route('diterima-pdf',$year)}}" class="btn btn-primary btn-block">Cetak Laporan</td>
                        </tr>
                        <tr>
                            <td>Ditolak</td>
                            <td>{{$ditolak}} Siswa</td>
                            <td><a href="{{route('view-ditolak',$year)}}" class="btn btn-info btn-block">View Data</a></td>
                            <td><a href="{{route('ditolak-pdf',$year)}}" class="btn btn-primary btn-block">Cetak Laporan</td>
                        </tr>
                    </tbody>


                </table>
            </div>
        </div>
    </div>
    </div>

    <script>
        function selectYear(){
            let yearForm = document.getElementById("year-selector")
            window.location.href = "/pendataan/"+ yearForm.value
        }
    </script>
@endsection