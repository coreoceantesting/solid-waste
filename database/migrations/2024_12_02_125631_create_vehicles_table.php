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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('Vehicle_Type', 100)->nullable();
            $table->string('Vehicle_number', 100)->nullable();
            $table->string('Engine_number', 100)->nullable();
            $table->string('vehicle_Reg_Number', 100)->nullable();
            $table->string('vehicle_standard_weight', 100)->nullable();
            $table->string('Manufacturer', 100)->nullable();
            $table->string('vehicle_tracking', 100)->nullable();
            $table->string('Department_owned_vehicle', 100)->nullable();
            $table->string('purchase_date', 100)->nullable();
            $table->string('purchase_price', 100)->nullable();
            $table->string('Source_of_purchase_date', 100)->nullable();
            $table->string('Asset_code', 100)->nullable();
            $table->string('chassis_number', 100)->nullable();
            $table->string('Remarks', 100)->nullable();
            $table->string('ip_address')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->foreignId('deleted_by')->nullable()->constrained('users');
            $table->timestamps();
            $table->softDeletes();        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
