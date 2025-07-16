@extends('layouts.backend')
@section('title', 'Thêm người dùng')
@section('contents')
    <!-- Page Sidebar Start -->
    <div class="page-body">
        <!-- New User start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-8 m-auto">
                            <div class="card">
                                <div class="card-body">
                                    <div class="title-header option-title mb-4">
                                        <h5>Thêm người dùng mới</h5>
                                    </div>

                                    <form id="form-add-user" class="theme-form theme-form-2 mega-form"
                                        action="{{ route('admin.users.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        {{-- Họ và tên --}}
                                        <div class="mb-4 row align-items-center">
                                            <label class="col-lg-2 col-md-3 col-form-label form-label-title">
                                                Họ và tên <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-md-9 col-lg-10">
                                                <input class="form-control @error('name') is-invalid @enderror"
                                                    name="name" type="text" value="{{ old('name') }}"
                                                    placeholder="@error('name') {{ $message }} @else Họ và tên @enderror">
                                                @error('name')
                                                    <span class="invalid-feedback d-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Email --}}
                                        <div class="mb-4 row align-items-center">
                                            <label class="col-lg-2 col-md-3 col-form-label form-label-title">
                                                Email <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-md-9 col-lg-10">
                                                <input class="form-control @error('email') is-invalid @enderror"
                                                    name="email" type="email" value="{{ old('email') }}"
                                                    placeholder="@error('email') {{ $message }} @else Email @enderror">
                                                @error('email')
                                                    <span class="invalid-feedback d-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Số điện thoại --}}
                                        <div class="mb-4 row align-items-center">
                                            <label class="col-lg-2 col-md-3 col-form-label form-label-title">
                                                Số điện thoại <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-md-9 col-lg-10">
                                                <input class="form-control @error('phone') is-invalid @enderror"
                                                    name="phone" type="text" value="{{ old('phone') }}"
                                                    placeholder="@error('phone') {{ $message }} @else Số điện thoại @enderror">
                                                @error('phone')
                                                    <span class="invalid-feedback d-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Mật khẩu --}}
                                        <div class="mb-4 row align-items-center">
                                            <label class="col-lg-2 col-md-3 col-form-label form-label-title">
                                                Mật khẩu <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-md-9 col-lg-10">
                                                <input class="form-control @error('password') is-invalid @enderror"
                                                    name="password" type="password"
                                                    placeholder="@error('password') {{ $message }} @else Mật khẩu @enderror">
                                                @error('password')
                                                    <span class="invalid-feedback d-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Nhập lại mật khẩu --}}
                                        <div class="mb-4 row align-items-center">
                                            <label class="col-lg-2 col-md-3 col-form-label form-label-title">
                                                Nhập lại mật khẩu <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-md-9 col-lg-10">
                                                <input
                                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                                    name="password_confirmation" type="password"
                                                    placeholder="@error('password_confirmation') {{ $message }} @else Nhập lại mật khẩu @enderror">
                                                @error('password_confirmation')
                                                    <span class="invalid-feedback d-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Vai trò --}}
                                        <div class="mb-4 row align-items-center">
                                            <label class="col-lg-2 col-md-3 col-form-label form-label-title">Vai trò</label>
                                            <div class="col-md-9 col-lg-10">
                                                <select class="form-select @error('role') is-invalid @enderror"
                                                    name="role">
                                                    <option value="member"
                                                        {{ old('role', 'member') == 'member' ? 'selected' : '' }}>Thành
                                                        viên</option>
                                                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>
                                                        Quản trị viên</option>
                                                </select>
                                                @error('role')
                                                    <span class="invalid-feedback d-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Trạng thái --}}
                                        <div class="mb-4 row align-items-center">
                                            <label class="col-lg-2 col-md-3 col-form-label form-label-title">Trạng
                                                thái</label>
                                            <div class="col-md-9 col-lg-10">
                                                <select class="form-select @error('status') is-invalid @enderror"
                                                    name="status">
                                                    <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>
                                                        Hoạt động</option>
                                                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>
                                                        Ngừng hoạt động</option>
                                                </select>
                                                @error('status')
                                                    <span class="invalid-feedback d-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Ảnh đại diện --}}
                                        <div class="mb-4 row align-items-center">
                                            <label class="col-lg-2 col-md-3 col-form-label form-label-title">Ảnh đại
                                                diện</label>
                                            <div class="col-md-9 col-lg-10">
                                                <input class="form-control @error('avatar') is-invalid @enderror"
                                                    name="avatar" type="file" accept="image/*">
                                                @error('avatar')
                                                    <span class="invalid-feedback d-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mt-4 d-flex justify-content-center gap-3">
                                            <button type="submit" class="btn btn-primary px-4">
                                                <i class="ri-user-add-line me-1"></i> Thêm người dùng
                                            </button>
                                            <a href="{{ route('admin.users.index') }}"
                                                class="btn btn-outline-secondary px-4">
                                                <i class="ri-arrow-go-back-line me-1"></i> Quay lại
                                            </a>
                                        </div>
                                    </form>
                                    {{-- Nếu bạn muốn làm phần phân quyền (permission), mình sẽ hỗ trợ sau nhé --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- New User End -->
    </div>
    <!-- Page Sidebar End -->
@endsection
