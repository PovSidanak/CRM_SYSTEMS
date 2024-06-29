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
        Schema::create('sale_reports', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('users_id');
            $table->bigInteger('customers_id');
            $table->string('contact_person');
            $table->string('project_name');
            $table->date('date_of_project');
            $table->string('project_size_budget');
            $table->date('project_close_date');
            $table->text('sum_engage_client');
            $table->string('nos_of_visit');
            $table->string('nos_of_call');
            $table->text('note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_reports');
    }
};
