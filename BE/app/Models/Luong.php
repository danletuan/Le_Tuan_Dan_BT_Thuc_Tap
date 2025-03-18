<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Luong extends Model {
    use HasFactory;

    protected $table = 'luong';
    protected $fillable = ['id_nhan_vien', 'so_tien_luong', 'thang_nhan_luong'];

    public function nhanVien() {
        return $this->belongsTo(NhanVien::class, 'id_nhan_vien');
    }
}

