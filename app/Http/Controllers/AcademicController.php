<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Academic;

class AcademicController extends Controller
{
    public function index(){
        $data = Academic::all();

        return view('admin.academic', ['data'=>$data]);
    }

    public function store(Request $request){
        $check = $request->validate([
            'academic_year' => 'required',
        ]);

        Academic::create([
            'status' => 0,
            'academic_year' => $check['academic_year'],
        ]);

        return redirect()->back();
    }

    public function save(Request $request){
        $data = Academic::find($request->academic_year);
        $current = Academic::where('status', 1)->first();

        if($current){
            $current->update(['status' => 0]);
        }
        $data->update(['status'=> 1]);

        return redirect()->route('admin');
    }

    public function delete(Request $request){
        Academic::find($request->academic_year)->delete();

        return redirect()->back();
    }
}
