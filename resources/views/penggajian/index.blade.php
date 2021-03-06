@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
                <div class="panel-heading">Penggajian</div>

                <div class="panel-body">
                    <a href="{{url('/gaji/create')}}" class="btn btn-success btn-block">Tambah Penggajian</a><br>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Kode Tunjangan</td>
                                <td>Jumlah Jam Lembur</td>
                                <td>Jumlah Uang Lembur</td>
                                <td>Gaji Pokok </td>
                                <td>Total Gaji</td>
                                <td>Tanggal Pengambilan</td>
                                <td>Status Pengambilan</td>
                                <td>Petugas Penerima</td>
                                <td colspan="2">Pilihan:</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            @foreach ($gajian as $data)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$data->TunjanganPegawai->Tunjangan->kode_tunjangan}}</td>
                                    <td>{{$data->jumlah_jam_lembur}}
                                    <td>{{$data->jumlah_uang_lembur}}</td>
                                    <th><center><?php echo 'Rp.'. number_format($data->TunjanganPegawai->Tunjangan->Jabatan
                                    ->besaran_uang+$data->TunjanganPegawai->Tunjangan->Golongan
                                    ->besaran_uang,2,",","."); ?></center>
                                    <td>{{$data->total_gaji}}</td>
                                    <td>{{$data->tgl_pengambilan}}</td>
                                    <td>{{$data->status_pengambilan}}</td>
                                    <td>{{$data->petugas_penerima}}</td>
                                    <td><a href="{{route('gaji.edit',$data->id)}}" class="btn btn-warning">Ubah</a></td>
                                    <td>
                                    {!! Form::open(['method' => 'DELETE', 'route'=>['gaji.destroy', $data->id]]) !!}
                                    {!! Form::submit('Hapus', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
