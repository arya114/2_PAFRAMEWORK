@extends('layouts.global')

@section('title')
Ini Halaman Home
@endsection
@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
					<th>Username</th>
					<th>Nama</th>
					<th>Email</th>
					<th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <!-- untuk penomoran -->
                @php
                $no = 1;
                @endphp

                <!-- untuk menampilkan data -->
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href=/user/{{ $user->id }}/edit class=""><Button class="btn btn-warning mb-3">Edit</Button></a>
                         <form action="{{ route('user.delete', $user->id) }}" method="post" style="display:inline" onsubmit="confirm('Apakah anda yakin ingin menghapus user ini?')">
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