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
        Schema::create('absensis', function (Blueprint $table) {

            $table->id();

            $table->foreignId('guru_id')->constrained()->cascadeOnDelete();

            $table->date('tanggal');

            $table->string('keterangan')->nullable();

            $table->time('jam_masuk')->nullable();

            $table->time('jam_pulang')->nullable();

            $table->enum('status', [
                'Hadir',
                'Terlambat',
                'Izin',
                'Sakit',
                'Alfa',
            ])->default('Alfa');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensis');
    }
};
