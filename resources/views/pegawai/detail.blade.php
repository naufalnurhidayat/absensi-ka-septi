@extends('layouts.template')

@section('content')
<div class="card text-justify p-5 col-sm-9">
<div class= "judul alert alert-primary col-sm-12">
<h4 class="judul">Data {{$pegawai['nama_pegawai']}}</h4>
</div>
@if($errors->any())
    <div class="alert alert-danger pb-0">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

{{method_field ('PUT')}}
{{csrf_field()}}
<div class="form-group row">
        <div class="col-sm-12">  
            <img class="img-thumbnail mt-2" src="{{asset ('images/'.$pegawai['foto'])}}" width="150" alt="" srcset="">                                                     
        </div>
    </div>
<div class="form-group row">
        <label for="Pass" class="col-sm-2 col-form-label">NIP</label>
        <div class="col-sm-6">
           <label class="col-sm-6 col-form-label">:&emsp; {{$pegawai['nip']}}</label>
        </div>
    </div>
    <div class="form-group row">
        <label for="nama" class="col-sm-2 col-form-label">
        Nama
        </label>
        <div class="col-sm-6">
           <label class="col-sm-12 col-form-label">:&emsp; {{$pegawai['nama_pegawai']}}</label>
        </div>
    </div>
    <div class="form-group row">
        <label for="nama" class="col-sm-2 col-form-label">
        Email
        </label>
        <div class="col-sm-6">
           <label class="col-sm-12 col-form-label">:&emsp; {{$pegawai['email']}}</label>
        </div>
    </div>
    <div class="form-group row">
        <label for="usia" class="col-sm-2 col-form-label">
        Usia
        </label>
        <div class="col-sm-6">
           <label class="col-sm-6 col-form-label">:&emsp; {{$pegawai['usia']}}</label>
        </div>
    </div>
    <div class="form-group row">
        <label for="gender" class="col-sm-2 col-form-label">
        Jenis Kelamin
        </label>
        <div class="col-sm-6">
           <label class="col-sm-6 col-form-label">:&emsp; {{$pegawai['jenis_kelamin']}}</label>
        </div>
    </div>
    <div class="form-group row">
        <label for="Jabatan" class="col-sm-2 col-form-label">
        Jabatan
        </label>
        <div class="col-sm-8">
           <label class="col-sm-6 col-form-label">:&emsp; {{$pegawai['nama_jabatan']}}</label>
        </div>
        </div>
    <div class="form-group row">
        <label for="Jabatan" class="col-sm-4 col-form-label">
        Pendidikan
        </label>
        <div class="col-sm-6">
           <label class="col-sm-6 col-form-label" style="position:relative;right:100px;">:&emsp; {{$pegawai['nama_pendidikan']}}</label>
        </div>
    </div>
    <div class="form-group row">
        <label for="pendidikan" class="col-sm-2 col-form-label">
        Agama
        </label>
        <div class="col-sm-6">
           <label class="col-sm-6 col-form-label">:&emsp; {{$pegawai['agama']}}</label>
        </div>

    </div>
    <div class="form-group row">
        <label for="telp" class="col-sm-2 col-form-label">
        Nomor Telepon
        </label>
        <div class="col-sm-6">
           <label class="col-sm-12 col-form-label">:&emsp; {{$pegawai['no_telepon']}}</label>
        </div>
    </div>
    <div class="form-group row">
        <label for="tahun" class="col-sm-2 col-form-label">
        Tahun Masuk
        </label>
        <div class="col-sm-6">
           <label class="col-sm-6 col-form-label">:&emsp; {{$pegawai['tahun_masuk']}}</label>
        </div>
    </div>
    <div class="form-group row">
        <label for="tempat_lahir" class="col-sm-2 col-form-label">
        Tempat Lahir
        </label>
        <div class="col-sm-6">
           <label class="col-sm-6 col-form-label">:&emsp; {{$pegawai['tempat_lahir']}}</label>
        </div>
    </div>
    <div class="form-group row">
        <label for="tgl" class="col-sm-2 col-form-label">
        Tanggal Lahir
        </label>
        <div class="col-sm-6">
           <label class="col-sm-6 col-form-label">:&emsp; {{$pegawai['tanggal_lahir']}}</label>
        </div>
    </div>
    <div class="form-group row">
        <label for="tgl" class="col-sm-2 col-form-label">
        Alamat
        </label>
        <div class="col-sm-6">
           <label class="col-sm-12 col-form-label">:&emsp; {{$pegawai['alamat']}}</label>
        </div>
    </div>
    <a href="{{route('pegawai.index')}}" class="btn btn-success">Kembali</a>
</div>
@endsection




