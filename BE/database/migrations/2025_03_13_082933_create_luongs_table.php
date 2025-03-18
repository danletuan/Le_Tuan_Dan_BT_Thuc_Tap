<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('luong', function (Blueprint $table) {
            $table->unsignedBigInteger('id_nhan_vien'); // Khóa ngoại
            $table->decimal('so_tien_luong', 15, 2);
            $table->date('thang_nhan_luong');
            $table->timestamps();
        
        });
        
    }

    public function down() {
        Schema::dropIfExists('luong');
    }
};
