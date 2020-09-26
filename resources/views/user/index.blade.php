@extends('layouts.app')

@section('title')
    Menu - User
@endsection

@section('content')
    <!-- Button group -->
    <div class="page-content">
        <div class="container">
            
            <div class="row  justify-content-center">
                
                    {{-- @if(!Auth::user()->biodata)
                    Isi Biodata terlebih dahulu untuk dapat mengikuti Tes membaca dan menulis.
                    @elseif(Auth::user()->biodata)
                    Download Kartu Tes dan Lakukan Tes di SD Sion (09:00 - 12:00) Senin-Sabtu
                    @elseif(Auth::user()->biodata->status == 'Diterima' || Auth::user()->biodata->status == 'Ditolak')
                    Siswa {{Auth::user()->biodata->status}} di SD Swasta Sion dengan hasil tes membaca '{{Auth::user()->tes->tes_baca}}'' dan tes menulis '{{Auth::user()->tes->tes_tulis}}'.
                    @endif --}}
                    @if(!Auth::user()->biodata)
                        <div class="alert alert-info" style="width:81%">
                            Isi Biodata terlebih dahulu untuk dapat mengikuti Tes Membaca dan Menulis
                        </div>
                    @endif
                
                    @if(Auth::user()->biodata)
                        @if(Auth::user()->biodata->status == 'Belum Verifikasi')
                        <div class="alert alert-success" style="width:81%">
                            Download Kartu Tes dan Lakukan Tes di SD Sion (09:00 - 12:00) Senin-Sabtu
                        </div>
                        @else
                        <div class="alert  @if (Auth::user()->biodata->status == 'Diterima') alert-success @else alert-danger @endif" style="width:81%">
                            Siswa {{Auth::user()->biodata->status}} di SD Swasta Sion dengan hasil tes membaca '{{Auth::user()->tes->tes_baca}}'' dan tes menulis '{{Auth::user()->tes->tes_tulis}}'.
                        </div>
                        @endif
                    @endif
            </div>
            
        <div class="row justify-content-center">
            
            <div class="card-deck">
                <a href="{{ route('user-biodata',Auth::user()->id) }}" class="text-decoration-none">
                    <div class="card text-center p-3" style="width: 18rem;">
                        <svg width="5em" height="5em" viewBox="0 0 16 16" class="bi bi-card-text m-auto" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                            <path fill-rule="evenodd" d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                          </svg>
                        <div class="card-body p-0">
                        <h5 class="card-title m-0">Isi Biodata</h5>
                        <p class="card-text">Lengkapi data diri siswa</p>
                        </div>
                    </div>
                </a>

                <a href="{{route('change')}}" class="text-decoration-none">
                    <div class="card text-center p-3" style="width: 18rem;">
                        <svg width="5em" height="5em" style="padding:0.5em" viewBox="0 0 16 16" class="bi bi-gear m-auto" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z"/>
                            <path fill-rule="evenodd" d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z"/>
                          </svg>
                        
                        <div class="card-body p-0">
                        <h5 class="card-title m-0">Pengaturan</h5>
                        <p class="card-text">Ganti password</p>
                        </div>
                    </div>
                </a>
            @if(Auth::user()->tes)
            
                <a href="{{route('kartu')}}" class="text-decoration-none" >
                    <div class="card text-center p-3" style="width: 18rem;">
                        <svg width="5em" height="5em" viewBox="0 0 16 16" class="bi bi-card-checklist m-auto" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                            <path fill-rule="evenodd" d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
                          </svg>
                        <div class="card-body p-0">
                        <h5 class="card-title m-0">Tahap Tes</h5>
                        <p class="card-text">Tes kompetensi siswa</p>
                        </div>
                    </div>
                </a>
                
            @endif
            </div>
        </div>
    </div>
    </div>
@endsection
