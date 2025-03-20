<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    use HasFactory;

    protected $table = 'nhan_vien';
    protected $primaryKey = 'id_nhan_vien';
    public $timestamps = true;
    protected $fillable = [
        'ho_ten', 'ngay_sinh', 'gioi_tinh', 'so_dien_thoai', 'email', 'dia_chi', 'avatar'
    ];
    
    // Mối quan hệ với Phòng Ban thông qua bảng trung gian
    public function phongBan()
    {
        return $this->belongsToMany(PhongBan::class, 'nhan_vien_phong_ban', 'id_nhan_vien', 'id_phong_ban')
                    ->withPivot('chuc_vu');
    }

    // Mối quan hệ với bảng Lương
    public function luong()
    {
        return $this->hasMany(Luong::class, 'id_nhan_vien');
    }
    
}

