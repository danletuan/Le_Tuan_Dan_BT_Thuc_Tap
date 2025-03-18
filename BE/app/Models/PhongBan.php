<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongBan extends Model {
    use HasFactory;

    protected $table = 'phong_ban';
    protected $primaryKey = 'id_phong_ban'; // Định nghĩa khóa chính
    public $incrementing = false; // Không tự động tăng ID nếu là chuỗi
    protected $keyType = 'string'; // Nếu id_phong_ban là dạng string

    protected $fillable = ['id_phong_ban', 'ten_phong_ban'];
    public function nhanViens() {
        return $this->belongsToMany(NhanVien::class, 'nhan_vien_phong_ban', 'id_phong_ban', 'id_nhan_vien')
                    ->withPivot('chuc_vu');
    }
    
}
