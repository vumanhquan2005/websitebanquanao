<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
public function index(Request $request)
{
    $query = User::query();

    $query->where('id', '!=', auth()->id());

    if ($request->filled('role')) {
        $query->where('role', $request->role);
    } else {
        // Mặc định chỉ lấy user với role = member (loại trừ admin)
        $query->where('role', 'member');
    }

    if ($request->filled('status')) {
        $query->where('status', $request->status);
    } else {
        // Mặc định chỉ lấy user đang hoạt động
        $query->where('status', 1);
    }

    if ($request->filled('phone')) {
        $query->where('phone', 'like', '%' . $request->phone . '%');
    }

    if ($request->filled('date_from')) {
        $query->whereDate('created_at', '>=', $request->date_from);
    }

    if ($request->filled('date_to')) {
        $query->whereDate('created_at', '<=', $request->date_to);
    }

    $users = $query->orderBy('id', 'desc')->paginate(15)->appends($request->all());

    return view('backend.user.list', compact('users'));
}


// Controller
public function toggleStatus($id)
{
    $user = User::findOrFail($id);
    $user->status = !$user->status;
    $user->save();

    return redirect()->back()->with('success', 'Trạng thái người dùng đã được cập nhật!');
}



    public function create()
    {
        return view('backend.user.create');
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email|max:255',
       'phone' => [
    'required',
    'regex:/^(0(3|5|7|8|9))[0-9]{8}$/',
    'unique:users,phone',
],

        'password' => 'required|string|min:6|confirmed',
        'role' => 'required|in:admin,member',
        'status' => 'required|in:0,1',
        'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ], [
        'name.required' => 'Họ và tên không được bỏ trống.',
        'name.max' => 'Họ và tên tối đa 255 ký tự.',
        'email.required' => 'Email không được bỏ trống.',
        'email.email' => 'Email không hợp lệ.',
        'email.unique' => 'Email đã tồn tại.',
        'email.max' => 'Email tối đa 255 ký tự.',
        'phone.required' => 'Số điện thoại không được bỏ trống.',
        'phone.regex' => 'Số điện thoại không hợp lệ.',
        'phone.unique' => 'Số điện thoại đã tồn tại.',
        'password.required' => 'Mật khẩu không được bỏ trống.',
        'password.min' => 'Mật khẩu tối thiểu 6 ký tự.',
        'password.confirmed' => 'Mật khẩu nhập lại không khớp.',
        'role.required' => 'Vui lòng chọn vai trò.',
        'role.in' => 'Vai trò không hợp lệ.',
        'status.required' => 'Vui lòng chọn trạng thái.',
        'status.in' => 'Trạng thái không hợp lệ.',
        'avatar.image' => 'Tệp tải lên phải là hình ảnh.',
        'avatar.mimes' => 'Chỉ chấp nhận hình ảnh jpeg, png, jpg, gif, svg.',
        'avatar.max' => 'Kích thước ảnh không vượt quá 2MB.',
    ]);

    $data['password'] = bcrypt($data['password']);
    // Xử lý upload avatar nếu có...
        if ($request->hasFile('avatar')) {
        $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
    }
    User::create($data);

    if ($request->ajax() || $request->wantsJson()) {
        return response()->json(['redirect' => route('admin.users.index')]);
    }
    
    return redirect()->route('admin.users.index')->with('success', 'Tạo user thành công!');
}



    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('backend.user.edit', compact('user'));
    }

public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $data = $request->validate([
        'role' => 'required|in:admin,member',
    ], [
        'role.required' => 'Vui lòng chọn vai trò.',
        'role.in' => 'Vai trò không hợp lệ.',
    ]);

    // Nếu user đang đăng nhập cố gắng sửa role của chính mình thì không cho phép
    if (auth()->id() == $user->id && $user->role !== $data['role']) {
        return redirect()->back()->withErrors(['role' => 'Bạn không thể thay đổi quyền của chính mình!']);
    }

    $user->update($data);

    return redirect()->route('admin.users.index')->with('success', 'Cập nhật vai trò người dùng thành công!');
}



    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Xoá user thành công!');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('backend.user.show', compact('user'));
    }
    public function checkEmailExists(Request $request) {
    $exists = User::where('email', $request->email)->exists();
    return response()->json(['exists' => $exists]);
}

public function myaccount()
{
    $user = auth()->user();

    // if (!$user) {
    //     // Nếu chưa đăng nhập, chuyển hướng hoặc báo lỗi
    //     return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để xem tài khoản.');
    // }

    return view('backend.user.myaccount', compact('user'));
}






}
