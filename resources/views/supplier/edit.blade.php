@extends('layouts.global')
@section('title')
    Edit Supplier
@endsection
@section('content')
    <div class="container">
        <form action="{{ route('supplier.update', $supplier->id) }}" method="post">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                    value="{{ $supplier->nama }}" placeholder="Nama supplier" required>
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">alamat</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                    name="alamat" value="{{ $supplier->alamat }}" placeholder="alamat" required>
                @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kota" class="form-label">kota</label>
                <input type="text" class="form-control @error('kota') is-invalid @enderror" id="kota"
                    name="kota" value="{{ $supplier->kota }}" placeholder="kota" required>
                @error('kota')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
           <div class="mb-3">
                <label for="telp" class="form-label">telp</label>
                <input type="text" class="form-control @error('telp') is-invalid @enderror" id="telp" name="telp"
                    value="{{ $supplier->telp }}" placeholder="telp supplier" required>
                @error('telp')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success">Tambah</button>
            </div>
        </form>
    </div>
@endsection
