<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    protected $table = 'absen';
    
    protected $fillable = ['id_absen', 'id_pegawai', 'tanggal', 'jam_masuk', 'jam_keluar', 'catatan'];
}
