@extends('layouts.app')

@section('title')
    About
@endsection

@section('content')
    <div class="page-content">
        <div class="container">

            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset('images/about.jpg') }}" alt="" class="w-100">
                </div>
                <div class="col-md-8">
                    <div class="header-description">
                        SD Sion adalah Sekolah Swasta Kristen No. 017 beralamat di jalan Bakar Batu no.20 Tanjungpinang Barat , Kepulauan Riau<br>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore magnam, qui cupiditate fugiat vero nesciunt veniam sapiente quas at quia!<br>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellat commodi necessitatibus laboriosam quo exercitationem unde suscipit. Autem, tempore. Mollitia, eaque?<br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection