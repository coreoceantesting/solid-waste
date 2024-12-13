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
        Schema::table('wards', function (Blueprint $table) {
            $table->string('beat_number', 100)->nullable()->after('name');
            $table->string('beat_name', 100)->nullable()->after('beat_number');
            $table->string('end_point', 100)->nullable()->after('beat_name');
            $table->string('collection_mode', 100)->nullable()->after('end_point');
            $table->string('nearest_collection_center', 100)->nullable()->after('collection_mode');
            $table->string('distance_from_collection_center', 100)->nullable()->after('nearest_collection_center');
            $table->string('beat_animal_count', 100)->nullable()->after('distance_from_collection_center');
            $table->string('estimated_number_of_house', 100)->nullable()->after('beat_animal_count');
            $table->string('beat_population', 100)->nullable()->after('estimated_number_of_house');
            $table->string('estimated_beat_residential_count', 100)->nullable()->after('beat_population');
            $table->string('estimated_beat_commercial_count', 100)->nullable()->after('estimated_beat_residential_count');
            $table->string('estimated_establishment_count', 100)->nullable()->after('estimated_beat_commercial_count');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wards', function (Blueprint $table) {
            //
        });
    }
};
