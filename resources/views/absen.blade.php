@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <!-- <div class="panel-heading"></div> -->

                <div class="panel-body">
                        <form action="/absen_users" method="post">

                            {{csrf_field()}}
                               <tr>
                                  <td colspan="2">
                                    <input type="text" name="id_pegawai" class="form-control" placeholder="Isi Id Pegawai Anda"> 
                                  </td>
                               </tr>
                               <br>
                                  <td>
                                    <button type="submit" class="btn btn-flat btn-primary" name="btnIn">ABSEN MASUK</button>
                                  </td>
                                  <td>
                                    <button type="submit" class="btn btn-flat btn-primary" name="btnOut">ABSEN KELUAR</button>
                                  </td>
                                </br>
                            </form>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <br>
                  Keterangan:
                          <br>
                          <br>
                          <td>
                            <h1>
                              <ul>
                                <li>Merah: Telat</li>
                              </ul>
                              <ul>
                                <li>Kuning: Pulang Cepat</li>
                              </ul>
                              <ul>
                                <li>Hijau: Lembur</li>
                              </ul>
                            </h1>
                          </td>
                <hr>
                <div class="panel-heading text-center">Riwayat Absensi</div>
                <hr>
                <div class="panel-body">
                    <table border="1" class="table table-hover">
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
                           @forelse($data_absen as $absen)
                           <?php 
                            $jam_masuk = $absen->jam_masuk; 
                            $jam_keluar = $absen->jam_keluar;
                            $bg_colorin = ($jam_masuk > '09:00:00') ? "red;" : 'white';
                            $bg_colorout = ($jam_keluar < '16:40:00' && $jam_keluar != '') ? "yellow" : 'white';
                            $date = strtotime($jam_keluar);
                            $jam = date('H', $date);
                            $lembur = $jam-17;
                            $lembur = ($lembur < 0) ? 0 : $lembur;
                            $bg_colorout = ($lembur != 0) ? 'green' : $bg_colorout;

                            ?>
                                <tr>
                                    <td>{{$absen->nama_pegawai}}</td>
                                    <td>{{$absen->tanggal}}</td>
                                    <td style="background:{{$bg_colorin}}">{{$jam_masuk}}</td>
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
                    </table>
                   {!! $data_absen->links() !!} 
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function reportPDF(){
        let id_pegawai = $('select[name="id_pegawai"').val();
        let tanggal_sebelum = $('#tanggal_sebelum').val();
        let tanggal_sesudah = $('#tanggal_sesudah').val();
        let url = "{{action('AbsenController@PDFfilter')}}";
        let go_to_url = url+'?dari_tanggal='+tanggal_sebelum+'&&sampai_tanggal='+tanggal_sesudah+'&&id_pegawai='+id_pegawai;
        window.open(go_to_url, '_blank');
    }
</script>
@endsection

