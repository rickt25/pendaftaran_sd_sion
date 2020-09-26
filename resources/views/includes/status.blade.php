<div class="row">
    <div class="col-12 col-md-3 mb-3">
        <a href="{{ route('admin-data-user','all') }}" class="text-decoration-none">
            <div class="card text-light" style="background-color: #ee5253;">
                <div class="card-body text-center">
                    <h5 class="card-title"><strong>Total daftar</strong></h5>
                    <h4 class="card-text"><strong>{{ $jumlah_all }} Siswa</strong></h4>
                </div>
            </div>
        </a>
    </div>
    <div class="col-12 col-md-3 mb-3">
        <a href="{{ route('admin-data-user','diterima') }}" class="text-decoration-none">
            <div class="card text-light" style="background-color: #ff9f43;">
                <div class="card-body text-center">
                    <h5 class="card-title"><strong>Diterima</strong></h5>
                    <h4 class="card-text"><strong>{{ $jumlah_diterima }} Siswa</strong></h4>
                </div>
            </div>
        </a>
    </div>
    <div class="col-12 col-md-3 mb-3">
        <a href="{{ route('admin-data-user','ditolak') }}" class="text-decoration-none">
            <div class="card text-light" style="background-color: #10ac84;">
                <div class="card-body text-center">
                    <h5 class="card-title"><strong>Tidak diterima</strong></h5>
                    <h4 class="card-text"><strong>{{ $jumlah_ditolak }} Siswa</strong></h4>
                </div>
            </div>
        </a>
    </div>
    <div class="col-12 col-md-3 mb-3">
        <a href="{{ route('admin-data-user','belumver') }}" class="text-decoration-none">
            <div class="card text-light" style="background-color: #2e86de;">
                <div class="card-body text-center">
                    <h5 class="card-title"><strong>Belum Verifikasi</strong></h5>
                    <h4 class="card-text"><strong>{{ $jumlah_belumver }} Siswa</strong></h4>
                </div>
            </div>
        </a>
    </div>
</div>