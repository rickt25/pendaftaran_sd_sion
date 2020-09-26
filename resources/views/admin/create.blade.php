@extends('layouts.app')

@section('title')
    Create Data - Admin
@endsection

@section('content')
    <div class="page-content">

      <form action="{{route('admin-store-user')}}" method="POST">
        @csrf
        @method('POST') 
      <div class="container">
        <a href="{{route('admin')}}" class="">
          <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-arrow-left-circle mb-3" fill="lightgrey" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
              <path fill-rule="evenodd" d="M8.354 11.354a.5.5 0 0 0 0-.708L5.707 8l2.647-2.646a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708 0z"/>
              <path fill-rule="evenodd" d="M11.5 8a.5.5 0 0 0-.5-.5H6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5z"/>
          </svg>
        </a>
        <h1>
        Tambah User
        </h1>
        <div class="row mt-5">
          <div class="col-md-6">
            <div class="form-group">
              <label>
                Nama
              </label>
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>
                Alamat E-mail
              </label>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>
                Password
              </label>
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>
                Confirm Password
              </label>
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-right">
            <button type="submit" class="btn btn-primary px-5">+ Add</a>
          </div>
        </div>
      </div>
    </form>
    </div>
@endsection