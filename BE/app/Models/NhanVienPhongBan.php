<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanVienPhongBan extends Model {
    use HasFactory;
    
    protected $table = 'nhan_vien_phong_ban';
    public $timestamps = false;
    
    protected $fillable = ['id_phong_ban', 'id_nhan_vien', 'chuc_vu'];
}
