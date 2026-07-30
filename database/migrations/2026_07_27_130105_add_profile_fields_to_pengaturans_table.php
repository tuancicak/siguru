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
    Schema::table('pengaturans', function (Blueprint $table) {

        $table->string('alamat')->nullable();

        $table->string('telepon')->nullable();

        $table->string('email')->nullable();

        $table->string('website')->nullable();

        $table->string('logo')->nullable();

        $table->time('jam_pulang')->nullable();

    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    Schema::table('pengaturans', function (Blueprint $table) {

        $table->dropColumn([
            'alamat',
            'telepon',
            'email',
            'website',
            'logo',
            'jam_pulang',
        ]);

    });
    }
};
