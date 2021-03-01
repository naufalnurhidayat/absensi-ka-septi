@extends('layouts.template')

@section('content')
<h4 class="mt-2">Edit Pegawai</h4>

@if ($errors->any())
	<div class="alert alert-danger pb-0">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif

<form method="post" action="{{ route('pegawai.update', $pegawai['id_pegawai']) }}" enctype="multipart/form-data">
	{{ method_field('PUT') }}
	{{ csrf_field() }}

	<div class="form-group row">
		<label for="nip" class="col-sm-2 col-form-label">NIP</label>
		<div class="col-sm-6">
			<input class="form-control" type="text" id="nip" name="nip" autocomplete="off" autofocus="" value="{{ $pegawai['nip'] }}">
		</div>
	</div>

	<div class="form-group row">
		<label for="nama" class="col-sm-2 col-form-label">Nama</label>
		<div class="col-sm-6">
			<input class="form-control" type="text" id="nama" name="nama" autocomplete="off" autofocus="" value="{{ $pegawai['nama_pegawai'] }}">
		</div>
	</div>

	<div class="form-group row">
		<label for="email" class="col-sm-2 col-form-label">Email</label>
		<div class="col-sm-6">
			<input class="form-control" type="text" id="email" name="email" autocomplete="off" autofocus="" value="{{ $pegawai['email'] }}">
		</div>
	</div>

	<div class="form-group row">
		<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
		<div class="col-sm-6">
			<div class="custom-control custom-radio custom-control-inline">
				<input class="custom-control-input" type="radio" id="jkl" name="jenis_kelamin" value="Laki-laki" {{ $l }}>
				<label class="custom-control-label" for="jkl">Laki-laki</label>
			</div>
			<div class="custom-control custom-radio custom-control-inline">
				<input class="custom-control-input" type="radio" id="jkp" name="jenis_kelamin" value="Perempuan" {{ $p }}>
				<label class="custom-control-label" for="jkp">Perempuan</label>
			</div>
		</div>
	</div>

	<div class="form-group row">
		<label for="usia" class="col-sm-2 col-form-label">Usia</label>
		<div class="col-sm-6">
			<input class="form-control" type="text" id="usia" name="usia" autocomplete="off" autofocus="" value="{{ $pegawai['usia'] }}">
		</div>
	</div>
	<div class="form-group row">
		<label for="agama" class="col-sm-2 col-form-label">Agama</label>
		<div class="col-sm-6">
			<select class="form-control" id="agama" name="agama">
				<option value="">--Pilih Agama--</option>
				<option value="islam" <?php echo ($pegawai['agama'] == 'islam') ? 'selected' : '' ?>>Islam</option>
				<option value="Kristen Protestan" <?php echo ($pegawai['agama'] == 'Kristen Protestan') ? 'selected' : '' ?>>Kristen Protestan</option>
				<option value="Kristen Katolik" <?php echo ($pegawai['agama'] == 'Kristen Katolik') ? 'selected' : '' ?>>Kristen Katolik</option>
				<option value="Hindu" <?php echo ($pegawai['agama'] == 'Hindu') ? 'selected' : '' ?>>Hindu</option>
				<option value="Bhuda" <?php echo ($pegawai['agama'] == 'Bhuda') ? 'selected' : '' ?>>Bhuda</option>
				<option value="Khonghucu" <?php echo ($pegawai['agama'] == 'Khonghucu') ? 'selected' : '' ?>>Khonghucu</option>
			</select>
		</div>
	</div>

	<div class="form-group row">
		<label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
		<div class="col-sm-6">
			<input class="form-control" type="text" id="tempat_lahir" name="tempat_lahir" autocomplete="off" autofocus="" value="{{ $pegawai['tempat_lahir'] }}">
		</div>
	</div>

	<div class="form-group row">
		<label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
		<div class="col-sm-3">
			<input class="form-control" type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ $pegawai['tanggal_lahir'] }}">
		</div>
	</div>

	<div class="form-group row">
		<label for="pendidikan" class="col-sm-2 col-form-label">pendidikan</label>
		<div class="col-sm-6">
			<select class="form-control" id="pendidikan" name="pendidikan">
				<option value="">--Pilih Pendidikan--</option>
				@foreach($pendidikan as $p){
				<option value="{{ $p['id_pendidikan'] }}"
				@if($p['id_pendidikan'] == $pegawai['id_pendidikan'])selected @endif>
				{{ $p['nama_pendidikan'] }}</option>";
				@endforeach
			</select>
		</div>
	</div>

	<div class="form-group row">
		<label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
		<div class="col-sm-6">
			<select class="form-control" id="jabatan" name="jabatan">
				<option value="">--Pilih Jabatan--</option>
				@foreach($jabatan as $j){
				<option value="{{ $j['id_jabatan'] }}"
				@if($j['id_jabatan'] == $pegawai['id_jabatan'])selected @endif>
				{{ $j['nama_jabatan'] }}</option>";
				@endforeach
			</select>
		</div>
	</div>

	<div class="form-group row">
		<label for="tahun_masuk" class="col-sm-2 col-form-label">Tahun Masuk</label>
		<div class="col-sm-6">
			<input class="form-control" type="text" id="tahun_masuk" name="tahun_masuk" autocomplete="off" autofocus="" value="{{ $pegawai['tahun_masuk'] }}">
		</div>
	</div>

	<div class="form-group row">
		<label for="no_telepon" class="col-sm-2 col-form-label">Nomor Telepon</label>
		<div class="col-sm-6">
			<input class="form-control" type="text" id="no_telepon" name="no_telepon" autocomplete="off" autofocus="" value="{{ $pegawai['no_telepon'] }}">
		</div>
	</div>

	<div class="form-group row">
		<label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
		<div class="col-sm-8">
			<textarea class="form-control" rows="5" id="alamat" name="alamat" autocomplete="off" autofocus="">{{ $pegawai['alamat'] }}</textarea>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-sm-2 col-form-label">Foto</label>
		<div class="col-sm-6">
			<div class="custom-file">
				<input class="custom-file-input" type="file" id="inputGroupFile02" name="foto" value="{{ $pegawai['foto'] }}">
				<label for="foto" class="custom-file-label">Ubah file</label>
			</div>
		<img class="img-thumbnail mt-2" src="{{ asset('images/'.$pegawai['foto']) }}" width="150">
		</div>
	</div>

	<button type="submit" class="btn btn-outline-info btn-fw"><i class="oi oi-task"></i> Simpan </button>
	<button type="reset" class="btn btn-outline-danger btn-fw"><i class="oi oi-circle-x"></i> Batal </button>

</form>
@endsection




