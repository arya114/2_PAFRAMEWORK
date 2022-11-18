@extends('layouts.global')
@section('title')
    Create Supplier
@endsection
@section('content')
    <div class="container">
        <form action="{{ route('supplier.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>

                <input type="text" class="form-control @error('nama') is-
invalid @enderror" id="nama" name="nama"
                    placeholder="Nama Supplier" required>

                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="alamat" class="form-label">alamat</label>

                <input type="text" class="form-control @error('alamat') is-
invalid @enderror" id="alamat" name="alamat"
                    placeholder="alamat pasien" required>

                @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kota" class="form-label">kota</label>

                <input type="text" class="form-control @error('kota') is-
invalid @enderror" id="kota" name="kota"
                    placeholder="kota pasien" required>

                @error('kota')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="telp" class="form-label">telp</label>

                <input type="text" class="form-control @error('telp') is-
invalid @enderror" id="telp" name="telp"
                    placeholder="telp pasien" required>

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
