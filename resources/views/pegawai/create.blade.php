@extends('layouts.template')

@section('title','Form Pegawai')

@section('content')
<h4 class="mt-2">Tambah Pegawai</h4>
<hr>

@if ($errors->any())
	<div class="alert alert-danger pb-0">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif

<form method="post" action="{{ route('pegawai.store') }}" enctype="multipart/form-data">
	{{ csrf_field() }}

	<div class="form-group row">
		<label for="nip" class="col-sm-2 col-form-label">NIP</label>
		<div class="col-sm-6">
			<input class="form-control" type="text" id="nip" name="nip" autocomplete="off" autofocus="">
		</div>
	</div>

	<div class="form-group row">
		<label for="nama" class="col-sm-2 col-form-label">Nama</label>
		<div class="col-sm-6">
			<input class="form-control" type="text" id="nama" name="nama" autocomplete="off" autofocus="">
		</div>
	</div>

	<div class="form-group row">
		<label for="email" class="col-sm-2 col-form-label">Email</label>
		<div class="col-sm-6">
			<input class="form-control" type="text" id="email" name="email" autocomplete="off" autofocus="">

              @if ($errors->has('email'))
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('email') }}</strong>
                 </span>
              @endif
		</div>
	</div>

	<div class="form-group row">
		<label for="password" class="col-sm-2 col-form-label">Password</label>
		<div class="col-sm-6">
			<input class="form-control" type="password" id="password" name="password" autocomplete="off" autofocus="">
			  @if ($errors->has('password'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
		</div>
	</div>
	
	 <div class="form-group row">
      <label for="password-confirm" class="col-sm-2 col-form-label">Confirm Password</label>
		<div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" autocomplete="off" name="password_confirmation" required>
            </div>
    </div>

	<div class="form-group row">
		<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
		<div class="col-sm-6">
			<div class="custom-control custom-radio custom-control-inline">
				<input class="custom-control-input" type="radio" id="jkl" name="jenis_kelamin" value="Laki-laki">
				<label class="custom-control-label" for="jkl">Laki-laki</label>
			</div>
			<div class="custom-control custom-radio custom-control-inline">
				<input class="custom-control-input" type="radio" id="jkp" name="jenis_kelamin" value="Perempuan">
				<label class="custom-control-label" for="jkp">Perempuan</label>
			</div>
		</div>
	</div>

	<div class="form-group row">
		<label for="usia" class="col-sm-2 col-form-label">Usia</label>
		<div class="col-sm-6">
			<input class="form-control" type="text" id="usia" name="usia" autocomplete="off" autofocus="">
		</div>
	</div>

	<div class="form-group row">
		<label for="agama" class="col-sm-2 col-form-label">Agama</label>
		<div class="col-sm-6">
			<select class="form-control" id="agama" name="agama">
				<option value="">--Pilih Agama--</option>
				<option value="islam">Islam</option>
				<option value="Kristen Protestan">Kristen Protestan</option>
				<option value="Kristen Katolik">Kristen Katolik</option>
				<option value="hindu">Hindu</option>
				<option value="bhuda">Bhuda</option>
				<option value="Khonghucu">Khonghucu</option>
			</select>
		</div>
	</div>

	<div class="form-group row">
		<label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
		<div class="col-sm-6">
			<input class="form-control" type="text" id="tempat_lahir" name="tempat_lahir" autocomplete="off" autofocus="">
		</div>
	</div>

	<div class="form-group row">
		<label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
		<div class="col-sm-6">

			<input class="form-control" type="date" id="tanggal_lahir" name="tanggal_lahir">
		</div>
	</div>

	<div class="form-group row">
		<label for="jabatan" class="col-sm-2 col-form-label">Pendidikan</label>
		<div class="col-sm-6">
			<select class="form-control" id="pendidikan" name="pendidikan">
				<option value="">--Pilih Pendidikan--</option>
				@foreach($pendidikan as $p){
				<option value="{{ $p['id_pendidikan'] }}"> {{ $p['nama_pendidikan'] }}</option>";
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
				<option value="{{ $j['id_jabatan'] }}"> {{ $j['nama_jabatan'] }}</option>";
				@endforeach
			</select>
		</div>
	</div>

	<div class="form-group row">
		<label for="tahun_masuk" class="col-sm-2 col-form-label">Tahun Masuk</label>
		<div class="col-sm-6">
			<input class="form-control" type="text" id="tahun_masuk" name="tahun_masuk" autocomplete="off" autofocus="">
		</div>
	</div>

	<div class="form-group row">
		<label for="no_telepon" class="col-sm-2 col-form-label">Nomor Telepon</label>
		<div class="col-sm-6">
			<input class="form-control" type="text" id="no_telepon" name="no_telepon" autocomplete="off" autofocus="">
		</div>
	</div>

	<div class="form-group row">
		<label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
		<div class="col-sm-6">
			<textarea class="form-control" id="alamat" name="alamat" autocomplete="off" autofocus=""></textarea>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-sm-2 col-form-label">Foto</label>
		<div class="col-sm-6">
			<div class="custom-file">
				<input class="custom-file-input" type="file" id="inputGroupFile02" name="foto">
				<label for="foto" class="custom-file-label">Pilih file</label>
			</div>
		</div>
	</div>

	<button type="submit" class="btn btn-outline-info btn-fw"><i class="oi oi-task"></i>Simpan</button>
	<button type="reset" class="btn btn-outline-danger btn-fw"><i class="oi oi-circle-x"></i>Batal</button>

</form>
	</div>
	</div>
</div>
@endsection
