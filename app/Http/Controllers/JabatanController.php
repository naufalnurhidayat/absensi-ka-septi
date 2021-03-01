<?php

namespace App\Http\Controllers;
use App\Jabatan;

use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        $jabatan = Jabatan::all();
        return view('jabatan/index', ['jabatan'=>$jabatan, 'no'=>0]);
    }

   
    public function create()
    {
        return view('jabatan/create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required'
        ],[
            'nama.required' => 'Nama jabatan tidak boleh kosong'
        ]);

        $jabatan = new Jabatan;
        $jabatan->nama_jabatan = $request['nama'];
        $jabatan->save();

        return redirect()
            ->route('jabatan.index')
            ->with('success','Data berhasil ditambahkan');
    }

   
    public function edit($id)
    {
        $jabatan = Jabatan::find($id);
        return view('jabatan/edit', ['jabatan'=>$jabatan]);
    }

 
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required'
        ],[
            'nama.required' => 'Nama jabatan tidak boleh kosong'
        ]);

        $jabatan = Jabatan::find($id);
        $jabatan->nama_jabatan = $request['nama'];
        $jabatan->update();

        return redirect()
            ->route('jabatan.index')
            ->with('success','Data berhasil diedit');
    }


    public function destroy($id)
    {
        $jabatan = Jabatan::find($id);
        $jabatan->delete();

        return redirect()
            ->route('jabatan.index')
            ->with('success','Data berhasil dihapus');
    }
}
