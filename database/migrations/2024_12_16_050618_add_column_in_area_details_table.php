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
        Schema::table('area_details', function (Blueprint $table) {
            $table->string('area_types_id', 100)->nullable()->after('area_type');
            $table->string('ward_id', 100)->nullable()->after('area_types_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('area_details', function (Blueprint $table) {
            //
        });
    }
};
