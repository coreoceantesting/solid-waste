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
        Schema::create('task_mappings', function (Blueprint $table) {
            $table->id();
            $table->string('zone', 100)->nullable();
            $table->string('ward', 100)->nullable();
            $table->string('colony', 100)->nullable();
            $table->string('society', 100)->nullable();
            $table->string('task', 100)->nullable();
            $table->string('waste_type', 100)->nullable();
            $table->string('garbage_volume', 100)->nullable();
            $table->string('beat_number', 100)->nullable();
            $table->string('employee_count', 100)->nullable();
            $table->string('vehicle_count', 100)->nullable();
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
        Schema::dropIfExists('task_mappings');
    }
};
