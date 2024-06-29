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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('a_t_m_s_id');
            $table->string('source');
            $table->string('phone');
            $table->string('call_type');
            $table->timestamp('call_date');
            $table->string('status');
            $table->string('address');
            $table->string('city');
            $table->string('sub_call_type');
            $table->string('diagnoise');
            $table->string('vendor');
            $table->bigInteger('users_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
