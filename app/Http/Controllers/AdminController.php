<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\User;
use App\Tes;
use App\Biodata;
use App\Academic;


class AdminController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','admin']);
    }


    //Admin - User
    public function index(){
        return view('admin.index');
    }

    public function data(Request $request ,$status){ // apa itu jir

        if($request->year_id == 0){
            $year = Academic::where('status',1)->first()->id; 
        }else{
            $year = $request->year_id;
        }
               
        $user = User::where('role', 1)->get();
        $biodata = Biodata::orderBy('status','desc')->where('academic_id',$year)->get();
        $diterima = Biodata::where('status','Diterima')->where('academic_id',$year)->get();
        $ditolak = Biodata::where('status','Ditolak')->where('academic_id',$year)->get();
        $belumver = Biodata::where('status','Belum Verifikasi')->where('academic_id',$year)->get();
        $akademik = Academic::all();

        $data = [
            'users'=>$user,
            'biodatas'=>$biodata,
            'diterima' => $diterima,
            'ditolak' => $ditolak,
            'belumver' => $belumver,
            'year' => $year,
            'akademik' => $akademik,
            'jumlah_all'=> $biodata->count(),
            'jumlah_diterima' => $diterima->count(),
            'jumlah_ditolak' => $ditolak->count(),
            'jumlah_belumver' => $belumver->count(),
        ];

           if($status == 'diterima'){
                return view('admin.datasiswa.diterima',$data);
           }
           else if($status == 'ditolak'){
                return view('admin.datasiswa.ditolak',$data);
           }
           else if($status == 'belumver'){
                return view('admin.datasiswa.belumver',$data);
           }
           else{
               return view('admin.data',$data);
           }

    }

    //FILTER DATA SISWA
    
    public function create(){
        return view('admin.create');
    }

    public function store(Request $request){
        $check = request()->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);
        
        User::create([
            'name' => $check['name'],
            'email' => $check['email'],
            'password' => Hash::make($check['password']),
            'role' => 1,
        ]);

        return redirect()->route('admin-data-user',['status'=>'all','year_id'=>0])->with('success','File created successfully');
    }

    public function edit($id){
        $data = User::findOrFail($id);
        return view('admin.edit', ['data' => $data]);
    }

    public function update(Request $request ,$id){
        $data = User::findOrFail($id);
        
        $check = request()->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
        ]);

        $data->update([
            'name' => $check['name'],
            'email' => $check['email'],
        ]);

        return redirect()->route('admin-data-user',['status'=>'all','year_id'=>0]);
    }

    public function destroy($id){
        $data = User::findOrFail($id);
        if($data->biodata){
            $data->biodata->delete();
        }
        $data->delete();
        return redirect()->route('admin-data-user',['status'=>'all','year_id'=>0]);
    }

    //Admin - Biodata

    public function biodata($id){
        $data = User::findOrFail($id);
        if($data->role == 99){
            return redirect()->route('admin-data-user',['status'=>'all','year_id'=>0])->withFail('Admin cant be edited');
        }

        return view('admin.biodata',['data' => $data]);
    }

    public function createbio($id){
        return view('admin.createbio',['id'=>$id]);
    }

    public function storebio(Request $request,$id){

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
            'no_hp'=>'required',
            'nama_ayah'=>'nullable',
            'pendidikan_ayah'=>'nullable',
            'pekerjaan_ayah'=>'nullable',
            'nama_ibu'=>'nullable',
            'pendidikan_ibu'=>'nullable',
            'pekerjaan_ibu'=>'nullable',
            'wali'=>'nullable',
            'pendidikan_wali'=>'nullable',
            'pekerjaan_wali'=>'nullable',
            'status'=>'required',
            'img'=>'image',
            'akte'=>'image',
            'kk'=>'image',
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
            'status'=> $check['status'],
            'user_id' => $id,
            'gambar' => $gambar,
            'akte' => $akte,
            'kk' => $kk
            ]);

        $idtes = IdGenerator::generate(['table' => 'tes','field'=>'nomor_tes', 'length' => 7, 'prefix' =>'SD-']);
        Tes::create([
            'user_id'=> $id,
            'nomor_tes'=> $idtes,
        ]);
        
        User::findOrFail($id)->update(['role'=>2]);

        return redirect()->route('admin-biodata', $id);
    }

    public function editbio($id){
        $data = User::findOrFail($id);
        return view('admin.editbio',['data' => $data]);
    }

    public function updatebio(Request $request,$id){
        $data = Biodata::where('user_id', $id)->first();

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
            'no_hp'=>'required',
            'nama_ayah'=>'nullable',
            'pendidikan_ayah'=>'nullable',
            'pekerjaan_ayah'=>'nullable',
            'nama_ibu'=>'nullable',
            'pendidikan_ibu'=>'nullable',
            'pekerjaan_ibu'=>'nullable',
            'wali'=>'nullable',
            'pendidikan_wali'=>'nullable',
            'pekerjaan_wali'=>'nullable',
            'status'=>'required',
            'img'=>'image',
            'akte'=>'image',
            'kk'=>'image',
        ]);

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
            'status'=> $check['status'],
            ]);
            
            return redirect()->route('admin-biodata',$id);
    }

    public function destroybio($id){
        $data = Biodata::where('user_id',$id)->first();
        
        if($data->gambar){
            Storage::delete($data->gambar);
        }
        if($data->akte){
            Storage::delete($data->akte);
        }
        if($data->kk){
            Storage::delete($data->kk);
        }

        $data->user->update(['role'=>1]);

        $data->delete();
        return redirect('admin');
    }

    //pdf

    public function pdf($year){
        if($year == 0){
            $year = Academic::where('status',1)->first()->id;
        }

        $diterima = Biodata::where('status','Diterima')->where('academic_id',$year)->count();
        $ditolak = Biodata::where('status','Ditolak')->where('academic_id',$year)->count();
        $akademik = Academic::all();

        return view('admin.pendataan',[
            'diterima'=>$diterima,
            'ditolak'=>$ditolak,
            'akademik'=>$akademik,
            'year'=>$year,
            ]);
    }

}
