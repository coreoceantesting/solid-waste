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
        Schema::create('collection_centers', function (Blueprint $table) {
            $table->id();
            $table->string('p_name', 100)->nullable();
            $table->string('p_cat', 100)->nullable();
            $table->string('d_of_op', 100)->nullable();
            $table->string('decentral', 100)->nullable();
            $table->string('p_own', 100)->nullable();
            $table->string('location', 100)->nullable();
            $table->string('p_capacity', 100)->nullable();
            $table->string('inte_with_plant', 100)->nullable();
            $table->string('inte_with_id', 100)->nullable();
            $table->string('wtc', 100)->nullable();
            $table->string('rdf', 100)->nullable();
            $table->string('inte_c_t', 100)->nullable();
            $table->string('Arrangement', 100)->nullable();
            $table->string('pro_num', 100)->nullable();
            $table->string('p_view', 100)->nullable();
            $table->string('m_view', 100)->nullable();
            $table->string('p_code', 100)->nullable();
            $table->string('p_cost', 100)->nullable();
            $table->string('p_prog', 100)->nullable();
            $table->string('a_code', 100)->nullable();
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
        Schema::dropIfExists('collection_centers');
    }
};
