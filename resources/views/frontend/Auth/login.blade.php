@extends('layouts.backend')

@section('title', 'Đăng nhập')

@section('contents')
    <div class="container mt-5">
        <h2>Đăng nhập</h2>
        <form method="POST" action="{{ route('login.submit') }}">
            @csrf
            <div class="mb-3">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password">Mật khẩu</label>
                <input id="password" type="password" name="password" class="form-control" required>
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Đăng nhập</button>
        </form>
    </div>
@endsection
