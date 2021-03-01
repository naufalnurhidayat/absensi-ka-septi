<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    protected $table = 'pendidikan';
    protected $primaryKey = 'id_pendidikan';

    public function pendidikan() {
    	return $this->hasMany('App\Pegawai', 'id_pendidikan');
    }
}
