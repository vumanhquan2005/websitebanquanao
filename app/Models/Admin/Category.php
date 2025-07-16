<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Nếu dùng Laravel 8+ thì nên set tên table luôn cho chắc
    protected $table = 'categories';

    // Các trường được phép gán dữ liệu hàng loạt
    protected $fillable = [
        'name',
        'image',
        'parent_id',
        'is_active',
        'is_activechild',
        'slug',
    ];

    // Quan hệ: Lấy danh mục con của một danh mục cha
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // Quan hệ: Lấy danh mục cha của một danh mục con
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Scope: Chỉ lấy các danh mục cha (parent_id = NULL)
    public function scopeParent($query)
    {
        return $query->whereNull('parent_id');
    }

    // Scope: Chỉ lấy các danh mục con (parent_id != NULL)
    public function scopeChild($query)
    {
        return $query->whereNotNull('parent_id');
    }

    // Scope: Danh mục đang hoạt động
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}
