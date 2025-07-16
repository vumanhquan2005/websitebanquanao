@extends('layouts.backend')
@section('title', 'Danh mục con')
@section('contents')
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="title-header option-title">
                                <h5>Danh mục con</h5>
                                <form class="d-inline-flex">
                                    <a href="{{ route('admin.categorychild.create') }}"
                                        class="align-items-center btn btn-theme d-flex">
                                        <i data-feather="plus-square"></i>Thêm danh mục con
                                    </a>
                                </form>
                            </div>

                            <div class="table-responsive category-table">
                                <table class="table all-package theme-table" id="table_id">
                                    <thead>
                                        <tr>
                                            <th>Tên danh mục</th>
                                            <th>Ngày tạo</th>
                                            <th>Ảnh</th>
                                            <th>Danh mục cha</th>
                                            <th>Slug</th>
                                            <th>Trạng thái</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->created_at->format('d-m-Y') }}</td>
                                                <td>
                                                    <div class="table-image">
                                                        <img src="{{ asset($category->image) }}" class="img-fluid"
                                                            width="60" alt="Ảnh danh mục">
                                                    </div>
                                                </td>
                                                <td>
                                                    {{ $category->parent ? $category->parent->name : 'Không có' }}
                                                </td>
                                                <td>{{ $category->slug }}</td>
                                                <td>
                                                    {{ $category->is_active ? 'Hoạt động' : 'Ngừng hoạt động' }}
                                                </td>


                                                <td>
                                                    <ul class="d-flex gap-2">
                                                        {{-- Sửa --}}
                                                        <li>
                                                            <a
                                                                href="{{ route('admin.categorychild.edit', $category->id) }}">
                                                                <i class="ri-pencil-line"></i>
                                                            </a>
                                                        </li>
                                                        {{-- Xóa --}}
                                                        <li>
                                                            <form
                                                                action="{{ route('admin.categorychild.destroy', $category->id) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('Xóa danh mục con này?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    style="border: none; background: none; padding: 0;">
                                                                    <i class="ri-delete-bin-line text-danger"></i>
                                                                </button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @if ($categories->isEmpty())
                                            <tr>
                                                <td colspan="6" class="text-center">Chưa có danh mục con nào.</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
