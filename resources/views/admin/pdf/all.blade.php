<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>Daftar Siswa</title>

 <style>
     @page{margin:20px}
     body{margin:0}
     img{
         width: 100%;
     }
     .title{
         width: 100%;
         height: 40px;
         text-align:center;
         margin-top: 10px;
     }
     table{
         border-collapse: collapse;
         width: 90%;
         margin: auto;
         font-size: 15px;
         text-align: left;
     }
     /* td{
         width: 50px;
     } */
     table, tr,td,th{
         border: 1px solid black;
     }
     th, td{
         padding: 10px;
     }
 </style>
</head>
<body>

    <img src="./images/kop.png" alt="">

    <div class="title">
        <h3>DAFTAR SISWA DITERIMA</h3>
    </div>

    <table class="table-first">
        <tr>
            <th style="width:2px!important;">No</th>
            <th style="width:200px;">Nama Siswa</th>
            <th>No HP</th>
            <th>E-mail</th>
            <th>Tahun Akademik</th>
            <th>Status</th>
        </tr>
        @foreach($diterima as $index=>$siswa)
        <tr>
            <td style="width:5px;">{{$index+1}}</td>
            <td>{{$siswa->nama}}</td>
            <td>{{$siswa->no_hp}}</td>
            <td>{{$siswa->user->email}}</td>
            <td>{{$siswa->academic->academic_year}}</td>
            <td>{{$siswa->status}}</td>
        </tr>
        @endforeach
        <tr>
            <td style="text-align: right" colspan="4">Jumlah Siswa</td>
            <td>{{$diterima->count()}}</td>
        </tr>
    </table>

@if($ditolak->count() > 0)
    <div class="title">
        <h3>DAFTAR SISWA DITOLAK</h3>
    </div>

    <table class="table-second">
        <tr>
            <th style="width:5px">No</th>
            <th style="width:200px;">Nama Siswa</th>
            <th>No HP</th>
            <th>E-mail</th>
            <th>Tahun Akademik</th>
            <th>Status</th>
        </tr>
        @foreach($ditolak as $index=>$siswa)
        <tr>
            <td style="width:5px;">{{$index+1}}</td>
            <td>{{$siswa->nama}}</td>
            <td>{{$siswa->no_hp}}</td>
            <td>{{$siswa->user->email}}</td>
            <td>{{$siswa->academic->academic_year}}</td>
            <td>{{$siswa->status}}</td>
        </tr>
        @endforeach
        <tr>
            <td style="text-align: right" colspan="5">Jumlah Siswa</td>
            <td>{{$ditolak->count()}}</td>
        </tr>
    </table>
@endif
    


</body>
</body>
</html>

