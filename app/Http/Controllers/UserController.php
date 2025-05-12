<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          return view('back.pengguna.index', [
            'title'     => "Data Pengguna",
            "pengguna"  =>  User::all(),
            "nama"      =>  auth()->user()->name,
            "username"  =>  auth()->user()->username,
            "level"     =>  auth()->user()->level,
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
        $id             = $request->id;
        $validatedData  = $request->validate(
            [
                'name'      => 'required|max:255',
                'username'  => 'required|max:255',
                'password'  => 'required|max:50',
                'level'     => 'required',
                'aktif'    => 'required',
                'foto'     => 'image|file|max:2000',
            ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        if($request->file('foto')){
            $validatedData['foto'] = $request->file('foto')->store('foto-pengguna');
        }


        try {
            User::UpdateorCreate(['id' => $id ], $validatedData);
            toast('Data berhasil disimpan!','success','top-right');
            return redirect('/pengguna');
        }

        catch (\Exception $e){
            toast('Data gagal disimpan!','error','top-right');
            return redirect('/pengguna');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

     public function edit($id)
    {
        $where = array('id' => $id);
        $data  = User::where($where)->first();
        return response()->json($data);
    }

    public function destroy($id)
    {
        $key = Crypt::decrypt($id);
        try{
            User::destroy($key);
            Alert::success('Berhasil', 'Data Berhasil dihapus');
            return redirect('/pengguna');
        }
        catch (\Exception $e){
             Alert::error('Terjadi Kesalahan', 'Data Gagal dihapus');
             return redirect('/pengguna');
        }
    }

    public function ubahPassword()
    {
        return view('back.pengguna.ubahpassword',[
            'title'    => "Ubah Password",
            "nama"     =>  auth()->user()->name,
            "nip"      =>  auth()->user()->nip,
            "level"      =>  auth()->user()->level,
        ]);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        try {
            User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
            toast('Sukses, Password berhasil di ubah!','success','top-right');
            return redirect('/ubahpassword')->with('success', 'Password berhasil di ubah');

           }
        catch (\Exception $e){
            return redirect('/ubahpassword')->with('error', 'Password gagal di ubah');
        }
    }
}
