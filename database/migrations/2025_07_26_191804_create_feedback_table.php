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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('alamat');
            $table->string('jenis_layanan');
            $table->date('tanggal_pelayanan');
            $table->unsignedTinyInteger('penilaian'); // 1-5
            $table->text('perlu_diperbaiki')->nullable();
            $table->text('saran')->nullable();
            $table->boolean('bersedia_dihubungi')->default(false);
            $table->string('kontak')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
