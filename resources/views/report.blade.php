<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<style>
	table{
		margin-top:100px;
	}
	thead{
		background-color:rgb(42, 134, 177);
	}
	.title{
		text-align:center;
	}
	img{
		width:100px;
	}
	</style>
</head>
<body onload="window.print();close();">
	<div class="title">
		<img src="{{asset('assets/images/logo.png')}}" alt="logo" width="50px" height="70px">
		<h1>Laporan Absen PT Amanah Umroh Handal</h1>
		<hr>
	</div>
		 <table align="center" border="1s" width="">
                        <thead>
                            <tr>
                                <th>Nama Pegawai</th>
                                <th>Tanggal</th>
                                <th>Jam Masuk</th>
                                <th>Jam Keluar</th>
                                <th>Lembur</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                <tbody>
                    <?php $total_lembur = 0; ?>
                           @forelse($data_absen as $absen)
                           <?php 
                            $jam_masuk = $absen->jam_masuk; 
                            $jam_keluar = $absen->jam_keluar;
                            $bg_colorin = ($jam_masuk > '09:00:00') ? "#ef3737;" : 'white';
                            $bg_colorout = ($jam_keluar < '17:00:00' && $jam_keluar != '') ? "yellow" : 'white';
                            $date = strtotime($jam_keluar);
                            $jam = date('H', $date);
                            $lembur = $jam-17;
                            $lembur = ($lembur < 0) ? 0 : $lembur;
                            $bg_colorout = ($lembur != 0) ? 'green' : $bg_colorout;
                            $total_lembur += $lembur;
                            ?>

                                <tr>
                                    <td>{{$absen->nama_pegawai}}</td>
                                    <td>{{$absen->tanggal}}</td>
                                    <td style="background:{{$bg_colorin}}">{{$absen->jam_masuk}}</td>
                                    <td style="background:{{$bg_colorout}}">{{$jam_keluar}}</td>
                                    <td>{{ $lembur }} Jam</td>
                                    <td>{{$absen->catatan}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6"><b><i>TIDAK ADA DATA UNTUK DITAMPILKAN</i></b></td>
                                </tr>
                            @endforelse 
                </tbody>
                <tr>
                    <td >Total Lembur</td>
                    <td colspan="5">{{$total_lembur}} Jam</td>
                </tr>
    	</table>
	</body>
</html>	