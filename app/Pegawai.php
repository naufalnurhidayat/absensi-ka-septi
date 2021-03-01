<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id_pegawai';

    public function jabatan(){
    	return $this->belongsTo('App/Jabatan');
    }

    public function pendidikan(){
    	return $this->belongsTo('App/Pendidikan');
    }
    
}
