@extends('layouts.backend')

@section('title', 'Đăng ký')

@section('contents')
    <div class="container mt-5">
        <h2>Đăng ký tài khoản</h2>
        <form method="POST" action="{{ route('register.submit') }}">
            @csrf
            <div class="mb-3">
                <label for="name">Họ và tên</label>
                <input id="name" type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}"
                    required>
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
            <div class="mb-3">
                <label for="password_confirmation">Xác nhận mật khẩu</label>
                <input id="password_confirmation" type="password" name="password_confirmation" class="form-control"
                    required>
            </div>
            <!-- Tạm ẩn chọn role đi, để mặc định member -->
            <!-- <div class="mb-3">
                <label for="role">Vai trò</label>
                <select id="role" name="role" class="form-select">
                    <option value="member" selected>Member</option>
                    <option value="admin">Admin</option>
                </select>
            </div> -->
            <button type="submit" class="btn btn-primary">Đăng ký</button>
        </form>
    </div>
@endsection
