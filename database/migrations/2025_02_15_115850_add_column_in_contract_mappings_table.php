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
        Schema::table('contract_mappings', function (Blueprint $table) {
            $table->string('contract_name', 100)->nullable()->after('contract_number');
            $table->string('contact_number', 100)->nullable()->after('contract_name');
            $table->string('contract_date', 100)->nullable()->after('contact_number');
            $table->string('expiry_date', 100)->nullable()->after('contract_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contract_mappings', function (Blueprint $table) {
            //
        });
    }
};
