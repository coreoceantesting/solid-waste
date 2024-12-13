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
        Schema::table('capacity_of_vehicles', function (Blueprint $table) {

            $table->string('vehicle_id', 100)->nullable()->after('waste_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('capacity_of_vehicles', function (Blueprint $table) {
            //
        });
    }
};
