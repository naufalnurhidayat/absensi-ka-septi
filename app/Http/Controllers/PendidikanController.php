<?php  

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pendidikan;

class PendidikanController extends Controller
{
    public function index()
    {
        $pendidikan = Pendidikan::all();
        return view('pendidikan/index', ['pendidikan'=>$pendidikan, 'no'=>0]);
    }

   
    public function create()
    {
        return view('pendidikan/create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required'
        ],[
            'nama.required' => 'Nama pendidikan tidak boleh kosong'
        ]);

        $pendidikan = new Pendidikan;
        $pendidikan->nama_pendidikan = $request['nama'];
        $pendidikan->save();

        return redirect()
            ->route('pendidikan.index')
            ->with('success','Data berhasil ditambahkan');
    }

   
    public function edit($id)
    {
        $pendidikan = Pendidikan::find($id);
        return view('pendidikan/edit', ['pendidikan'=>$pendidikan]);
    }

 
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required'
        ],[
            'nama.required' => 'Nama pendidikan tidak boleh kosong'
        ]);

        $pendidikan = Pendidikan::find($id);
        $pendidikan->nama_pendidikan = $request['nama'];
        $pendidikan->update();

        return redirect()
            ->route('pendidikan.index')
            ->with('success','Data berhasil diedit');
    }


    public function destroy($id)
    {
        $pendidikan = Pendidikan::find($id);
        $pendidikan->delete();

        return redirect()
            ->route('pendidikan.index')
            ->with('success','Data berhasil dihapus');
    }
}
