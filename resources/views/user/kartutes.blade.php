<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>Daftar Siswa</title>

 <style>
@page{margin:20px}
body{margin:0}

.kartutes{
    width: 80%;
    margin: auto;
    border: 2px solid grey;
    padding: 20px;
}
.title{
    text-align: center;
}
.identitas{
    width: 70%;
    height: 200px;
    padding: 20px;
    border: 2px solid grey;
}
.tableimg{
    width: 150px;
}
.foto{
    width: 120px;
}
.nilai{
    width: 100%;
    margin-top: 10px;
    height: 120px;
}
.baca{
    border: 2px solid grey;
    width: 200px;
    height: 120px;
    text-align: center;
    float: left;
}
.tulis{
    margin-left: 20px;
    border: 2px solid grey;
    width: 200px;
    height: 120px;
    text-align: center;
    float: left;
}

 </style>
</head>
<body>

    <div class="kartutes">
        <h3 class="title">KARTU TES PENERIMAAN SISWA SD SION</h3>
        <div class="identitas">
            
            <table class="table">
                <tr>
                    <td rowspan="5" class="tableimg"><img class="foto" src="./storage/{{$data->biodata->gambar}}" alt=""></td>
                    <td>Nomor Tes</td>
                    <td>:</td>
                    <td>{{$data->tes->nomor_tes}}</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{$data->biodata->nama}}</td>
                </tr>
                <tr>
                    <td>E-mail</td>
                    <td>:</td>
                    <td>{{$data->email}}</td>
                </tr>
                <tr>
                    <td>Nomor HP</td>
                    <td>:</td>
                    <td>{{$data->biodata->no_hp}}</td>
                </tr>
            </table>
        </div>

        <div class="nilai">
            <div class="baca">
                Tes Membaca
            </div>

            <div class="tulis">
                Tes Menulis
            </div>
        </div>
        <div class="text">
            <p>*Peserta melakukan tes di SD Swasta Sion Tanjungpinang , Jalan Bakar Batu</p>
            <p style="margin-left: 20px;">Senin - Sabtu ( 09:00 - 12:00 )</p>
            <p>*Tes dilakukan paling lambat 2 minggu setelah pendaftaran</p>
        </div>

    </div>

    
    


</body>
</body>
</html>

