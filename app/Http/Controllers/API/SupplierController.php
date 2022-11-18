<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    //
    public function getSupplier()
    {
        $supplier = Supplier::get();

        $respon = [
            'status' => 'success',
            'msg' => 'Berhasil mengambil data Supplier',
            'data' => $supplier
        ];
        return response()->json($respon);
    }

    public function supplier($id)
    {
        $supplier = Supplier::where('id', $id)->get();
        $respon = [
            'status' => 'success',
            'msg' => 'Berhasil Mengambil data Supplier',
            'data' => $supplier,
        ];
        return response()->json($respon);
    }

    public function createSupplier(Request $request)
    {

        $supplier = supplier::create(
            [
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'kota' => $request->kota,
                'telp' => $request->telp,
            ]
        );
        $respon = [
            'status' => 'success',
            'msg' => 'Berhasil Membuat data Supplier',
            'data' => $supplier,
        ];
        return response()->json($respon);
    }
}
