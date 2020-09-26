@extends('layouts.app')

@section('title')
    Kartu - User
@endsection

@section('content')
    <!-- Button group -->
    <div class="page-content">
        <div class="container">
            <a href="{{route('user')}}" class="">
                <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-arrow-left-circle position-absolute" fill="lightgrey" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path fill-rule="evenodd" d="M8.354 11.354a.5.5 0 0 0 0-.708L5.707 8l2.647-2.646a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708 0z"/>
                    <path fill-rule="evenodd" d="M11.5 8a.5.5 0 0 0-.5-.5H6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5z"/>
                </svg>
              </a>
            
            
        <div class="row justify-content-center">
            
            <div class="alert alert-info" style="width:81%">
                Download dan print Kartu tes dan tes di SD Sion (Jam aktif : Senin-Sabtu 07.00-18.00)<br>
                Print dan isi surat pernyataan orang tua dan kumpulkan pada saat tes
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="card-deck">
                <a href="{{ route('user-pdf') }}" class="text-decoration-none">
                    <div class="card text-center p-3" style="width: 18rem;">
                        <svg width="5em" height="5em" style="padding:0.5em" viewBox="0 0 16 16" class="bi bi-file-earmark-person m-auto" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"/>
                            <path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z"/>
                            <path fill-rule="evenodd" d="M8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            <path d="M8 12c4 0 5 1.755 5 1.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-.245S4 12 8 12z"/>
                          </svg>
                        <div class="card-body p-0">
                        <h5 class="card-title m-0">Kartu Tes</h5>
                        <p class="card-text">Download kartu tes</p>
                        </div>
                    </div>
                </a>

                <a href="" class="text-decoration-none"  data-toggle="modal" data-target="#exampleModal">
                    <div class="card text-center p-3" style="width: 18rem;">
                        <svg width="5em" height="5em" style="padding: 0.5em" viewBox="0 0 16 16" class="bi bi-envelope-open m-auto" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8.47 1.318a1 1 0 0 0-.94 0l-6 3.2A1 1 0 0 0 1 5.4v.818l5.724 3.465L8 8.917l1.276.766L15 6.218V5.4a1 1 0 0 0-.53-.882l-6-3.2zM15 7.388l-4.754 2.877L15 13.117v-5.73zm-.035 6.874L8 10.083l-6.965 4.18A1 1 0 0 0 2 15h12a1 1 0 0 0 .965-.738zM1 13.117l4.754-2.852L1 7.387v5.73zM7.059.435a2 2 0 0 1 1.882 0l6 3.2A2 2 0 0 1 16 5.4V14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5.4a2 2 0 0 1 1.059-1.765l6-3.2z"/>
                          </svg>
                        <div class="card-body p-0">
                        <h5 class="card-title m-0">Surat Pernyataan</h5>
                        <p class="card-text">Surat Pernyataan orang tua</p>
                        </div>
                    </div>
                </a>

                <a href="{{route('hasil-tes')}}" class="text-decoration-none">
                    <div class="card text-center p-3" style="width: 18rem;">
                        <svg width="5em" height="5em" style="padding:0.5em" viewBox="0 0 16 16" class="bi bi-clipboard-check m-auto" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                            <path fill-rule="evenodd" d="M9.5 1h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3zm4.354 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                          </svg>
                        <div class="card-body p-0">
                        <h5 class="card-title m-0">Hasil Tes</h5>
                        <p class="card-text">hasil tes</p>
                        </div>
                    </div>
                </a>
                
            </div>
        </div>
    </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Download surat pernyataan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <h6>Yang mendaftarkan</h6>
                    <a class="btn btn-primary btn-block" href="{{route('surat-pernyataan','ayah')}}">Ayah</a>
                    <a class="btn btn-primary btn-block" href="{{route('surat-pernyataan','ibu')}}">Ibu</a>
                    <a class="btn btn-primary btn-block" href="{{route('surat-pernyataan','wali')}}">Wali</a>
                    <a class="btn btn-primary btn-block" href="/file/SURAT PERNYATAAN ORANG TUA.docx" download>Blank</a>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection
