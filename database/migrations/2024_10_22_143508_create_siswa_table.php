<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('siswa', function (Blueprint $table) {
        $table->id();
        $table->string('nama_lengkap');
        $table->string('tempat_lahir');
        $table->date('tanggal_lahir');
        $table->string('alamat');
        $table->string('telepon_ayah')->nullable();
        $table->string('telepon_ibu')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
