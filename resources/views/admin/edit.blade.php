@extends('layouts.app')

@section('title')
    Edit Data - Admin
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
          <div class="col-md-12">
            <div class="card w-75 shadow m-auto">
              <div class="card-body">
                <div class="card-title text-center">
                  <h5>Edit Data</h5><hr>
                </div>
                <div class="card-body">
                  <form action="{{ route('admin-update-user', $data->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group mb-1">
                      <label for="email">E-mail Address</label>
                      <input type="email" class="form-control" id="email" name="email" value="{{$data->email}}">
                    </div>
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" name="name" value="{{$data->name}}">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection