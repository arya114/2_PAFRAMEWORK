@extends('layouts.global')
@section('title')
    Create Obat
@endsection
@section('content')
    <div class="container">
        <form action="{{ route('obat.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="kode" class="form-label">kode</label>

                <input type="text" class="form-control @error('kode') is-
invalid @enderror" id="kode" name="kode"
                    placeholder="kode Supplier" required>

                @error('kode')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="supplier" class="form-label ">Supplier</label>
                <select name="supplier_id" id="supplier_id" class="form-select

@error('supplier_id') is-invalid @enderror"
                    aria-label="Default select example">
                    <option value="" selected>Pilih</option>
                    @foreach ($suppliers as $supplier)
                        <option value={{ $supplier->id }}>{{ $supplier->nama }}</option>
                    @endforeach
                </select>
                @error('supplier_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nama_obat" class="form-label">nama_obat</label>

                <input type="text" class="form-control @error('nama_obat') is-
invalid @enderror" id="nama_obat" name="nama_obat"
                    placeholder="nama_obat Supplier" required>

                @error('nama_obat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="produsen" class="form-label">produsen</label>

                <input type="text" class="form-control @error('produsen') is-
invalid @enderror" id="produsen" name="produsen"
                    placeholder="produsen Supplier" required>

                @error('produsen')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">stok</label>

                <input type="text" class="form-control @error('stok') is-
invalid @enderror" id="stok" name="stok"
                    placeholder="stok Supplier" required>

                @error('stok')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">harga</label>

                <input type="text" class="form-control @error('harga') is-
invalid @enderror" id="harga" name="harga"
                    placeholder="harga Supplier" required>

                @error('harga')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success">Tambah</button>
            </div>
        </form>
    </div>
@endsection
