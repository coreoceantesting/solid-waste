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
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id', 100)->nullable();
            $table->string('emp_name', 100)->nullable();
            $table->string('emp_dep', 100)->nullable();
            $table->string('emp_pos', 100)->nullable();
            $table->string('emp_contract_number', 100)->nullable();
            $table->string('emp_email', 100)->nullable();
            $table->string('emp_d_of_j', 100)->nullable();
            $table->string('status', 100)->nullable();
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
        Schema::dropIfExists('schools');
    }
};
