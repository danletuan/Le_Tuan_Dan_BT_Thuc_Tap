<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Luong extends Model {
    use HasFactory;

    protected $table = 'luong';
    protected $fillable = ['id_nhan_vien', 'so_tien_luong', 'thang_nhan_luong'];

    // Mối quan hệ với Nhân Viên
    public function nhanVien()
    {
        return $this->belongsTo(NhanVien::class, 'id_nhan_vien');
    }

    public static function tongLuongNhanVien($thang)
    {
        $date = \Carbon\Carbon::parse($thang); // Chuyển chuỗi `YYYY-MM` thành đối tượng Carbon

        return self::select('id_nhan_vien', DB::raw('SUM(so_tien_luong) as tong_luong'))
            ->whereYear('thang_nhan_luong', $date->year) // Lọc theo năm
            ->whereMonth('thang_nhan_luong', $date->month) // Lọc theo tháng
            ->groupBy('id_nhan_vien')
            ->with('nhanVien')
            ->get();
    }
}

