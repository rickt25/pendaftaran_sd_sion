@extends('layouts.app')

@section('title')
    Pendaftaran Online
@endsection

@section('content')
    <div class="page-content">
        <div class="container">
            <div class="row section-1">
                <div class="col-md-6 header-left-wrapper align-self-center">
                    <div class="header-subtitle">
                        Pendaftaran Online
                    </div>
                    <div class="header-title">
                        SD Swasta Sion
                    </div>
                    <div class="header-description">
                        Mari, Bergabunglah Bersama Kami Di SD Swasta Sion, Karena Kami Menyediakan Fasilitas Terbaik Untuk Putra Dan Putri Tercinta Anda
                    </div>
                    <a href="#info" class="btn btn-header-info">
                        Info
                    </a>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('images/school.svg') }}" alt="" class="w-100">
                </div>
            </div>
        </div>
    </div>
@endsection