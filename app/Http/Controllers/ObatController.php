<?php

namespace App\Http\Controllers;

use App\Models\obat;
use App\Models\supplier;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    //
    public function index(){
        return view('obat.index', [
            'obats' =>obat::all(),
            'title' =>'Obat'
        ]);
    }

    public function create() {
        return view('obat.create', [
            "suppliers" => supplier::all(),
            'title' => 'Obat'
        ]);
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            'kode' => 'required|string|max:100',
            'supplier_id' => 'required',
            'nama_obat' => 'required|string|max:100',
            'produsen' => 'required|string|max:100',
            'stok' => 'required|string|max:100',
            'harga' => 'required|string|max:100',
        ]);

        obat::create($validateData);

        return redirect()->route('obat.index')->with('success', 'Pasien berhasil ditambahkan');
    }

    public function show(obat $id) {
        return view('obat.show', [
            'title' => 'Obat',
            'obat' =>$id
        ]);
    }

    public function edit(obat $id) {
        return view('obat.edit', [
            'title' => 'obat',
            'obat' => $id,
            'suppliers' => supplier::all()
        ]);
    }

    public function update(Request $request, $id) {
        $obat = obat::findOrFail($id);
        $validateData = $request->validate([
            'kode' => 'required|string|max:100',
            'supplier_id' => 'required',
            'nama_obat' => 'required|string|max:100',
            'produsen' => 'required|string|max:100',
            'stok' => 'required|string|max:100',
            'harga' => 'required|string|max:100',
        ]);

        $obat->update($validateData);

        return redirect()->route('obat.index')->with('success', 'obat berhasil Diupdate');
    }

    public function destroy($id) {
        $obat = Obat::findOrFail($id);
        $obat->delete();
        return redirect()->route('obat.index')->with('success', 'obat berhasil Dihapus');
    }
}
