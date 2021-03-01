@extends('layouts.template')

@section('content')
<h4 class="mt-2">Edit Pendidikan</h4>
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

<form method="post" action="{{ route('pendidikan.update', $pendidikan['id_pendidikan']) }}">
	{{ method_field('PUT') }}
	{{ csrf_field() }}
	<div class="form-group row">
		<label for="nama" class="col-sm-2 col-form-label">Nama Pendidikan</label>
		<div class="col-sm-4">
			<input class="form-control" type="text" id="nama" name="nama" autocomplete="off" autofocus="" value="{{ $pendidikan['nama_pendidikan'] }}">
		</div>
	</div>

	<button type="submit" class="btn btn-outline-info btn-fw"><i class="oi oi-task"></i>Simpan</button>
	<button type="reset" class="btn btn-outline-danger btn-fw"><i class="oi oi-circle-x"></i>Batal</button>

</form>
@endsection