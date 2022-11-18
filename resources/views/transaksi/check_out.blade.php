@extends('layouts.global')
@section('content')
<div class="container">
    <div class="row"><?php
       $transaksi_utama = \App\Models\transaksi::where('user_id', Auth::user()->id)->first();
       if(!empty($transaksi_utama))
       {
       $notif = \App\Models\transaksi_detail::where('transaksi_id', $transaksi_utama->id)->count(); 
        }
        ?>
        <div class="col-md-12">
            <a href="{{ url('obat') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('obat') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Check Out</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3><i class="fa fa-shopping-cart"></i> Check Out</h3>
                    @if(!empty($transaksi))
                    <p align="right">Tanggal transaksi : {{ $transaksi->tanggal }}</p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($transaksi_details as $transaksi_detail)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $transaksi_detail->obat->nama_obat }}</td>
                                <td>{{ $transaksi_detail->jumlah }} obat</td>
                                <td align="right">Rp. {{ number_format($transaksi_detail->obat->harga) }}</td>
                                <td align="right">Rp. {{ number_format($transaksi_detail->jumlah_harga) }}</td>
                                <td>
                                    <form action="{{ route('transaksi.check_out') }}/{{ $transaksi_detail->id }}" method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data ?');"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="5" align="right"><strong>Total Harga :</strong></td>
                                <td align="right"><strong>Rp. {{ number_format($transaksi->jumlah_harga) }}</strong></td>
                                <td>
                                    <a href="{{ route('transaksi.konfirmasi') }}" class="btn btn-success">
                                        <i class="fa fa-shopping-cart"></i> Check Out
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection