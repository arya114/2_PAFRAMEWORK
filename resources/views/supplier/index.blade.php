@extends('layouts.global')

@section('title')
Ini Halaman Home
@endsection
@section('content')
<div class="card shadow-sm">
    <div class="card-body">
    <a href="{{route('supplier.create')}}" class=""><Button class="btn btn-primary mb-3">Tambah</Button></a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
					<th>Nama supplier</th>
					<th>Alamat</th>
					<th>Kota</th>
					<th>Telpon</th>
					<th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <!-- untuk penomoran -->
                @php
                $no = 1;
                @endphp

                <!-- untuk menampilkan data -->
                @foreach ($suppliers as $supplier)
                <tr>
                    <td>{{ $supplier->id }}</td>
                    <td>{{ $supplier->nama }}</td>
                    <td>{{ $supplier->alamat }}</td>
                    <td>{{ $supplier->kota }}</td>
                    <td>{{ $supplier->telp}}</td>
                    <td>
                        <a href=/supplier/show/{{ $supplier->id }} class=""><Button class="btn btn-success mb-3">Lihat</Button></a>
                        <a href=/supplier/{{ $supplier->id }}/edit class=""><Button class="btn btn-warning mb-3">Edit</Button></a>
                         <form action="{{ route('supplier.delete', $supplier->id) }}" method="post" style="display:inline" onsubmit="confirm('Apakah anda yakin ingin menghapus supplier ini?')">
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