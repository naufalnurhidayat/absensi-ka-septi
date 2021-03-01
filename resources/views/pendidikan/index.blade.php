@extends('layouts.template')
@section('content')

<h4 class="mt-2">Data Pendidikan</h4>
<hr>
<a class="btn btn-inverse-primary btn-fw" href="{{ route('pendidikan.create') }}"><i class="oi oi-plus"></i>Tambah</a>

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
			<th>Nama Pendidikan</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		
@foreach($pendidikan as $data)
	<tr>
		<td><?php echo ++$no ?></td>
		<td>{{$data['nama_pendidikan']}}</td>
		<td>
			<a class="btn btn-outline-success btn-fw" href="{{ route('pendidikan.edit', $data['id_pendidikan']) }}"> <i class="oi oi-pencil"></i>Edit</a>
			<form class="d-inline" method="post" action="{{ route('pendidikan.destroy', $data['id_pendidikan']) }}">
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