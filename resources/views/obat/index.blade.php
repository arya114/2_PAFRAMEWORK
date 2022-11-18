@extends('layouts.global')

@section('title')
Ini Halaman Home
@endsection
@section('content')
<div class="card shadow-sm">
    <div class="card-body">

    <a href="{{route('obat.create')}}" class=""><Button class="btn btn-primary mb-3">Tambah</Button></a>
        <li class="nav-item">
        <a class="nav-link" href="{{ route('transaksi.check_out') }}">
        <i class="fa fa-shopping-cart"></i>
        </a>
        </li>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
					<th>Kode Obat</th>
					<th>Nama Obat</th>
					<th>Harga</th>
					<th>Produsen</th>
					<th>Supplier</th>
					<th>Stok</th>
					<th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <!-- untuk penomoran -->
                @php
                $no = 1;
                @endphp

                <!-- untuk menampilkan data -->
                @foreach ($obats as $obat)
                <tr>
                    <th scope="row">{{ $obat->id }}</th>
                    <td>{{ $obat->kode }}</td>
                    <td>{{ $obat->nama_obat }}</td>
                    <td>{{ $obat->harga }}</td>
                    <td>{{ $obat->produsen }}</td>
                    <td>{{ $obat->supplier->nama }}</td>
                    <td>{{ $obat->stok }}</td>
                    <td>
                    
                        <a href=/obat/show/{{ $obat->id }} class=""><Button class="btn btn-success mb-3">Add</Button></a>
                        <a href=/obat/{{ $obat->id }}/edit class=""><Button class="btn btn-warning mb-3">Edit</Button></a>
                         <form action="{{ route('obat.delete', $obat->id) }}" method="post" style="display:inline" onsubmit="confirm('Apakah anda yakin ingin menghapus supplier ini?')">
                        @csrf
                        @method('delete')
                        <Button type="submit" class="btn btn-danger mb-3">Delete</Button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection