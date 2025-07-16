@extends('layouts.backend')
@section('title', 'Tài khoản của tôi')

@section('contents')
    <div class="page-body">
        <div class="container-fluid">
            <h2 class="mb-4">Tài khoản của tôi</h2>

            <div class="card p-4 shadow-sm">
                <div class="row align-items-center">
                    <div class="col-md-3 text-center">
                        @if ($user->avatar)
                            <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar"
                                class="img-thumbnail rounded-circle" style="max-width: 150px;">
                        @else
                            <img src="{{ asset('assets/images/users/default-avatar.png') }}" alt="Default Avatar"
                                class="img-thumbnail rounded-circle" style="max-width: 150px;">
                        @endif
                    </div>

                    <div class="col-md-9">
                        <dl class="row">
                            <dt class="col-sm-3">Họ và tên:</dt>
                            <dd class="col-sm-9">{{ $user->name }}</dd>

                            <dt class="col-sm-3">Email:</dt>
                            <dd class="col-sm-9">{{ $user->email }}</dd>

                            <dt class="col-sm-3">Số điện thoại:</dt>
                            <dd class="col-sm-9">{{ $user->phone ?? '-' }}</dd>

                            <dt class="col-sm-3">Vai trò:</dt>
                            <dd class="col-sm-9">{{ ucfirst($user->role) }}</dd>

                            <dt class="col-sm-3">Trạng thái:</dt>
                            <dd class="col-sm-9">
                                @if ($user->status)
                                    <span class="badge bg-success">Hoạt động</span>
                                @else
                                    <span class="badge bg-danger">Ngừng hoạt động</span>
                                @endif
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
