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
        Schema::create('availed_services', function (Blueprint $table) {
            $table->id();
            $table->text("notes");
            $table->date("service_date");
            $table->unsignedBigInteger("serial_number_id");
            $table->unsignedBigInteger("service_type_id");
            $table->unsignedBigInteger("employee_id");
            $table->unsignedBigInteger("spare_parts_id");
            $table->timestamps();

            $table->foreign('serial_number_id')->references('id')->on('serial_numbers')->onDelete('cascade');
            $table->foreign('service_type_id')->references('id')->on('service_types')->onDelete('cascade');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('spare_parts_id')->references('id')->on('spare_parts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('availed_services');
    }
};
