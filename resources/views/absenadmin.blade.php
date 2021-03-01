@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <!-- <div class="panel-heading"></div> -->

                <div class="panel-body">
                        <form action="/absenadmin" method="get">

                            {{csrf_field()}}
                            <h6 style="font-family: agency-fb; font-size: 25px;">Cetak Laporan Absensi Periode Tanggal</h6>
                            <br>  
                                <div class="form-group row" style="margin-left: 1px;">
                                    <label for="id_pegawai" class="col-form-label">Nama Pegawai</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" id="id_pegawai" name="id_pegawai">
                                            <option value="">--Pilih Nama Pegawai--</option>
                                            @foreach($data_pegawai as $p){
                                            <option value="{{ $p['id_pegawai'] }}"> {{ $p['nama_pegawai'] }}</option>";
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                               <div class="form-group" style="float: left;">
                                   <label>Dari Tanggal</label>      
                                   <input type="date" name="dari_tanggal" class="form-control" placeholder="Dari Tanggal" id="tanggal_sebelum">
                               </div>

                               <div class="form-group" style="float: left; margin-left: 3%;">
                                  <label>Sampai Tanggal</label>
                                  <input type="date" name="sampai_tanggal" class="form-control" placeholder="Sampai Tanggal" id="tanggal_sesudah">
                               </div>

                               <td>
                                  <button class="btn btn-primary btn-xs" type="submit" name="pencarian"  style="font-size: 15px; height: 51px; margin-left: 25px; margin-top: 20px;">&nbsp;Tampilkan</button>
                               </td>

                               <div class="form-group" style="margin-top: 45px;">
                                  <label>Laporan Absensi</label>
                                  <button class="btn btn-flat btn-success" style="font-size: 15px; height: 50px; margin-left: 25px; margin-bottom: 20px;" onclick="reportPDF();">Print</button>
                               </div>

                               <h6 style="font-family: agency-fb; font-size: 25px;">Cetak Laporan Absensi Seluruh Pegawai</h6>

                               <div class="form-group" style="margin-top: 45px;">
                                  <label>Laporan Absensi</label>
                                  <a href="{{Action('AbsenController@PDFall')}}" class="btn btn-flat btn-success" style="font-size: 15px; height: 50px; margin-left: 25px; margin-bottom: 20px;">Print</a>
                                  <a href="/absenadmin" class="btn btn-primary btn-info" name="refresh" style="font-size: 15px; height: 51px; margin-bottom: 20px; margin-left: 20px;">Refresh</a>
                               
                               </div>
                            </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-8 col-md-offset-2">
                      <div class="panel panel-default">
                          
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
  
