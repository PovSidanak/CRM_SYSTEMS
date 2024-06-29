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
        Schema::create('call_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('tickets_id');
            $table->string('docket_no');
            $table->string('reference_no');
            $table->string('contact_person');
            $table->string('contact_no');
            $table->string('call_type');
            $table->string('sub_call_type');
            $table->date('call_date');
            $table->string('source');
            $table->bigInteger('users_id');
            $table->string('type');
            $table->string('vendor');
            $table->string('status');
            $table->string('sub_status');
            $table->string('model');
            $table->string('location');
            $table->time('target_resolution_time');
            $table->time('target_response_time');
            $table->text('activity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('call_details');
    }
};
