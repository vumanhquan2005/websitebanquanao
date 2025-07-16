@extends('layouts.backend')

@section('title', 'Trang Chủ')

@section('contents')
    <div class="container mt-5">
        <h1>Chào mừng đến với website</h1>

        @guest
            <a href="{{ route('login') }}" class="btn btn-primary me-2">Đăng nhập</a>
            <a href="{{ route('register') }}" class="btn btn-success">Đăng ký</a>
        @else
            <p>Xin chào, {{ auth()->user()->name }}!</p>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger">Đăng xuất</button>
            </form>
        @endguest
    </div>
@endsection
