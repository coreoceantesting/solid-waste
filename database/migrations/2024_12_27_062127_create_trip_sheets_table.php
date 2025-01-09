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
        Schema::create('trip_sheets', function (Blueprint $table) {
            $table->id();
            $table->string('trip_date', 100)->nullable();
            $table->string('beat_number', 100)->nullable();
            $table->string('vehicle_number', 100)->nullable();
            $table->string('collection_center', 100)->nullable();
            $table->string('in_time', 100)->nullable();
            $table->string('out_time', 100)->nullable();
            $table->string('entry_weight', 100)->nullable();
            $table->string('exit_weight', 100)->nullable();
            $table->string('total_garbage', 100)->nullable();
            $table->string('driver_name', 100)->nullable();
            $table->string('weight_slip_number', 100)->nullable();
            $table->string('file_upload', 100)->nullable();
            $table->string('waste_segregated', 100)->nullable();
            $table->string('ip_address')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->foreignId('deleted_by')->nullable()->constrained('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trip_sheets');
    }
};
