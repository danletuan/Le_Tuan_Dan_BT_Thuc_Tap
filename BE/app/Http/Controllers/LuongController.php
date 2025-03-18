<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Luong;
use Illuminate\Support\Facades\Validator;

class LuongController extends Controller
{
    // Lấy danh sách lương
    public function index()
    {
        $luongs = Luong::with('nhanVien')->get(); // Lấy dữ liệu lương kèm thông tin nhân viên
        return view('luong.index', compact('luongs')); // Trả về View
    }

    // Lấy thông tin lương theo ID
    public function show($id)
    {
        $luong = Luong::with('nhanVien')->find($id);
        if (!$luong) {
            return response()->json(['message' => 'Lương không tồn tại'], 404);
        }
        return response()->json($luong, 200);
    }

    // Thêm lương mới
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_nhan_vien' => 'required|exists:nhan_vien,id',
            'so_tien_luong' => 'required|numeric|min:0',
            'thang_nhan_luong' => 'required|date_format:Y-m',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $luong = Luong::create($request->all());
        return response()->json($luong, 201);
    }

    // Cập nhật thông tin lương
    public function update(Request $request, $id)
    {
        $luong = Luong::find($id);
        if (!$luong) {
            return response()->json(['message' => 'Lương không tồn tại'], 404);
        }

        $luong->update($request->all());
        return response()->json($luong, 200);
    }

    // Xóa lương
    public function destroy($id)
    {
        $luong = Luong::find($id);
        if (!$luong) {
            return response()->json(['message' => 'Lương không tồn tại'], 404);
        }

        $luong->delete();
        return response()->json(['message' => 'Xóa lương thành công'], 200);
    }
}
