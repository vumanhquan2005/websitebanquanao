@extends('layouts.backend')
@section('title', 'Danh mục')
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
                                <h5>Danh mục cha</h5>
                                <form class="d-inline-flex">
                                    <a href="{{ route('admin.categories.create') }}"
                                        class="align-items-center btn btn-theme d-flex">
                                        <i data-feather="plus-square"></i>Thêm danh mục
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

                                                <td>{{ $category->slug }}</td>
                                                <td>
                                                    {{ $category->is_active ? 'Hoạt động' : 'Ngừng hoạt động' }}<br>
                                                </td>

                                                <td>
                                                    <ul class="d-flex gap-2">
                                                        {{-- Sửa --}}
                                                        <li>
                                                            <a href="{{ route('admin.categories.edit', $category->id) }}">
                                                                <i class="ri-pencil-line"></i>
                                                            </a>
                                                        </li>

                                                        {{-- Xóa --}}
                                                        <li>
                                                            <button type="button"
                                                                class="btn btn-link p-0 btn-delete-category"
                                                                data-id="{{ $category->id }}"
                                                                data-name="{{ $category->name }}"
                                                                style="text-decoration: none;">
                                                                <i class="ri-delete-bin-line text-danger"></i>
                                                            </button>


                                                            <form id="delete-form-{{ $category->id }}"
                                                                action="{{ route('admin.categories.destroy', $category->id) }}"
                                                                method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </li>

                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @if ($categories->isEmpty())
                                            <tr>
                                                <td colspan="6" class="text-center">Chưa có danh mục nào.</td>
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

        <!-- All User Table Ends-->
    </div>
    <!-- Container-fluid end -->
@endsection
