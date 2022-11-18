@extends('layouts.global')
@section('title')
    Show Data Pasien
@endsection
@section('content')
    <div class="container">
        <h3><strong>LIHAT DATA</strong></h3>
        <hr>
        <br>
        <table class="table table-borderless">
            <tr>
                <td>
                    <h4>NO</h4>
                </td>
                <td>
                    <h4>:</h4>
                </td>
                <td>
                    <h4>{{ $supplier->id }}</h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>nama</h4>
                </td>
                <td>
                    <h4>:</h4>
                </td>
                <td>
                    <h4>{{ $supplier->nama }}</h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>Alamat</h4>
                </td>
                <td>
                    <h4>:</h4>
                </td>
                <td>
                    <h4>{{ $supplier->alamat }}</h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>Kota</h4>
                </td>
                <td>
                    <h4>:</h4>
                </td>
                <td>
                    <h4>{{ $supplier->kota }}</h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>NO.HP</h4>
                </td>
                <td>
                    <h4>:</h4>
                </td>
                <td>
                    <h4>{{ $supplier->telp }}</h4>
                </td>
            </tr>
        </table>
    </div>
@endsection
