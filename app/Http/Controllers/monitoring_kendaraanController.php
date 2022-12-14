<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Monitoring_kendaraan;

class monitoring_kendaraanController extends Controller
{
    public function index() {

        $data = DB::table('monitoring_kendaraan')->get();
        return view('Monitoring/index',compact('data'));
        // return view('Monitoring/indexpenyetuju',compact('data'));
    }
    public function store(Request $request)
  {
    $validator = Validator::make($request->all(),[
        'name'  => 'required',
        'jeniskendaraan'  => 'required',
        'id_driver'  => 'required',
        'Bahanbakar'  => 'required',
        'BBM'  => 'required',
        'jadwalservice'  => 'required',
        'pemakaian'  => 'required',
        'pengembalian'  => 'required',
        'persetujuan'  => 'required',
    ]);

    if ($validator->fails()) {
      return response()->json($validator->errors());
    }

    $data = new Monitoring_kendaraan();
    $data -> name   = $request -> name;
    $data -> jeniskendaraan   = $request -> jeniskendaraan;
    $data -> id_driver   = $request -> id_driver;
    $data -> Bahanbakar   = $request -> Bahanbakar;
    $data -> BBM   = $request -> BBM;
    $data -> jadwalservice   = $request -> jadwalservice;
    $data -> pemakaian   = $request -> pemakaian;
    $data -> pengembalian   = $request -> pengembalian;
    $data -> persetujuan   = $request -> persetujuan;


    $data->save();

      return redirect()->back()->with('success','Data added successfully');

    
  }

  public function getAll()
  {
       $data= Monitoring_kendaraan::all();


       return view('Monitoring.index',['data']);
       return view('Monitoring.indexpenyetuju',['data']);
  }

  public function getById($id)
  {
     $data = Monitoring_kendaraan::where('id', '=', $id)->first();
        
     return view('Monitoring.index',['data']);
     return view('Monitoring.indexpenyetuju',['data']);
  }

  public function update(Request $request, $id)
  {
    $validator = Validator::make($request->all(),[
        'name'  => 'required',
        'jeniskendaraan'  => 'required',
        'id_driver'  => 'required',
        'Bahanbakar'  => 'required',
        'BBM'  => 'required',
        'jadwalservice'  => 'required',
        'pemakaian'  => 'required',
        'pengembalian'  => 'required',
        'persetujuan'  => 'required',
    ]);

    if ($validator->fails()) {
      return response()->json($validator->errors());
    }

     $data = Monitoring_kendaraan::where('id', '=', $id)->first();
     $data -> name   = $request -> name;
     $data -> jeniskendaraan   = $request -> jeniskendaraan;
     $data -> id_driver   = $request -> id_driver;
     $data -> Bahanbakar   = $request -> Bahanbakar;
     $data -> BBM   = $request -> BBM;
     $data -> jadwalservice   = $request -> jadwalservice;
     $data -> pemakaian   = $request -> pemakaian;
     $data -> pengembalian   = $request -> pengembalian;
     $data -> persetujuan   = $request -> persetujuan;

    
     $data->save();

     return redirect()->back()->with('success','Data diubah successfully');
  }

 public function destroy($id)
    {
        $delete = Monitoring_kendaraan::where('id', '=', $id)->delete();

        return redirect()->back()->with('success', 'Data Deleted Successfully');
}
}

