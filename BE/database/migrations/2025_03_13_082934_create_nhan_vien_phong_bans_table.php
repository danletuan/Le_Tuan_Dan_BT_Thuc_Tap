<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('nhan_vien_phong_ban', function (Blueprint $table) {
            $table->unsignedBigInteger('id_phong_ban'); // Khóa ngoại
            $table->unsignedBigInteger('id_nhan_vien'); // Khóa ngoại
            $table->string('chuc_vu');
            $table->timestamps();

            // Khóa ngoại
            $table->foreign('id_phong_ban')->references('id_phong_ban')->on('phong_ban')->onDelete('cascade');
            $table->foreign('id_nhan_vien')->references('id_nhan_vien')->on('nhan_vien')->onDelete('cascade');

            // Khóa chính tổng hợp
            $table->primary(['id_phong_ban', 'id_nhan_vien']);
        });
    }

    public function down() {
        Schema::dropIfExists('nhan_vien_phong_ban');
    }
};
