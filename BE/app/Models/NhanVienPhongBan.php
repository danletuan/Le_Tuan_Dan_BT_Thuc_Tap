<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanVienPhongBan extends Model {
    use HasFactory;

    protected $table = 'nhan_vien_phong_ban';
    public $timestamps = false; // Bảng này không có cột created_at và updated_at

    protected $fillable = ['id_phong_ban', 'id_nhan_vien', 'chuc_vu'];

    public function nhanVien() {
        return $this->belongsTo(NhanVien::class, 'id_nhan_vien');
    }

    public function phongBan() {
        return $this->belongsTo(PhongBan::class, 'id_phong_ban');
    }
}
