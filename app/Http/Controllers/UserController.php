<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\User;
use App\Biodata;
use App\Tes;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','user']);
    }

    public function index()
    {
        return view('user.index');
    }

    public function biodata($id){
        //if(Auth::user()->id == $id){
            $data = User::findOrFail($id);
            return view('user.biodata',['data'=>$data]);
        //}else{
        //    return redirect()->route('user-biodata',Auth::user()->id);
        //}
    }

    public function create(){
        return view('user.create');
    }

    public function store(Request $request){

        $check=request()->validate([
            'nama'=>'required',
            'jenis_kelamin'=>'required',
            'tempat_lahir'=>'required',
            'tanggal_lahir'=>'required|date',
            'agama'=>'required',
            'kewarganegaraan'=>'required',
            'jml_saudara'=>'required|numeric',
            'berat_badan'=>'required',
            'tinggi_badan'=>'required',
            'goldar'=>'required',
            'alamat'=>'required',
            'no_hp'=>'required|numeric',
            'nama_ayah'=>'nullable',
            'pendidikan_ayah'=>'nullable',
            'pekerjaan_ayah'=>'nullable',
            'nama_ibu'=>'nullable',
            'pendidikan_ibu'=>'nullable',
            'pekerjaan_ibu'=>'nullable',
            'wali'=>'nullable',
            'pendidikan_wali'=>'nullable',
            'pekerjaan_wali'=>'nullable',
            'gambar'=>'required',
            'akte'=>'required',
            'kk'=>'required',
        ]);

        $gambar = $request->gambar->store('img');
        $akte = $request->akte->store('akte');
        $kk = $request->kk->store('kk');

        Biodata::create([
            'nama'=> $check['nama'],
            'jenis_kelamin'=> $check['jenis_kelamin'],
            'tempat_lahir'=> $check['tempat_lahir'],
            'tanggal_lahir'=> $check['tanggal_lahir'],
            'agama'=> $check['agama'],
            'kewarganegaraan'=> $check['kewarganegaraan'],
            'jml_saudara'=> $check['jml_saudara'],
            'berat_badan'=> $check['berat_badan'],
            'tinggi_badan'=> $check['tinggi_badan'],
            'goldar'=> $check['goldar'],
            'alamat'=> $check['alamat'],
            'no_hp'=> $check['no_hp'],
            'nama_ayah'=> $check['nama_ayah'],
            'pendidikan_ayah'=> $check['pendidikan_ayah'],
            'pekerjaan_ayah'=> $check['pekerjaan_ayah'],
            'nama_ibu'=> $check['nama_ibu'],
            'pendidikan_ibu'=> $check['pendidikan_ibu'],
            'pekerjaan_ibu'=> $check['pekerjaan_ibu'],
            'wali'=> $check['wali'],
            'pendidikan_wali'=> $check['pendidikan_wali'],
            'pekerjaan_wali'=> $check['pekerjaan_wali'],
            'status'=>'Belum Verifikasi',
            'user_id' => Auth::user()->id,
            'gambar' => $gambar,
            'akte' => $akte,
            'kk' => $kk
            ]);
        User::findOrFail(Auth::user()->id)->update(['role'=>2]);
    
        $id = IdGenerator::generate(['table' => 'tes','field'=>'nomor_tes', 'length' => 7, 'prefix' =>'SD-']);
        Tes::create([
            'user_id'=> Auth::user()->id,
            'nomor_tes'=> $id,
        ]);

        return redirect()->route('user-biodata', Auth::user()->id);
    }

    public function edit(){
        $id = Auth::user()->id;
        $data = User::findOrFail($id);
        return view('user.edit',['data'=>$data]);
    }

    public function update(Request $request, $id){
        $data = Biodata::where('user_id', $id)->first();

        if($request->gambar){
            if($data->gambar){
                Storage::delete($data->gambar);
            }
            $gambar = $request->gambar->store('img');
            $data->update(['gambar'=>$gambar]);
        }

        if($request->akte){
            if($data->akte){
                Storage::delete($data->akte);
            }
            $akte = $request->akte->store('akte');
            $data->update(['akte'=>$akte]);
        }

        if($request->kk){
            if($data->kk){
                Storage::delete($data->kk);
            }
            $kk = $request->kk->store('kk');
            $data->update(['kk'=>$kk]);
        }

        $check=request()->validate([
            'nama'=>'required',
            'jenis_kelamin'=>'required',
            'tempat_lahir'=>'required',
            'tanggal_lahir'=>'required|date',
            'agama'=>'required',
            'kewarganegaraan'=>'required',
            'jml_saudara'=>'required|numeric',
            'berat_badan'=>'required',
            'tinggi_badan'=>'required',
            'goldar'=>'required',
            'alamat'=>'required',
            'no_hp'=>'required|numeric',
            'nama_ayah'=>'nullable',
            'pendidikan_ayah'=>'nullable',
            'pekerjaan_ayah'=>'nullable',
            'nama_ibu'=>'nullable',
            'pendidikan_ibu'=>'nullable',
            'pekerjaan_ibu'=>'nullable',
            'wali'=>'nullable',
            'pendidikan_wali'=>'nullable',
            'pekerjaan_wali'=>'nullable',
        ]);

        $data->update([
            'nama'=> $check['nama'],
            'jenis_kelamin'=> $check['jenis_kelamin'],
            'tempat_lahir'=> $check['tempat_lahir'],
            'tanggal_lahir'=> $check['tanggal_lahir'],
            'agama'=> $check['agama'],
            'kewarganegaraan'=> $check['kewarganegaraan'],
            'jml_saudara'=> $check['jml_saudara'],
            'berat_badan'=> $check['berat_badan'],
            'tinggi_badan'=> $check['tinggi_badan'],
            'goldar'=> $check['goldar'],
            'alamat'=> $check['alamat'],
            'no_hp'=> $check['no_hp'],
            'nama_ayah'=> $check['nama_ayah'],
            'pendidikan_ayah'=> $check['pendidikan_ayah'],
            'pekerjaan_ayah'=> $check['pekerjaan_ayah'],
            'nama_ibu'=> $check['nama_ibu'],
            'pendidikan_ibu'=> $check['pendidikan_ibu'],
            'pekerjaan_ibu'=> $check['pekerjaan_ibu'],
            'wali'=> $check['wali'],
            'pendidikan_wali'=> $check['pendidikan_wali'],
            'pekerjaan_wali'=> $check['pekerjaan_wali'],
            ]);
            
            return redirect()->route('user-biodata',$id);
    }

    public function tes(){
        return view('user.kartu');
    }

    public function hasiltes(){
        $data = Tes::where('user_id', Auth::user()->id)->first();

        return view('user.hasiltes',['data'=>$data]);
    }

}
