@extends('layouts.global')

@section('title')
Ini Halaman Home
@endsection
@section('content')
<div class="card shadow-sm">
    <div class="card-body">
       <?php
       $transaksi_utama = \App\Models\transaksi::where('user_id', Auth::user()->id)->first();
       if(!empty($transaksi_utama))
       {
       $notif = \App\Models\transaksi_detail::where('transaksi_id', $transaksi_utama->id)->count(); 
        }
        ?>
    </div>
</div>
</div>
@endsection