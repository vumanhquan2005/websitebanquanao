@extends('layouts.backend')
@section('title', 'Thêm danh mục')
@section('contents')
    <div class="page-body">
        <!-- New Product Add Start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-8 m-auto">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header-2">
                                        <h5>Thêm danh mục</h5>
                                    </div>

                                    {{-- Laravel form --}}
                                    <form action="{{ route('admin.categories.store') }}" method="POST"
                                        enctype="multipart/form-data" class="theme-form theme-form-2 mega-form">
                                        @csrf

                                        {{-- Category Name --}}
                                        <div class="mb-4 row align-items-center">
                                            <label for="name" class="form-label-title col-sm-3 mb-0">Tên danh mục
                                            </label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="name" id="name"
                                                    placeholder="Category Name" value="{{ old('name') }}" required>
                                            </div>
                                        </div>

                                        {{-- Category Image --}}
                                        <div class="mb-4 row align-items-center">
                                            <label for="image" class="col-sm-3 col-form-label form-label-title">Ảnh
                                            </label>
                                            <div class="form-group col-sm-9">
                                                <input type="file" name="image" id="image" class="form-control">
                                            </div>
                                        </div>

                                        {{-- Trạng thái --}}
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Trạng thái</label>
                                            <div class="col-sm-9">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="is_active"
                                                        id="active_yes" value="1"
                                                        {{ old('is_active', 1) == 1 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="active_yes">Hoạt động</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="is_active"
                                                        id="active_no" value="0"
                                                        {{ old('is_active') == 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="active_no">Ngừng hoạt động</label>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Submit --}}
                                        <div class="d-flex justify-content-end gap-2">
                                            <button type="submit" class="btn btn-primary">Lưu danh mục</button>
                                            <a href="{{ route('admin.categories.index') }}"
                                                class="btn btn-secondary">Hủy</a>
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

                                </div> <!-- card-body -->
                            </div> <!-- card -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- New Product Add End -->
    </div>
@endsection
