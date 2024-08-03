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
            $table->string('kecakapan_softskill')->default('tidak')->after('kecakapan_hardskill');
            $table->string('bebas_tunggakan')->default('tidak')->after('kecakapan_softskill');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('kecakapan_softskill');
            $table->dropColumn('bebas_tunggakan');
        });
    }
};
