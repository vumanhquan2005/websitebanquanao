@extends('layouts.backend')
@section('title', 'Người dùng')
@section('contents')
    <!-- Container-fluid starts-->
    <div class="page-body">
        <!-- All User Table Start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="title-header option-title">
                                <h5>Danh sách người dùng</h5>

                                <form class="d-inline-flex mb-3">
                                    <a href="{{ url('admin/users/create') }}" class="align-items-center btn btn-theme d-flex">
                                        <i data-feather="plus"></i>Thêm mới
                                    </a>
                                </form>
                            </div>
                            <form method="GET" action="{{ route('admin.users.index') }}" class="row g-2 mb-3">
                                <div class="col-md-2">
                                    <select name="role" class="form-control">
                                        <option value="">-- Vai trò --</option>
                                        <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin
                                        </option>
                                        <option value="member" {{ request('role') == 'member' ? 'selected' : '' }}>Member
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select name="status" class="form-control">
                                        <option value="">-- Trạng thái --</option>
                                        <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Hoạt động
                                        </option>
                                        <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Ngừng hoạt
                                            động</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="phone" class="form-control" value="{{ request('phone') }}"
                                        placeholder="Số điện thoại">
                                </div>
                                <div class="col-md-2">
                                    <input type="date" name="date_from" class="form-control"
                                        value="{{ request('date_from') }}" placeholder="Từ ngày">
                                </div>
                                <div class="col-md-2">
                                    <input type="date" name="date_to" class="form-control"
                                        value="{{ request('date_to') }}" placeholder="Đến ngày">
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-theme w-100">Lọc</button>
                                </div>
                            </form>


                            <div class="table-responsive table-product">
                                <table class="table all-package theme-table" id="table_id">
                                    <thead>
                                        <tr>
                                            <th>Ảnh</th>
                                            <th>Tên</th>
                                            <th>Số điện thoại</th>
                                            <th>Email</th>
                                            <th>Tùy chọn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $user)
                                            <tr id="user-row-{{ $user->id }}"> <!-- THÊM id Ở ĐÂY -->
                                                <td>
                                                    <div class="table-image">
                                                        @if ($user->avatar)
                                                            <img src="{{ asset('storage/' . $user->avatar) }}"
                                                                class="img-fluid" alt="">
                                                        @else
                                                            <img src="{{ asset('assets/images/users/default-avatar.png') }}"
                                                                class="img-fluid" alt="">
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="user-name">
                                                        <span>{{ $user->name }}</span>
                                                    </div>
                                                </td>
                                                <td>{{ $user->phone ?? '-' }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    <ul>
                                                        <li>
                                                            <a href="javascript:void(0)" class="btn-toggle-status"
                                                                data-url="{{ route('admin.users.toggleStatus', $user->id) }}"
                                                                title="{{ $user->status ? 'Ẩn user này' : 'Hiện user này' }}">
                                                                @if ($user->status)
                                                                    <i class="ri-eye-line"></i>
                                                                @else
                                                                    <i class="ri-eye-off-line"></i>
                                                                @endif
                                                            </a>

                                                        </li>
                                                        <li>
                                                            <a href="{{ route('admin.users.edit', $user->id) }}">
                                                                <i class="ri-pencil-line"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0)" class="btn-delete"
                                                                data-url="{{ route('admin.users.destroy', $user->id) }}">
                                                                <i class="ri-delete-bin-line"></i>
                                                            </a>
                                                        </li>


                                                    </ul>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">Không có người dùng nào.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- All User Table Ends-->

        <div class="container-fluid">
            <!-- footer start-->
            <footer class="footer">
                <div class="row">
                    <div class="col-md-12 footer-copyright text-center">
                        <p class="mb-0">Copyright 2022 © Fastkart theme by pixelstrap</p>
                    </div>
                </div>
            </footer>
            <!-- footer end-->
        </div>
    </div>
    <!-- Container-fluid end -->
@endsection
