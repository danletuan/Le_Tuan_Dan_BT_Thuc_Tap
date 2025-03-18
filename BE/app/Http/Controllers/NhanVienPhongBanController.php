<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhanVienPhongBan;
use Illuminate\Support\Facades\Validator;

class NhanVienPhongBanController extends Controller
{
    // Lấy danh sách nhân viên - phòng ban
    public function index()
    {
        $data = NhanVienPhongBan::with(['nhanVien', 'phongBan'])->get();
        return view('nhanvienphongban.index', compact('data'));
    }

    // Thêm nhân viên vào phòng ban
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_phong_ban' => 'required|exists:phong_ban,id_phong_ban',
            'id_nhan_vien' => 'required|exists:nhan_vien,id',
            'chuc_vu' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $record = NhanVienPhongBan::create($request->all());
        return response()->json($record, 201);
    }

    // Xóa nhân viên khỏi phòng ban
    public function destroy($id_phong_ban, $id_nhan_vien)
    {
        $record = NhanVienPhongBan::where('id_phong_ban', $id_phong_ban)
                                  ->where('id_nhan_vien', $id_nhan_vien)
                                  ->first();

        if (!$record) {
            return response()->json(['message' => 'Không tìm thấy bản ghi'], 404);
        }

        $record->delete();
        return response()->json(['message' => 'Xóa thành công'], 200);
    }
}
