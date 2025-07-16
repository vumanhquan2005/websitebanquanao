@extends('layouts.backend')
@section('title', 'Thêm danh mục con')
@section('contents')
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-8 m-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Thêm danh mục con</h5>
                            </div>

                            <form action="{{ route('admin.categorychild.store') }}" method="POST"
                                enctype="multipart/form-data" class="theme-form">
                                @csrf

                                <!-- Tên danh mục con -->
                                <div class="mb-4 row align-items-center">
                                    <label for="name" class="col-sm-3 col-form-label">Tên danh mục con</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Nhập tên danh mục" required>
                                    </div>
                                </div>

                                <!-- Danh mục cha -->
                                <div class="mb-4 row align-items-center">
                                    <label for="parent_id" class="col-sm-3 col-form-label">Danh mục cha</label>
                                    <div class="col-sm-9">
                                        <select name="parent_id" class="form-control" required>
                                            <option value="">-- Chọn danh mục cha --</option>
                                            @foreach ($parents as $parent)
                                                @if ($parent->is_active)
                                                    <option value="{{ $parent->id }}"
                                                        {{ old('parent_id', $category->parent_id ?? '') == $parent->id ? 'selected' : '' }}>
                                                        {{ $parent->name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Ảnh -->
                                <div class="mb-4 row align-items-center">
                                    <label class="col-sm-3 col-form-label">Ảnh</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                </div>

                                <!-- Thêm dòng này để luôn set is_active = 1 -->
                                <input type="hidden" name="is_active" value="1">

                                <div class="d-flex justify-content-end gap-2">
                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                    <a href="{{ route('admin.categorychild.index') }}" class="btn btn-secondary">Hủy</a>
                                </div>
                            </form>


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
