@extends('layouts.backend')
@section('title', 'Cập nhật người dùng')
@section('contents')
    <div class="page-body">
        <div class="container-fluid">
            <h2>Cập nhật người dùng</h2>

            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <br><br>
                    <select id="role" name="role" class="form-select" required>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="member" {{ $user->role == 'member' ? 'selected' : '' }}>Member</option>
                    </select>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-danger">Quay lại</a>
                </div>

            </form>
        </div>
    </div>
@endsection
