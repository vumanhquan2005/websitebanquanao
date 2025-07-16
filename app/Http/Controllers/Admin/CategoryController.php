<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    // Lấy danh sách danh mục cha (parent_id = NULL)
    public function index()
    {
        $categories = Category::whereNull('parent_id')->orderBy('id', 'desc')->get();
        return view('backend.category.list', compact('categories'));
    }

    // Form tạo danh mục cha
    public function create()
    {
        return view('backend.category.create');
    }

    // Form sửa danh mục cha
    public function edit($id)
    {
        $category = Category::whereNull('parent_id')->findOrFail($id);
        return view('backend.category.edit', compact('category'));
    }

    // Lấy danh sách danh mục con (parent_id != NULL)
    public function listChild()
    {
        $categories = Category::whereNotNull('parent_id')->with('parent')->orderBy('id', 'desc')->get();
        return view('backend.category.listcatchild', compact('categories'));
    }

    // Form tạo danh mục con
    public function createChild()
    {
        // Chỉ lấy danh mục cha đang active
        $parents = Category::whereNull('parent_id')->where('is_active', 1)->get();
        return view('backend.category.createcatchild', compact('parents'));
    }

    // Form sửa danh mục con
    public function editChild($id)
    {
        $category = Category::whereNotNull('parent_id')->findOrFail($id);
        $parents = Category::whereNull('parent_id')->where('is_active', 1)->get();
        return view('backend.category.editcatchild', compact('category', 'parents'));
    }

    // Lưu danh mục (dùng chung cho cả cha và con)
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'parent_id' => 'nullable|exists:categories,id',
        'is_active' => 'required|boolean',
        'slug' => 'nullable|string|max:255',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048'
    ]);

    $slug = Str::slug($request->slug ?: $request->name);

    // Xử lý ảnh
    $imagePath = null;
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/categories'), $imageName);
        $imagePath = 'uploads/categories/' . $imageName;
    }

    if ($request->parent_id) {
        $parent = Category::where('id', $request->parent_id)->where('is_active', 1)->first();
        if (!$parent) {
            return back()->withErrors(['parent_id' => 'Danh mục cha không hợp lệ hoặc đang bị ẩn!'])->withInput();
        }

        $category = Category::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'is_active' => $request->is_active,
            'is_activechild' => null,
            'slug' => $slug,
            'image' => $imagePath,
        ]);

        // Cập nhật is_activechild cho danh mục cha
        $activeChildren = Category::where('parent_id', $parent->id)->where('is_active', 1)->count();
        $parent->is_activechild = $activeChildren > 0 ? 1 : 0;
        $parent->save();

        return redirect()->route('admin.categorychild.index')->with('success', 'Thêm danh mục con thành công!');
    } else {
        $category = Category::create([
            'name' => $request->name,
            'parent_id' => null,
            'is_active' => $request->is_active,
            'is_activechild' => 0,
            'slug' => $slug,
            'image' => $imagePath,
        ]);
        return redirect()->route('admin.categories.index')->with('success', 'Thêm danh mục cha thành công!');
    }
}

    // Sửa danh mục (dùng chung cho cả cha và con)
  public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'parent_id' => 'nullable|exists:categories,id',
        'is_active' => 'required|boolean',
        'slug' => 'nullable|string|max:255',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048'
    ]);

    $slug = Str::slug($request->slug ?: $request->name);

    $category = Category::findOrFail($id);

    // Xử lý ảnh mới (nếu có)
    if ($request->hasFile('image')) {
        if ($category->image && file_exists(public_path($category->image))) {
            @unlink(public_path($category->image));
        }
        $image = $request->file('image');
        $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/categories'), $imageName);
        $category->image = 'uploads/categories/' . $imageName;
    }

    if ($category->parent_id) {
        // Danh mục con
        $oldParentId = $category->parent_id;
        $parent = Category::where('id', $request->parent_id)->where('is_active', 1)->first();
        if (!$parent) {
            return back()->withErrors(['parent_id' => 'Danh mục cha không hợp lệ hoặc đang bị ẩn!'])->withInput();
        }

        $category->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'is_active' => $request->is_active,
            'slug' => $slug,
            'image' => $category->image,
        ]);

        // Cập nhật lại cha mới
        $activeChildren = Category::where('parent_id', $parent->id)->where('is_active', 1)->count();
        $parent->is_activechild = $activeChildren > 0 ? 1 : 0;
        $parent->save();

        // Cập nhật cha cũ nếu có thay đổi
        if ($oldParentId != $request->parent_id) {
            $oldParent = Category::find($oldParentId);
            if ($oldParent) {
                $activeChildrenOld = Category::where('parent_id', $oldParent->id)->where('is_active', 1)->count();
                $oldParent->is_activechild = $activeChildrenOld > 0 ? 1 : 0;
                $oldParent->save();
            }
        }

        return redirect()->route('admin.categorychild.index')->with('success', 'Cập nhật danh mục con thành công!');
    } else {
        // Danh mục cha
        if ($request->is_active == 0 && $category->is_activechild == 1) {
            return back()->withErrors(['is_active' => 'Không thể tắt vì còn danh mục con đang hoạt động!'])->withInput();
        }

        $category->update([
            'name' => $request->name,
            'is_active' => $request->is_active,
            'slug' => $slug,
            'image' => $category->image,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Cập nhật danh mục cha thành công!');
    }
}


    // Xóa danh mục (cha hoặc con)
     public function destroy($id)
    {
        $category = Category::findOrFail($id);

        // Xóa ảnh nếu có
        if ($category->image && file_exists(public_path($category->image))) {
            @unlink(public_path($category->image));
        }

        if (!$category->parent_id) {
            $category->delete();
            return redirect()->route('admin.categories.index')->with('success', 'Xóa danh mục cha thành công!');
        } else {
            $parent = $category->parent;
            $category->delete();

            // Sau khi xóa con, cập nhật lại is_activechild cho cha
            if ($parent) {
                $activeChildren = $parent->children()->where('is_active', 1)->count();
                $parent->is_activechild = $activeChildren > 0 ? 1 : 0;
                $parent->save();
            }

            return redirect()->route('admin.categorychild.index')->with('success', 'Xóa danh mục con thành công!');
        }
    }
}
