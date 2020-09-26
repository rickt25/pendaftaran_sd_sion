<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Tes;
use App\Biodata;
use App\User;

class TesController extends Controller
{
    public function index($id){
        $data = Tes::where('user_id',$id)->first();
        
        return view('admin.tes.tes',['data'=>$data, 'id'=>$id]);
    }

    public function edit($id){
        $data = Tes::find($id);

        return view('admin.tes.edit',['data'=>$data]);
    }

    public function update(Request $request, $id){
        $data = Tes::find($id);
        $biodata = $data->user->biodata;

        $data->update([
            'tes_baca'=>$request['tes_baca'],
            'tes_tulis'=>$request['tes_tulis'],
        ]);

        $biodata->update([
            'status'=> $request['status'],
        ]);

        return redirect()->route('admin-tes',$data->user->id);
    }
}
