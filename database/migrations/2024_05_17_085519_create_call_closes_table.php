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
        Schema::create('call_closes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('tickets_id');
            $table->string('reference_no');
            $table->date('create_date');
            $table->date('call_date');
            $table->string('account');
            $table->string('model');
            $table->string('contact');
            $table->string('vendor');
            $table->date('max_re_allo_date');
            $table->string('diagnoisis');
            $table->string('service_code');
            $table->string('remark');
            $table->string('report_no');
            $table->string('activity_type');
            $table->date('actual_start_date');
            $table->date('repaire_start_date');
            $table->date('arrival_date');
            $table->date('actual_comp_date');
            $table->time('repair_hour');
            $table->time('part_wait_hour');
            $table->time('wait_hour');
            $table->time('travel_hour');
            $table->text('action_taken');
            $table->string('status');
            $table->string('sub_status');
            $table->date('next_activity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('call_closes');
    }
};
