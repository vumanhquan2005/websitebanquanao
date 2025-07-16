@extends('layouts.backend')
@section('title', 'Sửa danh mục con')
@section('contents')
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-8 m-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Chỉnh sửa danh mục con</h5>
                            </div>

                            <form action="{{ route('admin.categorychild.update', $category->id) }}" method="POST"
                                enctype="multipart/form-data" class="theme-form theme-form-2 mega-form">
                                @csrf
                                @method('PUT')

                                {{-- Tên danh mục --}}
                                <div class="mb-4 row align-items-center">
                                    <label for="name" class="form-label-title col-sm-3 mb-0">Tên danh mục</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" id="name" class="form-control"
                                            value="{{ old('name', $category->name) }}" required>
                                    </div>
                                </div>

                                {{-- Chọn danh mục cha --}}
                                <div class="mb-4 row align-items-center">
                                    <label for="parent_id" class="form-label-title col-sm-3 mb-0">Danh mục cha</label>
                                    <div class="col-sm-9">
                                        <select name="parent_id" id="parent_id" class="form-select" required>
                                            <option value="">-- Chọn danh mục cha --</option>
                                            @foreach ($parents as $parent)
                                                <option value="{{ $parent->id }}"
                                                    {{ old('parent_id', $category->parent_id) == $parent->id ? 'selected' : '' }}>
                                                    {{ $parent->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- Ảnh hiện tại --}}
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Ảnh hiện tại</label>
                                    <div class="col-sm-9">
                                        @if ($category->image)
                                            <img src="{{ asset($category->image) }}" class="img-thumbnail" width="100">
                                        @else
                                            <span class="text-muted">Chưa có ảnh</span>
                                        @endif
                                    </div>
                                </div>

                                {{-- Upload ảnh mới --}}
                                <div class="mb-4 row align-items-center">
                                    <label for="image" class="form-label-title col-sm-3 mb-0">Ảnh mới</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="image" id="image" class="form-control">
                                    </div>
                                </div>

                                {{-- Trạng thái --}}
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Trạng thái</label>
                                    <div class="col-sm-9">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="is_active" id="active_yes"
                                                value="1"
                                                {{ old('is_active', $category->is_active) == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="active_yes">Hoạt động</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="is_active" id="active_no"
                                                value="0"
                                                {{ old('is_active', $category->is_active) == 0 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="active_no">Ngừng hoạt động</label>
                                        </div>
                                    </div>
                                </div>




                                {{-- Nút lưu --}}
                                <div class="d-flex justify-content-end gap-2">
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                    <a href="{{ route('admin.categorychild.index') }}" class="btn btn-secondary">Hủy</a>
                                </div>
                            </form>

                            {{-- Hiển thị lỗi --}}
                            @if ($errors->any())
                                <div class="alert alert-danger mt-3">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
