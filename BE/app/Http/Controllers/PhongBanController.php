<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhongBan;
use Illuminate\Support\Facades\Validator;

class PhongBanController extends Controller
{
    // Lấy danh sách phòng ban
    public function index()
    {
        $phongBans = PhongBan::all();
        return view('phongban.index', compact('phongBans')); // Trả về View
    }

    // Lấy thông tin phòng ban theo ID
    public function show($id)
    {
        $phongBan = PhongBan::find($id);
        if (!$phongBan) {
            return response()->json(['message' => 'Phòng ban không tồn tại'], 404);
        }
        return response()->json($phongBan, 200);
    }

    // Thêm phòng ban mới
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_phong_ban' => 'required|string|unique:phong_ban',
            'ten_phong_ban' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $phongBan = PhongBan::create($request->all());
        return response()->json($phongBan, 201);
    }

    // Cập nhật phòng ban
    public function update(Request $request, $id)
    {
        $phongBan = PhongBan::find($id);
        if (!$phongBan) {
            return response()->json(['message' => 'Phòng ban không tồn tại'], 404);
        }

        $phongBan->update($request->all());
        return response()->json($phongBan, 200);
    }

    // Xóa phòng ban
    public function destroy($id)
    {
        $phongBan = PhongBan::find($id);
        if (!$phongBan) {
            return response()->json(['message' => 'Phòng ban không tồn tại'], 404);
        }

        $phongBan->delete();
        return response()->json(['message' => 'Xóa phòng ban thành công'], 200);
    }
}
