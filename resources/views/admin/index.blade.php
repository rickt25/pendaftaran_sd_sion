@extends('layouts.app')

@section('title')
    Dashboard - Admin
@endsection

@section('content')
    <!-- Button group -->
    <div class="page-content">
        <div class="container">
        <div class="row justify-content-center">
            <div class="card-deck m-auto">
                <a href="{{ route('admin-data-user','all') }}" class="text-decoration-none">
                    <div class="card text-center p-4" style="width: 18rem;">
                        <svg width="4em" height="4em" viewBox="0 0 16 16" class="bi bi-people-fill m-auto" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                        </svg>
                        <div class="card-body p-0">
                        <h5 class="card-title m-0">Data User</h5>
                        <p class="card-text">List akun user</p>
                        </div>
                    </div>
                </a>

                <a href="{{route('pdf')}}" class="text-decoration-none">
                    <div class="card text-center p-4" style="width: 18rem;">
                        <svg width="4em" height="4em" viewBox="0 0 16 16" class="bi bi-file-earmark-spreadsheet-fill m-auto" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M2 3a2 2 0 0 1 2-2h5.293a1 1 0 0 1 .707.293L13.707 5a1 1 0 0 1 .293.707V13a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3zm7 2V2l4 4h-3a1 1 0 0 1-1-1zM3 8v1h2v2H3v1h2v2h1v-2h3v2h1v-2h3v-1h-3V9h3V8H3zm3 3V9h3v2H6z"/>
                          </svg>
                        <div class="card-body p-0">
                        <h5 class="card-title m-0">Pendataan</h5>
                        <p class="card-text">Informasi siswa</p>
                        </div>
                    </div>
                </a>

                <a href="{{route('change')}}" class="text-decoration-none">
                    <div class="card text-center p-4" style="width: 18rem;">
                        <svg width="4em" height="4em" viewBox="0 0 16 16" class="bi bi-key-fill m-auto" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                            </svg>
                        <div class="card-body p-0">
                        <h5 class="card-title m-0">Password</h5>
                        <p class="card-text">Ganti password</p>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
    </div>
@endsection
