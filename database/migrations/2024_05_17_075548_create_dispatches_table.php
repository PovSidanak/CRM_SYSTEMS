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
        Schema::create('dispatches', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('tickets_id');
            $table->string('docket_no');
            $table->date('call_date');
            $table->string('bank_docket_no');
            $table->date('created_date');
            $table->string('bank_name');
            $table->string('account');
            $table->string('call_type');
            $table->string('source');
            $table->string('sub_call_type');
            $table->string('contact');
            $table->string('diagnoisis');
            $table->string('sub_status');
            $table->string('dispatch_date');
            $table->string('vendor');
            $table->string('location');
            $table->string('action_taken');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispatches');
    }
};
