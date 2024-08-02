<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nis')->unique()->nullable();
            $table->string('kelas')->nullable();
            $table->unsignedBigInteger('jurusan_id')->nullable();
            $table->unsignedBigInteger('rayon_id')->nullable();
            $table->foreign('jurusan_id')->references('id')->on('jurusans')->onDelete('set null');
            $table->foreign('rayon_id')->references('id')->on('rayons')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['jurusan_id']);
            $table->dropForeign(['rayon_id']);
            $table->dropColumn(['nis', 'kelas', 'jurusan_id', 'rayon_id', 'role_id']);
        });
    }
};
