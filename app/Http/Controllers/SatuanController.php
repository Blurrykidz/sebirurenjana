<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;


class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         return view('back.satuan.index', [
            'title'            => "Data Satuan",
            "satuans"           =>  Satuan::all(),
            "nama"             =>  auth()->user()->name,
            "nip"              =>  auth()->user()->nip,
            "level"            =>  auth()->user()->level,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
  public function store(Request $request)
    {
        $id     = $request->id;
        $satuan = Satuan::UpdateorCreate(['id' => $id ], ['nama_satuan' => $request->nama_satuan, 'active' => $request->active]);
        if($satuan){
            toast('Success, Data berhasil disimpan!','success','top-right');
            return redirect()->back();
            // return response()->json($satuan);
        }
        else{
            toast('Error, Data gagal disimpan!','error','top-right');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Satuan $satuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
     public function edit($id)
    {
        $where = array('id' => $id);
        $satuan  = Satuan::where($where)->first();
        return response()->json($satuan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Satuan $satuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $key = Crypt::decrypt($id);
        try{
            $satuan = Satuan::destroy($key);
            toast('Sukses, Data berhasil dihapus!','success','top-right');
            return redirect()->back();
        }
        catch (\Exception $e){
            toast('Error, Data gagal dihapus!','error','top-right');
            return redirect('/satuan');
        }
    }
}
