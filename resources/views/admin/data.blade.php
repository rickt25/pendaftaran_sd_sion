@extends('layouts.app')

@section('title')
    Data User - Admin
@endsection

@section('content')
    <div class="page-content">
        @if( Session::has( 'fail' ))
            <div class="alert alert-danger w-75 m-auto" role="alert">
                {{ Session::get('fail')}}
              </div>
        @endif  
            
        <div class="container">
            <div class="row mb-3 position-relative">
                <a href="/admin" class="float-right" style="margin-left: 15px">
                    <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-arrow-left-circle mb-3" fill="lightgrey" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path fill-rule="evenodd" d="M8.354 11.354a.5.5 0 0 0 0-.708L5.707 8l2.647-2.646a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708 0z"/>
                        <path fill-rule="evenodd" d="M11.5 8a.5.5 0 0 0-.5-.5H6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5z"/>
                    </svg>
                </a>
                <a href="{{route('admin-create-user')}}" class="btn btn-primary position-absolute" style="width:200px;height:40px; right:15px;">+ Tambah User</a>
            </div>

            @include('includes.status')
            
            <div class="row mt-3" style="padding: 0px 15px">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status Verifikasi</th>
                                <th>Aksi</th>
                                <th>Biodata</th>
                                <th>Hasil Tes</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($biodatas as $biodata)
                                <tr>
                                    <td>{{$biodata->user->name}}</td>
                                    <td>{{$biodata->user->email}}</td>
                                    <td>{{$biodata->status}}</td>
                                    <td>
                                        <form action="{{ route('admin-delete-user', $biodata->user->id) }}" method="POST">
                                            <a href="{{ route('admin-edit-user', $biodata->user->id) }}" class="btn btn-success btn-edit">Edit</a>
                                            @method('delete')
                                            @csrf
                                            <button type="submit" onclick="return confirm('Delete data?');" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin-biodata', $biodata->user->id) }}" class="btn btn-primary btn-block">Biodata Siswa</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin-tes', $biodata->user->id) }}" class="btn btn-info btn-block">Hasil Tes</a>
                                    </td>
                                </tr>
                            @endforeach
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>@if($user->biodata) {{$user->biodata->status}} @else Belum ada data @endif</td>
                                    <td>
                                        
                                        <form action="{{ route('admin-delete-user', $user->id) }}" method="POST">
                                            <a href="{{ route('admin-edit-user', $user->id) }}" class="btn btn-success btn-edit">Edit</a>
                                            @method('delete')
                                            @csrf
                                            <button type="submit" onclick="return confirm('Delete data?');" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin-biodata', $user->id) }}" class="btn btn-primary btn-block">Biodata Siswa</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin-tes', $user->id) }}" class="btn btn-info btn-block">Hasil Tes</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection