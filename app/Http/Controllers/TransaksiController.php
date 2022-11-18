<?php

namespace App\Http\Controllers;

use App\Models\obat;
use App\Models\transaksi;
use App\Models\transaksi_detail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    //

    public function index($id)
    {
        $obat = obat::where('id', $id)->first();

        return view('transaksi.index', compact('obat'));
    }

    public function transaksi(Request $request, $id)
    {
        $obat = obat::where('id', $id)->first();
        $tanggal = Carbon::now();



        $cek_transaksi = transaksi::where('user_id', Auth::user()->id)->first();

        if (empty($cek_transaksi)) {
            $transaksi = new transaksi;
            $transaksi->user_id = Auth::user()->id;
            $transaksi->tanggal = $tanggal;
            $transaksi->jumlah_harga = 0;
            $transaksi->save();
        }

        $transaksi_baru = transaksi::where('user_id', Auth::user()->id)->first();

        $cek_transaksi_detail = transaksi_detail::where('obat_id', $obat->id)->where('transaksi_id', $transaksi_baru->id)->first();
        if (empty($cek_transaksi_detail)) {
            $transaksi_detail = new transaksi_detail;
            $transaksi_detail->obat_id = $obat->id;
            $transaksi_detail->transaksi_id = $transaksi_baru->id;
            $transaksi_detail->jumlah = $request->jumlah_transaksi;
            $transaksi_detail->jumlah_harga = $obat->harga * $request->jumlah_transaksi;
            $transaksi_detail->save();
        } else {
            $transaksi_detail = transaksi_detail::where('obat_id', $obat->id)->where('transaksi_id', $transaksi_baru->id)->first();

            $transaksi_detail->jumlah = $transaksi_detail->jumlah + $request->jumlah_transaksi;


            $harga_transaksi_detail_baru = $obat->harga * $request->jumlah_transaksi;
            $transaksi_detail->jumlah_harga = $transaksi_detail->jumlah_harga + $harga_transaksi_detail_baru;
            $transaksi_detail->update();
        }

        $transaksi = transaksi::where('user_id', Auth::user()->id)->first();
        $transaksi->jumlah_harga = $transaksi->jumlah_harga + $obat->harga * $request->jumlah_transaksi;
        $transaksi->update();


        return redirect('obat');
    }


    public function check_out()
    {
        $transaksi = transaksi::where('user_id', Auth::user()->id)->first();
        if (!empty($transaksi))
         {
            $transaksi_details = transaksi_detail::where('transaksi_id', $transaksi->id)->get();

        }

        return view('transaksi.check_out', compact('transaksi', 'transaksi_details'));
    }

    public function delete($id)
    {
        $transaksi_detail = transaksi_detail::where('id', $id)->first();

        $transaksi = transaksi::where('id', $transaksi_detail->transaksi_id)->first();
        $transaksi->jumlah_harga = $transaksi->jumlah_harga - $transaksi_detail->jumlah_harga;
        $transaksi->update();


        $transaksi_detail->delete();

        return redirect('transaksi');
    }

    public function konfirmasi()
    {
        $transaksi = transaksi::where('user_id', Auth::user()->id)->first();
        $transaksi_id = $transaksi->id;
        $transaksi->update();

        $transaksi_details = transaksi_detail::where('transaksi_id', $transaksi_id)->get();
        foreach ($transaksi_details as $transaksi_detail) {
            $obat = obat::where('id', $transaksi_detail->obat_id)->first();
            $obat->stok = $obat->stok - $transaksi_detail->jumlah;
            $obat->update();
        }

        return redirect('obat');
    }
}