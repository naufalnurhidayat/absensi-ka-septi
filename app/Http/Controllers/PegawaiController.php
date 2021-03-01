<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use App\Jabatan; 
use App\Pendidikan;

class PegawaiController extends Controller
{
    public function index() {
    	$pegawai = Pegawai::join('jabatan','jabatan.id_jabatan', '=', 'users.id_jabatan')
                          ->join('pendidikan','pendidikan.id_pendidikan', '=', 'users.id_pendidikan')
                          ->get();
    	return view('pegawai/index', ['pegawai'=>$pegawai,'no'=>0]);

    }

    public function create() {
    	$jabatan = Jabatan::all();
        $pendidikan = Pendidikan::all();
    	return view('pegawai/create', ['jabatan'=>$jabatan], ['pendidikan'=>$pendidikan]);
    }

    public function store(Request $request) {
    	$this->validate($request,[
            'nip' => 'required',
    		'nama' => 'required',
            'email'=> 'required|email',
            'password'=> 'required',
    		'jenis_kelamin' => 'required',
            'usia' => 'required',
            'agama'=>'required',
            'tempat_lahir' => 'required',
    		'tanggal_lahir' => 'required',
    		'jabatan' => 'required',
            'pendidikan' => 'required',
            'tahun_masuk' => 'required',
            'no_telepon' => 'required',
            'alamat' => 'required',
    		'foto' => 'required',
    	], [
            'nip.required' => 'nip pegawai tidak boleh kosong',
    		'nama.required' => 'nama pegawai tidak boleh kosong',
            'email.required' => 'email tidak boleh kosong',
            'password.required' => 'password tidak boleh kosong',
    		'jenis_kelamin.required' => 'jenis kelamin tidak boleh kosong',
            'usia.required' => 'usia tidak boleh kosong',
            'agama.reqiured' => 'agama tidak boleh kosong',
            'tempat_lahir.required' => 'tempat_lahir tidak boleh kosong',
    		'tanggal_lahir.required' => 'tanggal lahir tidak boleh kosong',
    		'jabatan.required' => 'jabatan tidak boleh kosong',
            'pendidikan.required' => 'pendidikan tidak boleh kosong',
            'tahun_masuk.required' => 'tahun masuk tidak boleh kosong',
            'no_telepon.required' => 'no_telepon tidak boleh kosong',
    		'alamat.required' => 'alamat tidak boleh kosong',
            'foto.required' => 'foto tidak boleh kosong',
    	]);

    	if($request->hasfile('foto'))
    	{
    		$file = $request->file('foto');
    		$namafile=time().$file->getClientOriginalName();
    		$file->move(public_path().'/images/', $namafile);
        } 
    	$pegawai = new Pegawai;
        $pegawai->nip = $request['nip'];
    	$pegawai->nama_pegawai = $request['nama'];
        $pegawai->email = $request['email'];
        $pegawai->password = bcrypt($request['password']);
    	$pegawai->jenis_kelamin = $request['jenis_kelamin'];
        $pegawai->usia = $request['usia'];
        $pegawai->agama = $request['agama'];
        $pegawai->tempat_lahir = $request['tempat_lahir'];
    	$pegawai->tanggal_lahir = $request['tanggal_lahir'];
    	$pegawai->id_jabatan = $request['jabatan'];
        $pegawai->id_pendidikan = $request['pendidikan'];
        $pegawai->tahun_masuk = $request['tahun_masuk'];
        $pegawai->no_telepon = $request['no_telepon'];
    	$pegawai->alamat = $request['alamat'];
    	$pegawai->foto = $namafile;
        $pegawai->save();

    	return redirect() 
    		->route('pegawai.index')
    		->with('success','Data berhasil ditambahkan');
    }

    public function show($id) {
        $pegawai = Pegawai::join('jabatan','jabatan.id_jabatan', '=', 'users.id_jabatan')
                           ->join('pendidikan','pendidikan.id_pendidikan', '=', 'users.id_pendidikan')
                           ->where('id_pegawai', $id)
                           ->first();
        return view('pegawai.detail',['pegawai'=>$pegawai]);
    }

    public function edit($id) {
    	$pegawai = Pegawai::find($id);
    	$jabatan = Jabatan::all();
        $pendidikan = Pendidikan::all();
    	$l = ($pegawai['jenis_kelamin'] == "Laki-laki") ? "checked" : "";
    	$p = ($pegawai['jenis_kelamin'] == "Perempuan") ? "checked" : "";
    	return view('pegawai/edit', ['pegawai'=>$pegawai, 'jabatan'=>$jabatan, 'pendidikan'=>$pendidikan, 'l'=>$l, 'p'=>$p]);
    }

    public function update(Request $request, $id) {
    	$this->validate($request, [
            'nip' => 'required',
            'nama' => 'required',
            'email'=>'required|email',
            'jenis_kelamin' => 'required',
            'usia' => 'required',
            'agama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jabatan' => 'required',
            'pendidikan' => 'required',
            'tahun_masuk' => 'required',
            'no_telepon' => 'required',
            'alamat' => 'required',
            'foto' => 'required',
    	], [
            'nip.required' => 'nip pegawai tidak boleh kosong',
            'nama.required' => 'nama pegawai tidak boleh kosong',
            'email.required' => 'email tidak boleh kosong',
            'jenis_kelamin.required' => 'jenis kelamin tidak boleh kosong',
            'usia.required' => 'usia tidak boleh kosong',
            'agama.required' => 'agama tidak boleh kosong',
            'tempat_lahir.required' => 'tempat_lahir tidak boleh kosong',
            'tanggal_lahir.required' => 'tanggal lahir tidak boleh kosong',
            'jabatan.required' => 'jabatan tidak boleh kosong',
            'pendidikan.required' => 'pendidikan tidak boleh kosong',
            'tahun_masuk.required' => 'tahun masuk tidak boleh kosong',
            'no_telepon.required' => 'no_telepon tidak boleh kosong',
            'alamat.required' => 'alamat tidak boleh kosong',
            'foto.required' => 'foto tidak boleh kosong',
    	]);

    	$ubahfile = false;
    	if($request->hasfile('foto'))
    	{
    		$file = $request->file('foto');
    		$namafile=time().$file->getClientOriginalName();
    		$file->move(public_path().'/images/', $namafile);
    		$ubahfile = true;
    	}

    	$pegawai = Pegawai::find($id);
        $pegawai->nip = $request['nip'];
    	$pegawai->nama_pegawai = $request['nama'];
        $pegawai->email = $request['email'];
    	$pegawai->jenis_kelamin = $request['jenis_kelamin'];
        $pegawai->usia = $request['usia'];
        $pegawai->agama = $request['agama'];
        $pegawai->tempat_lahir = $request['tempat_lahir'];
    	$pegawai->tanggal_lahir = $request['tanggal_lahir'];
    	$pegawai->id_jabatan = $request['jabatan'];
        $pegawai->id_pendidikan = $request['pendidikan'];
        $pegawai->tahun_masuk = $request['tahun_masuk'];
        $pegawai->no_telepon = $request['no_telepon'];
        $pegawai->alamat = $request['alamat'];
        $pegawai->foto = $namafile;
    	if($ubahfile){
    		unlink(public_path().'/images/'.$pegawai->foto);
    		$pegawai->foto = $namafile;
    	}
    	$pegawai->update();

    	return redirect()
    		->route('pegawai.index')
    		->with('success', 'Data berhasil di edit');
    }

    public function destroy($id) {
    	$pegawai = Pegawai::find($id);
    	$pegawai->delete();
    	unlink(public_path().'/images/'.$pegawai->foto);

    	return redirect()
    		->route('pegawai.index')
    		->with('success', 'Data berhasil di hapus');
    }
}