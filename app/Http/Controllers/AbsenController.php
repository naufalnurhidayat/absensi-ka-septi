<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Absen;
use App\Pegawai;
use App\User;
use Carbon;
use PDF;
use Auth;
use Illuminate\Support\Facades\DB;

class AbsenController extends Controller
{

    public function timeZone($location){
        return date_default_timezone_set($location);
    }
   
    public function index()
    {
        $this->timeZone('Asia/Jakarta');
        $id_pegawai = Auth::user()->id_pegawai;
        $tanggal = date("Y-m-d");

        if(strtolower(Auth::user()->nama_pegawai) == 'admin'){
            $cek_absen = Absen::where(['tanggal' => $tanggal])
                            ->get()
                            ->first();
        }else{
            $cek_absen = Absen::where(['id_pegawai' => $id_pegawai, 'tanggal' => $tanggal])
                            ->get()
                            ->first();
        }

        if(strtolower(Auth::user()->nama_pegawai) == 'admin' OR strtolower(Auth::user()->nama_pegawai) == 'admin2'){
            
            if(isset($_GET['dari_tanggal'])){
                if(isset($_GET['id_pegawai']) && $_GET['id_pegawai'] != "") {
                    $data_absen = Absen::join('users','users.id_pegawai','absen.id_pegawai')
                            ->whereBetween('tanggal',array($_GET['dari_tanggal'],$_GET['sampai_tanggal']))
                            ->where('absen.id_pegawai',array($_GET['id_pegawai']))
                            ->orderBy('tanggal', 'desc')
                            ->paginate(20);
                        }else
                        {
                             $data_absen = Absen::join('users','users.id_pegawai','absen.id_pegawai')
                            ->whereBetween('tanggal',array($_GET['dari_tanggal'],$_GET['sampai_tanggal']))
                            ->where('absen.id_pegawai',array($_GET['id_pegawai']))
                            ->orderBy('tanggal', 'desc')
                            ->paginate(20);
                        }
            }
            else
            {
                $data_absen = Absen::join('users','users.id_pegawai','absen.id_pegawai')
                            ->orderBy('tanggal', 'desc')
                            ->paginate(20);
            }
            }
            else{
                $data_absen = Absen::where('id_pegawai', $id_pegawai)
                            ->orderBy('tanggal', 'desc')
                            ->paginate(20);
            }
        $data_pegawai = Pegawai::get();
        return view('absenadmin', compact('data_absen', 'data_pegawai'));
        }

        public function absen(Request $request){
        if($request->post('id_pegawai') == ''){
            return redirect()->back();
        }
        $this->timeZone('Asia/Jakarta');
        $tanggal = date("Y-m-d"); // 2017-02-01
        $jam = date("H:i:s"); 
        $catatan = $request->post('catatan');
        $id_pegawai = $request->post('id_pegawai');

        $user = new User;
        $cek_id = $user->where(['id_pegawai' => $id_pegawai])->get();
        foreach ($cek_id as $value) {
            $id_pegawai = $value->id_pegawai;
        }
        $absen = new Absen;
        // absen masuk
        if (isset($request['btnIn'])){
             // cek double data
            $cek_double = $absen->where(['tanggal'=> $tanggal, 'id_pegawai' => $id_pegawai])->count();
            
            if ($cek_double > 0 ){
                return redirect()->back();
            }
            $catatan = ($jam > '09:00:00') ? 'Telat' : $catatan;
        
            $absen->create([
                'id_pegawai'   => $id_pegawai,
                'tanggal'      => $tanggal,
                'jam_masuk'   => $jam,
                'catatan'      => $catatan,]);
            
            return redirect()->back();

        } //absen keluar 
        elseif (isset($request['btnOut'])){
            $data = $absen->where(['tanggal'=> $tanggal, 'id_pegawai' => $id_pegawai])->get();
            foreach ($data as $key => $value) {
                $jam_masuk = $value->jam_masuk;
            }
            $catatan = ($jam < '17:00:00') ? 'Pulang Cepat' : $catatan;
            $catatan = ($jam > '17:00:00') ? 'Lembur' : $catatan;
            $catatan = ($jam < '17:00:00' && $jam_masuk > '09:00:00') ? 'Septi jelek' : $catatan;
            $absen->where(['tanggal' => $tanggal, 'id_pegawai' => $id_pegawai])
                ->update([
                    'jam_keluar' => $jam,
                    'catatan' => $catatan]);

            return redirect()->back();       
        }
       
        return redirect()->back();
    }

    public function get_all_join(){
        $data_absen = Absen::join('users','users.id_pegawai','absen.id_pegawai')
        ->get();
        return $data_absen;
    }

    public function PDFall(){
        $no = 0;
        $data_absen = $this->get_all_join();
          return view('report',['data_absen' => $data_absen,'no'=>0]);
    }

    public function PDFfilter(){
        $no = 0;
        $data_absen = Absen::join('users','users.id_pegawai','absen.id_pegawai')
                            ->whereBetween('tanggal',array($_GET['dari_tanggal'],$_GET['sampai_tanggal']))
                            ->where('absen.id_pegawai',array($_GET['id_pegawai']))->get();
          return view('report',['data_absen' => $data_absen,'no'=>0]);
    }
    
}
