@extends('layouts.template')
@section('content')

<h4 class="mt-2">Data Jabatan</h4>
<hr>
<a class="btn btn-inverse-primary btn-fw" href="{{ route('jabatan.create') }}"><i class="oi oi-plus"></i>Tambah</a>

@if ($message = Session::get('success'))
	<div class="alert alert-success mt-3 pb-0">
		<p>{{ $message }}</p>
	</div>
@endif

<div class="table-responsive mt-3">
<table class="table table-striped table-hover table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Jabatan</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		
@foreach($jabatan as $data)
	<tr>
		<td><?php echo ++$no ?></td>
		<td>{{$data['nama_jabatan']}}</td>
		<td>
			<a class="btn btn-outline-success btn-fw" href="{{ route('jabatan.edit', $data['id_jabatan']) }}"> <i class="oi oi-pencil"></i>Edit</a>
			<form class="d-inline" method="post" action="{{ route('jabatan.destroy', $data['id_jabatan']) }}">
				{{ method_field('DELETE') }}
				{{ csrf_field() }}
				<button type="submit" class="btn btn-outline-danger btn-fw" onclick="return confirm('Anda yakin ingin menghapus data ini?')"> <i class="oi oi-trash"></i>Hapus</button>
			</form>
		</td>
	</tr>
@endforeach

	</tbody>
</table>
</div>

@endsection