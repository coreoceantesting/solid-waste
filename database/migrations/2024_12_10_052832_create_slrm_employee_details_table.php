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
        Schema::create('slrm_employee_details', function (Blueprint $table) {
            $table->id();
            $table->string('emp_code', 100)->nullable();
            $table->string('title', 100)->nullable();
            $table->string('f_name', 100)->nullable();
            $table->string('m_name', 100)->nullable();
            $table->string('l_name', 100)->nullable();
            $table->string('gender', 100)->nullable();
            $table->string('m_number', 100)->nullable();
            $table->string('email_id', 100)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('address_one', 100)->nullable();
            $table->string('pin_code', 100)->nullable();
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
        Schema::dropIfExists('slrm_employee_details');
    }
};
