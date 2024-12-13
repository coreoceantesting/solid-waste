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
        Schema::table('slrm_employee_details', function (Blueprint $table) {
            $table->string('collection_center', 100)->nullable()->before('emp_code');
            $table->string('designation', 100)->nullable()->after('collection_center');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('slrm_employee_details', function (Blueprint $table) {
            //
        });
    }
};
