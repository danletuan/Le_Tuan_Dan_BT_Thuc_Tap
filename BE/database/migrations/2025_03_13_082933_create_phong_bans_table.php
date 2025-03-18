<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('phong_ban', function (Blueprint $table) {
            $table->id('id_phong_ban'); // Khóa chính
            $table->string('ten_phong_ban')->unique();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('phong_ban');
    }
};
