@extends('layouts.app')

@section('title')
    Edit Biodata - User
@endsection

@section('content')
    <div class="page-content">
        <div class="container">
          <div class="row">
        <a href="{{route('admin-biodata', $data->id)}}" class="float-left">
                <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-arrow-left-circle mb-3" fill="lightgrey" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path fill-rule="evenodd" d="M8.354 11.354a.5.5 0 0 0 0-.708L5.707 8l2.647-2.646a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708 0z"/>
                    <path fill-rule="evenodd" d="M11.5 8a.5.5 0 0 0-.5-.5H6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5z"/>
                </svg>
            </a>
          <div class="col-12 col-md-10 offset-md-1">
            <div class="card">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col-md-6">
                    <h5 class="m-0">
                      Edit Biodata {{$data->name}}
                    </h5>
                  </div>
                </div>
              </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-12 col-md-12 text-center mb-3">
                        <img src="@if (!$data->biodata->gambar){{asset('images/profile.jpg')}} @else {{asset('storage/'.$data->biodata->gambar)}} @endif" style="width:200px;" class="p-1 shadow">
                    </div>
                    <div class="col-12 col-md-10 m-auto"> 
                      <div class="table-responsive">
                        <table class="table-borderless">
                        <form method="POST" action="{{route('admin-update-biodata', $data->id)}}" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            
                            <tr>
                              <td class="w-25">Nama Lengkap</td>
                              <td>:</td>
                              <td><input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ $data->biodata->nama }}"></td>
                            </tr>
                            <tr>
                              <td></td>
                              <td></td>
                              <td>
                                @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror</td>
                            </tr>
                    
                            <tr>
                              <td>Jenis Kelamin</td>
                              <td>:</td>
                              <td>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="Laki-laki" @if($data->biodata->jenis_kelamin=='Laki-laki')checked @endif>
                                  <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="Perempuan" @if($data->biodata->jenis_kelamin=='Perempuan')checked @endif>
                                  <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                </div>
                              </td>
                            </tr>
                    
                            <tr>
                              <td>Tempat, Tanggal Lahir</td>
                              <td>:</td>
                              <td>
                                  <div class="input-group">
                                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="{{$data->biodata->tempat_lahir}}" class="form-control">
                                    <input type="date" id="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{$data->biodata->tanggal_lahir}}" class="form-control">
                                  </div>
                              </td>
                            </tr>

                            <tr>
                              <td></td>
                              <td></td>
                              <td><b>*calon siswa harus berumur 5 hingga 6 tahun</b></td>
                            </tr>
                    
                            <tr>
                              <td>Agama</td>
                              <td>:</td>
                              <td>
                                <select class="form-control" name="agama">
                                  <option disabled value></option>
                                  <option @if($data->biodata->agama=='Buddha')selected @endif value="Buddha">Buddha</option>
                                  <option @if($data->biodata->agama=='Hindu')selected @endif value="Hindu">Hindu</option>
                                  <option @if($data->biodata->agama=='Islam')selected @endif value="Islam">Islam</option>
                                  <option @if($data->biodata->agama=='Konghucu')selected @endif value="Konghucu">Konghucu</option>
                                  <option @if($data->biodata->agama=='Kristen')selected @endif value="Kristen">Kristen</option>
                                  <option @if($data->biodata->agama=='Lain-lain')selected @endif value="Lain-lain">Lain-lain</option>
                                </select>
                              </td>
                            </tr>
                            
                            <tr>
                              <td>Kewarganegaraan</td>
                              <td>:</td>
                              <td><input type="text" class="form-control @error('kewarganegaraan') is-invalid @enderror" name="kewarganegaraan" value="{{$data->biodata->kewarganegaraan}}"></td>
                            </tr>
                            
                            <tr>
                              <td>Jumlah Saudara</td>
                              <td>:</td>
                              <td><input type="number" min="0" class="form-control @error('jml_saudara') is-invalid @enderror" name="jml_saudara" value="{{$data->biodata->jml_saudara}}"></td>
                            </tr>
                            
                            <tr>
                              <td>Berat Badan (kg)</td>
                              <td>:</td>
                              <td><input type="number" min="0" class="form-control @error('berat_badan') is-invalid @enderror" name="berat_badan" value="{{$data->biodata->berat_badan}}"></td>
                            </tr>
                            
                            <tr>
                              <td>Tinggi Badan (cm)</td>
                              <td>:</td>
                              <td><input type="number" min="0" class="form-control @error('tinggi_badan') is-invalid @enderror" name="tinggi_badan" value="{{$data->biodata->tinggi_badan}}"></td>
                            </tr>
                            
                            <tr>
                              <td>Golongan darah</td>
                              <td>:</td>
                              <td>
                                <select class="form-control" name="goldar">
                                  <option @if($data->biodata->goldar=='-')selected @endif>-</option>
                                  <option @if($data->biodata->goldar=='A')selected @endif>A</option>
                                  <option @if($data->biodata->goldar=='B')selected @endif>B</option>
                                  <option @if($data->biodata->goldar=='O')selected @endif>O</option>
                                  <option @if($data->biodata->goldar=='AB')selected @endif>AB</option>
                                </select>
                              </td>
                            </tr>
                            
                            <tr>
                              <td>Alamat</td>
                              <td>:</td>
                              <td><textarea style="max-height:100px;min-height:35px;" class="form-control @error('alamat') is-invalid @enderror" name="alamat">{{$data->biodata->alamat}}</textarea></td>
                            </tr>
                            
                            <tr>
                              <td>Nomor HP</td>
                              <td>:</td>
                              <td><input type="tel" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{$data->biodata->no_hp}}"></td>
                            </tr>
                            <tr>
                              <td colspan="3"><hr></td>
                            </tr>
                            <tr>
                              <td>Nama Ayah</td>
                              <td>:</td>
                              <td><input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" name="nama_ayah" value="{{$data->biodata->nama_ayah}}"></td>
                            </tr>
                            <tr>
                              <td>Pendidikan Terakhir Ayah</td>
                              <td>:</td>
                              <td>
                                <select class="form-control" name="pendidikan_ayah">
                                  <option @if($data->biodata->pendidikan_ayah=='-')selected @endif>-</option>
                                  <option @if($data->biodata->pendidikan_ayah=='SD')selected @endif >SD</option>
                                  <option @if($data->biodata->pendidikan_ayah=='SMP')selected @endif>SMP</option>
                                  <option @if($data->biodata->pendidikan_ayah=='SMA/K')selected @endif>SMA/K</option>
                                  <option @if($data->biodata->pendidikan_ayah=='D3')selected @endif>D3</option>
                                  <option @if($data->biodata->pendidikan_ayah=='S1')selected @endif>S1</option>
                                  <option @if($data->biodata->pendidikan_ayah=='S2')selected @endif>S2</option>
                                  <option @if($data->biodata->pendidikan_ayah=='S3')selected @endif>S3</option>
                                </select>
                              </td>
                            </tr>
                            <tr>
                              <td>Pekerjaan Ayah</td>
                              <td>:</td>
                              <td><input type="text" class="form-control @error('pekerjaan_ayah') is-invalid @enderror" name="pekerjaan_ayah" value="{{$data->biodata->pekerjaan_ayah}}"></td>
                            </tr>
                            <tr>
                              <td colspan="3"><hr></td>
                            </tr>
                            <tr>
                              <td>Nama Ibu</td>
                              <td>:</td>
                              <td><input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" name="nama_ibu" value="{{$data->biodata->nama_ibu}}"></td>
                            </tr>
                            <tr>
                              <td>Pendidikan Terakhir Ibu</td>
                              <td>:</td>
                              <td>
                                <select class="form-control" name="pendidikan_ibu">
                                  <option @if($data->biodata->pendidikan_ibu=='-')selected @endif>-</option>
                                  <option @if($data->biodata->pendidikan_ibu=='SD')selected @endif>SD</option>
                                  <option @if($data->biodata->pendidikan_ibu=='SMP')selected @endif>SMP</option>
                                  <option @if($data->biodata->pendidikan_ibu=='SMA/K')selected @endif>SMA/K</option>
                                  <option @if($data->biodata->pendidikan_ibu=='D3')selected @endif>D3</option>
                                  <option @if($data->biodata->pendidikan_ibu=='S1')selected @endif>S1</option>
                                  <option @if($data->biodata->pendidikan_ibu=='S2')selected @endif>S2</option>
                                  <option @if($data->biodata->pendidikan_ibu=='S3')selected @endif>S3</option>
                                </select>  
                              </td>
                            </tr>
                            <tr>
                              <td>Pekerjaan Ibu</td>
                              <td>:</td>
                              <td><input type="text" class="form-control @error('pekerjaan_ibu') is-invalid @enderror" name="pekerjaan_ibu" value="{{$data->biodata->pekerjaan_ibu}}"></td>
                            </tr>
                            <tr>
                              <td colspan="3"><hr></td>
                            </tr>
                            <tr>
                              <td>Nama Wali</td>
                              <td>:</td>
                              <td><input type="text" class="form-control @error('wali') is-invalid @enderror" name="wali" value="{{$data->biodata->wali}}"></td>
                            </tr>
                            <tr>
                              <td>Pendidikan Terakhir Wali</td>
                              <td>:</td>
                              <td>
                                <select class="form-control" name="pendidikan_wali">
                                  <option @if($data->biodata->pendidikan_wali=='-')selected @endif>-</option>
                                  <option @if($data->biodata->pendidikan_wali=='SD')selected @endif>SD</option>
                                  <option @if($data->biodata->pendidikan_wali=='SMP')selected @endif>SMP</option>
                                  <option @if($data->biodata->pendidikan_wali=='SMA/K')selected @endif>SMA/K</option>
                                  <option @if($data->biodata->pendidikan_wali=='D3')selected @endif>D3</option>
                                  <option @if($data->biodata->pendidikan_wali=='S1')selected @endif>S1</option>
                                  <option @if($data->biodata->pendidikan_wali=='S2')selected @endif>S2</option>
                                  <option @if($data->biodata->pendidikan_wali=='S3')selected @endif>S3</option>
                                </select>  
                              </td>
                            </tr>
                            <tr>
                              <td>Pekerjaan Wali</td>
                              <td>:</td>
                              <td><input type="text" class="form-control @error('pekerjaan_wali') is-invalid @enderror" name="pekerjaan_wali" value="{{$data->biodata->pekerjaan_wali}}"></td>
                            </tr>
                            <tr>
                              <td></td>
                              <td></td>
                              <td>*kosongkan bila tidak ada</td>
                            </tr>
                            <tr>
                              <td colspan="3"><hr></td>
                            </tr>
                            <tr>
                              <td>Upload Foto Siswa</td>
                              <td>:</td>
                              <td><input type="file" name="gambar"></td>
                            </tr>
                            <tr>
                              <td>Upload Akte Kelahiran</td>
                              <td>:</td>
                              <td><input type="file" name="akte"></td>
                            </tr>
                            <tr>
                              <td>Upload Kartu Keluarga</td>
                              <td>:</td>
                              <td><input type="file" name="kk"></td>
                            </tr>
                            <tr>
                              <td colspan="3"><hr></td>
                            </tr>
                            
                            <tr>
                              <td colspan="3"><button class="btn btn-primary btn-block" type="submit">Simpan data</button></td>
                            </tr>
                            
                          </form>
                          </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script>
        let year =  new Date().getFullYear();
        let form = document.getElementById('date');
        form.min = year-7 +'-01-01';
        form.max = year-4 +'-01-01';
        
      </script>
@endsection