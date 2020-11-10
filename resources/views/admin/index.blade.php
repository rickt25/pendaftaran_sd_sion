@extends('layouts.app')

@section('title')
    Dashboard - Admin
@endsection

@section('content')
    <!-- Button group -->
    <div class="page-content">
        <div class="container">
        <div class="row">
            <div class="card-deck">
                <a href="{{ route('admin-data-user',['status'=>'all','year_id'=>0]) }}" class="text-decoration-none">
                    <div class="card text-center p-4 mb-3" style="width: 18rem;">
                        <svg width="4em" height="4em" viewBox="0 0 16 16" class="bi bi-people-fill m-auto" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                        </svg>
                        <div class="card-body p-0">
                        <h5 class="card-title m-0">Data User</h5>
                        <p class="card-text">List akun user</p>
                        </div>
                    </div>
                </a>

                <a href="{{route('pdf',0)}}" class="text-decoration-none">
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

                <a href="{{route('academic')}}" class="text-decoration-none">
                    <div class="card text-center p-4" style="width: 18rem;">
                        <svg width="4em" height="4em" viewBox="0 0 16 16" class="bi bi-calendar2-date-fill m-auto" style="padding: 5px;" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 3.5c0-.276.244-.5.545-.5h10.91c.3 0 .545.224.545.5v1c0 .276-.244.5-.546.5H2.545C2.245 5 2 4.776 2 4.5v-1zm7.336 9.29c-1.11 0-1.656-.767-1.703-1.407h.683c.043.37.387.82 1.051.82.844 0 1.301-.848 1.305-2.164h-.027c-.153.414-.637.79-1.383.79-.852 0-1.676-.61-1.676-1.77 0-1.137.871-1.809 1.797-1.809 1.172 0 1.953.734 1.953 2.668 0 1.805-.742 2.871-2 2.871zm.066-2.544c.625 0 1.184-.484 1.184-1.18 0-.832-.527-1.23-1.16-1.23-.586 0-1.168.387-1.168 1.21 0 .817.543 1.2 1.144 1.2zm-2.957-2.89v5.332H5.77v-4.61h-.012c-.29.156-.883.52-1.258.777V8.16a12.6 12.6 0 0 1 1.313-.805h.632z"/>
                          </svg>
                        <div class="card-body p-0">
                        <h5 class="card-title m-0">Academic Year</h5>
                        <p class="card-text">Change Academic Year</p>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
    </div>
@endsection
