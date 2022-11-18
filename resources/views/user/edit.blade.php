@extends('layouts.global')
@section('title')
    Edit user
@endsection
@section('content')
    <div class="container">
        <form action="{{ route('user.update', $user->id) }}" method="post">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="username" class="form-label">username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username"
                    value="{{ $user->username }}" placeholder="username user" required>
                @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    name="name" value="{{ $user->name }}" placeholder="name" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                    name="email" value="{{ $user->email }}" placeholder="email" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            <div class="mb-3">
                <button type="submit" class="btn btn-success">Tambah</button>
            </div>
        </form>
    </div>
@endsection
