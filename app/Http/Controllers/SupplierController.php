<?php

namespace App\Http\Controllers;

use App\Models\supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    //
    public function index(){
        return view('supplier.index', [
            'suppliers' =>supplier::all(),
            'title' =>'Supplier'
        ]);
    }

    public function create() {
        return view('supplier.create', [
            'title' => 'Supplier'
        ]);
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string|max:100',
            'kota' => 'required|string|max:100',
            'telp' => 'required|string|max:100'
        ]);

        supplier::create($validateData);

        return redirect()->route('supplier.index')->with('success', 'Pasien berhasil ditambahkan');
    }

    public function show(Supplier $id) {
        return view('supplier.show', [
            'title' => 'Supplier',
            'supplier' =>$id
        ]);
    }

    public function edit(Supplier $id) {
        return view('supplier.edit', [
            'title' => 'Supplier',
            'supplier' => $id,
        ]);
    }

    public function update(Request $request, $id) {
        $supplier = Supplier::findOrFail($id);
        $validateData = $request->validate([
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string|max:100',
            'kota' => 'required|string|max:100',
            'telp' => 'required|string|max:100'
        ]);

        $supplier->update($validateData);

        return redirect()->route('supplier.index')->with('success', 'supplier berhasil Diupdate');
    }

    public function destroy($id) {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return redirect()->route('supplier.index')->with('success', 'supplier berhasil Dihapus');
    }
}
