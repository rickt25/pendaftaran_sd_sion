<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>Surat Pernyataan Orang Tua</title>

 <style>
@page{margin:20px}
body{margin:0}

.header img{
    width:100%;
}
.wrapper{
    width: 90%;
    margin: auto;
}
.title{
    text-align: center;
    font-weight: 500;
    text-decoration: underline;
    margin-top: 20px;
    margin-bottom: 20px;
}
.table{
    width: 100%;
    text-align: left;
}
.first{
    width: 270px;
}
.second{
    width: 20px;
}
td{
    height: 27px;
}
li{
    height: auto;
    line-height: 28px;
}
.text2{
    line-height: 25px;
}
.ttd{
    width: 50%;
    float: right;
    text-align: center;
}
.ttd p{
    margin: 0;
    padding: 0;
}

 </style>
</head>
<body>

    <div class="header">
        <img src="./images/kop.png" alt="">
    </div>

    <div class="wrapper">
        <div class="title">SURAT PERNYATAAN ORANG TUA / WALI MURID</div>
         <p>Saya yang bertanda tangan di bawah ini :</p> 
        <table class="table">
            <tr>
                <td class="first">1. Nama orang tua / wali murid</td>
                <td class="second">:</td>
                <td class="data">
                    @if($who == 'ayah') {{$data->biodata->nama_ayah}}
                    @elseif($who == 'ibu') {{$data->biodata->nama_ibu}}
                    @elseif($who == 'wali') {{$data->biodata->nama_wali}}
                    @else ………………………………………………………… 
                    @endif
                </td>
            </tr>
            <tr>
                <td class="first">2. Pekerjaan orang tua / wali murid</td>
                <td class="second">:</td>
                <td class="data">@if($who == 'ayah') {{$data->biodata->pekerjaan_ayah}}
                    @elseif($who == 'ibu') {{$data->biodata->pekerjaan_ibu}}
                    @elseif($who == 'wali') {{$data->biodata->pekerjaan_wali}}
                    @else ………………………………………………………… 
                    @endif</td>
            </tr>
            <tr>
                <td class="first">3. Agama</td>
                <td class="second">:</td>
                <td class="data">@if($who == 'ayah') {{$data->biodata->agama}}
                    @elseif($who == 'ibu') {{$data->biodata->agama}}
                    @elseif($who == 'wali') {{$data->biodata->agama}}
                    @else ………………………………………………………… 
                    @endif</td>
            </tr>
            <tr>
                <td class="first">4. Hubungan keluarga dengan murid</td>
                <td class="second">:</td>
                <td class="data">@if($who) {{$who}}
                    @else ………………………………………………………… 
                    @endif</td>
            </tr>
            <tr>
                <td class="first">5. Alamat orang tua / wali murid</td>
                <td class="second">:</td>
                <td class="data">@if($who == 'ayah') {{$data->biodata->alamat}}
                    @elseif($who == 'ibu') {{$data->biodata->alamat}}
                    @elseif($who == 'wali') {{$data->biodata->alamat}}
                    @else ………………………………………………………… 
                    @endif</td>
            </tr>
        </table>
        Dengan sesungguh-sungguhnya serta penuh rasa tanggung jawab dengan ini
    </div>

    <div class="wrapper">
        <div class="title">M  E  N  Y  A  T  A  K  A  N</div>
        <p class="text2">Bahwa saya selaku orang tua / wali murid yang bernama 
            @if($who == 'ayah') {{$data->biodata->nama_ayah}}
            @elseif($who == 'ibu') {{$data->biodata->nama_ibu}}
            @elseif($who == 'wali') {{$data->biodata->nama_wali}}
            @else ………………………………………………………… 
            @endif 
            Kelas ……………… Sekolah Dasar Swasta Kristen SION No. 017, Tanjungpinang</p> 
        <ol>
            <li>Bersedia membimbing dan mengawasi murid tersebut dia atas untuk mematuhi semua peraturan dan tata tertib sekolah, termasuk Keputusan Direktur Jenderal Pendidikan Dasar dan Menengah No. 052/C/Kep/D 82 tanggal 17 maret 1982, tentang pakaian seragam sekolah.</li>
            <li>
                Tidak berkeberatan murid tersebut di atas menerima sanksi dari sekolah, antara lain:
                <ol type="a">
                    <li>Apabila murid tersebut diatas melanggar tata tertib sekolah, maka dikenakan sanksi tidak diperbolehkan mengikuti pelajaran selama jangka waktu yang telah ditentukan.</li>
                    <li>Apabila saya tidak membimbing dan tidak mengawasi murid tersebut diatas, sehingga masih tetap melanggar tata tertib sekolah sekalipun sudah diberikan nasehat, maka bersedia murid tersebut dikeluarkan/diberhentikan dan Sekolah Dasar Swasta Kristen SION No. 017, Tanjungpinang.</li>
                </ol>
            </li>
        </ol>
        <p>Demikianlah surat pernyataan ini saya tanda tangani dengan sesungguhnya dan penuh rasa tanggung jawab. </p>
    </div>

    <div class="ttd">
        <p>...................  ,  ................................</p>
        <p>Yang membuat pernyataan</p>
        <p>Orang tua / wali murid</p>
        <br><br><br><br>
        <p>....................................</p>
    </div>
</body>
</body>
</html>

