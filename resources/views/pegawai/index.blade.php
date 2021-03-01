@extends('layouts.template')
@section('content')


<h4 class="mt-2">Data Pegawai</h4>
<hr>
<a class="btn btn-inverse-primary btn-fw" href="{{ route('pegawai.create') }}"><i class="oi oi-plus"></i> Tambah </a>

@if ($message = Session::get('success'))
	<div class="alert alert-success mt-3 pb-0">
		<p>{{ $message }}</p>
	</div>
@endif

<div class="table-responsive mt-3">
<table class="table table-striped table-hover table-bordered" id="myTable">
	<thead>
		<tr>
			<th>No</th>
			<th>NIP</th>
			<th>Nama</th>
			<th>Jenis Kelamin</th>
			<th>Alamat</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
@foreach($pegawai as $data)
	<tr>
		<td><?php echo ++$no ?></td>
		<td>{{$data['nip']}}</td>
		<td>{{$data['nama_pegawai']}}</td>
		<td>{{$data['jenis_kelamin']}}</td>
		<td>{{$data['alamat']}}</td>
		<td>
			<a class="btn btn-outline-success" href="{{ route('pegawai.edit', $data['id_pegawai']) }}"> <i class="oi oi-pencil"></i> Edit </a>
			<form class="d-inline" method="post" action="{{ route('pegawai.destroy', $data['id_pegawai']) }}">
				{{ method_field('DELETE') }}
				{{ csrf_field() }}
				<button type="submit" class="btn btn-outline-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')"> <i class="oi oi-trash"></i> Hapus </button>
			</form>
			<a href="{{ route('pegawai.show',$data['id_pegawai']) }}" class="btn btn-outline-warning ml-5 mt-2" > Detail </a>
		</td>
	</tr>
@endforeach
	</tbody>
</table>
</div>

@endsection
