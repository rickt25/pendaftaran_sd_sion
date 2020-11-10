<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use PDF;
use App\User;
use App\Biodata;
use App\Tes;

class PDFController extends Controller
{
    public function downloadPDF($year){
        $diterima = Biodata::where('status','Diterima')->where('academic_id',$year)->get();
        $ditolak = Biodata::where('status','Ditolak')->where('academic_id',$year)->get();
        $pdf = PDF::loadView('admin.pdf.all',[
            'ditolak'=>$ditolak,
            'diterima'=>$diterima,
        ]);
        
        return $pdf->download('Daftar-Siswa.pdf');
    }

    public function diterimaPDF($year){
        $diterima = Biodata::where('status','Diterima')->where('academic_id',$year)->get();
        $pdf = PDF::loadView('admin.pdf.diterima',['diterima'=>$diterima]);
        
        return $pdf->download('Daftar-Siswa-Diterima.pdf');
    }

    public function ditolakPDF($year){
        $ditolak = Biodata::where('status','Ditolak')->where('academic_id',$year)->get();
        $pdf = PDF::loadView('admin.pdf.ditolak',['ditolak'=>$ditolak]);
        
        return $pdf->download('Daftar-Siswa-Ditolak.pdf');
    }

    public function viewPDF($year){
        $diterima = Biodata::where('status','Diterima')->where('academic_id',$year)->get();
        $ditolak = Biodata::where('status','Ditolak')->where('academic_id',$year)->get();
        return view('admin.pdf.all',[
            'diterima'=>$diterima,
            'ditolak'=>$ditolak,
            ]);
    }
    public function viewDiterima($year){
        $diterima = Biodata::where('status','Diterima')->where('academic_id',$year)->get();
        return view('admin.pdf.diterima',[
            'diterima'=>$diterima,
        ]);
    }

    public function viewDitolak($year){
        $ditolak = Biodata::where('status','Ditolak')->where('academic_id',$year)->get();
        return view('admin.pdf.ditolak',[
            'ditolak'=>$ditolak,
        ]);
    }

    public function cardPDF(){
        $data = User::find(Auth::user()->id);
        $pdf = PDF::loadView('user.kartutes',['data'=>$data]);
        
        return $pdf->download('Kartu Tes.pdf');

        // return view('user.kartutes',['data'=>$data]);    
    }

    public function suratPDF($who){
        $data = User::find(Auth::user()->id);
        $pdf = PDF::loadView('user.surat',['data'=>$data , 'who'=>$who]);

        return $pdf->download('SURAT PERNYATAAN.pdf');

        // return view('user.surat',[
        //     'data'=>$data, 
        //     'who' => $who
        //     ]);
    }
}
