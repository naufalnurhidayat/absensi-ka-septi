<?php

use Illuminate\Database\Seeder;

class userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array([
        	'nip'=>'098765',
        	'nama_pegawai'=>'Admin',
        	'email'=>'admin@gmail.com',
        	'password'=>bcrypt('admin123'),
        	'jenis_kelamin'=>'Perempuan',
        	'usia'=>'21',
        	'agama'=>'Islam',
        	'tempat_lahir'=>'Jakarta',
        	'tanggal_lahir'=>'1900-12-12',
        	'id_jabatan'=>'1',
        	'id_pendidikan'=>'1',
        	'tahun_masuk'=>'2018',
        	'no_telepon'=>'085772528097',
        	'alamat'=>'Jalan Sudirman',
        	'foto'=>'8jj.jpg'
        ]));
    }
}
