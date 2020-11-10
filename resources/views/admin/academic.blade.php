@extends('layouts.app')

@section('title')
    Academic Year - Admin
@endsection

@section('content')
    <!-- Button group -->
    <div class="page-content">
        <div class="container">
            <div class="row mb-4" style="justify-content: space-between">
                <a href="/admin" class="" style="margin-left: 15px">
                    <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-arrow-left-circle mb-3" fill="lightgrey" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path fill-rule="evenodd" d="M8.354 11.354a.5.5 0 0 0 0-.708L5.707 8l2.647-2.646a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708 0z"/>
                        <path fill-rule="evenodd" d="M11.5 8a.5.5 0 0 0-.5-.5H6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5z"/>
                    </svg>
                </a>

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    + Tambah tahun ajaran
                  </button>
            </div>
            <div class="row">
                <div class="card w-100" style="padding:0 10%;">
                    <div class="card-body">
                        <h1 style="font-size: 20px">Tahun Akademik</h1>
                        <div class="row">
                        <form class="col-10" action="{{route('academic-save')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="row" style="margin:0px">
                                    <select name="academic_year" class="form-control col-10" id="year-form" onchange="changeValue()">
                                        @foreach ($data as $academic)
                                            <option value="{{$academic->id}}" @if($academic->status == 1) selected @endif>{{$academic->academic_year}}</option>
                                        @endforeach
                                    </select>
                                    <div class="col-2 pr-0">
                                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form action="{{route('academic-delete')}}" id="form-del" class="col-2 px-0" method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" name="academic_year" id="delete-form">
                            <button type="submit" class="btn btn-danger btn-block" onclick="return confirm('delete year?'); document.getElementById('form-del').submit();'">Delete</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                
                    <div class="modal-body">
                      <h4>Tambah tahun ajaran</h4>
                        <form action="{{route('academic-store')}}" method="POST">
                            @csrf
                            <input type="text" name="academic_year" class="form-control">
                            <button type="submit" class="btn btn-primary btn-block">Tambah</button>
                        </form>
                    </div>

                  </div>
                </div>
              </div>
        </div>
    </div>

    <script>
        // function changeValue(e){
        //     document.getElementById('delete-form').value = e.target.value;
        // }
        function changeValue(){
            let form = document.getElementById("year-form")
            let deleteForm = document.getElementById("delete-form")

            deleteForm.value = form.value
        }
        changeValue()
    </script>
@endsection