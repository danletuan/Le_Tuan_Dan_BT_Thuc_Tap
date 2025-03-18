<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('nhan_vien', function (Blueprint $table) {
            $table->id('id_nhan_vien'); // Khóa chính
            $table->string('ho_ten');
            $table->date('ngay_sinh');
            $table->enum('gioi_tinh', ['Nam', 'Nữ']);
            $table->string('so_dien_thoai')->unique();
            $table->string('email')->unique();
            $table->string('dia_chi');
            $table->string('avatar')->nullable();
            $table->timestamps();
        });
        
    }

    public function down() {
        Schema::dropIfExists('nhan_vien');
    }
};
