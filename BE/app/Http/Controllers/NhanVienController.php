<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhanVien;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class NhanVienController extends Controller
{
    // Lấy danh sách nhân viên
    public function index()
    {
        $nhanviens = NhanVien::all(); // Lấy tất cả nhân viên từ DB
        return view('nhanvien.index', compact('nhanviens')); // Trả về View
    }

    public function create() {
        return view('nhanvien.create'); // Trả về view chứa form nhập
    }

    // Lấy thông tin nhân viên theo ID
    public function show($id)
    {
        $nhanVien = NhanVien::find($id);
        if (!$nhanVien) {
            return response()->json(['message' => 'Nhân viên không tồn tại'], 404);
        }
        return response()->json($nhanVien, 200);
    }

    // Thêm nhân viên mới
    public function store(Request $request)
    {
        try {
            // Validate dữ liệu đầu vào
            $request->validate([
                'ho_ten' => 'required|string|max:255',
                'ngay_sinh' => 'required|date',
                'gioi_tinh' => 'required|string',
                'so_dien_thoai' => 'required|string|max:15',
                'email' => 'required|email|unique:nhan_vien,email',
                'dia_chi' => 'required|string',
                'avatar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            ]);
    
            // Xử lý upload ảnh
            if ($request->hasFile('avatar')) {
                $avatarPath = $request->file('avatar')->store('avatars', 'public');
            } else {
                $avatarPath = null;
            }
    
            // Tạo nhân viên mới
            NhanVien::create([
                'ho_ten' => $request->ho_ten,
                'ngay_sinh' => $request->ngay_sinh,
                'gioi_tinh' => $request->gioi_tinh,
                'so_dien_thoai' => $request->so_dien_thoai,
                'email' => $request->email,
                'dia_chi' => $request->dia_chi,
                'avatar' => $avatarPath,
            ]);
    
            return redirect('/nhanvien')->with('success', 'Thêm nhân viên thành công!');
    
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Lỗi xảy ra: ' . $e->getMessage()]);
        }
    }

    // Cập nhật nhân viên
    public function update(Request $request, $id)
    {
        $nhanVien = NhanVien::find($id);
        if (!$nhanVien) {
            return response()->json(['message' => 'Nhân viên không tồn tại'], 404);
        }

        $nhanVien->update($request->all());
        return response()->json($nhanVien, 200);
    }

    // Xóa nhân viên
    public function destroy($id)
    {
        $nhanVien = NhanVien::find($id);
        if (!$nhanVien) {
            return response()->json(['message' => 'Nhân viên không tồn tại'], 404);
        }

        $nhanVien->delete();
        return response()->json(['message' => 'Xóa nhân viên thành công'], 200);
    }
}
