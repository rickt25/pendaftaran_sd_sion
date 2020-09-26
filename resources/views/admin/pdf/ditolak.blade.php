<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>Daftar Siswa</title>

 <style>
     @page{margin:20px}
     img{
         width: 100%;
     }
     .title{
         width: 100%;
         height: 40px;
         text-align:center;
         margin-top: 50px;
     }
     table{
         border-collapse: collapse;
         width: 90%;
         margin: auto;
         font-size: 15px;
         text-align: left;
     }
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
        <h3>DAFTAR SISWA YANG DITOLAK</h3>
    </div>
    
    <table>
        <tr>
            <th style="width:5px;">No</th>
            <th style="width:200px;">Nama Siswa</th>
            <th>No HP</th>
            <th>E-mail</th>
            <th>Status</th>
        </tr>
        @foreach($ditolak as $index=>$data)
        <tr>
            <td>{{$index+1}}</td>
            <td>{{$data->nama}}</td>
            <td>{{$data->no_hp}}</td>
            <td>{{$data->user->email}}</td>
            <td>{{$data->status}}</td>
        </tr>
        @endforeach
    </table>
</body>
</body>
</html>

