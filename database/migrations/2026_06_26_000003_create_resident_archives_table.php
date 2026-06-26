<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('resident_archives', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 16)->index();
            $table->string('nama');
            $table->string('no_kk', 16)->nullable()->index();
            $table->string('jenis_dokumen');
            $table->string('nomor_dokumen');
            $table->string('file_path')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('resident_archives');
    }
};
