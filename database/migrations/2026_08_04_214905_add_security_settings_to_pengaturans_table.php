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

            $table->decimal('latitude',10,7)->nullable();

            $table->decimal('longitude',10,7)->nullable();

            $table->integer('radius')->default(100);

            $table->boolean('use_gps')->default(true);

            $table->boolean('use_selfie')->default(false);

            $table->boolean('use_device')->default(false);

            $table->boolean('use_working_hours')->default(true);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengaturans', function (Blueprint $table) {

            $table->dropColumn([
                'latitude',
                'longitude',
                'radius',
                'use_gps',
                'use_selfie',
                'use_device',
                'use_working_hours'
            ]);

        });
    }
};
