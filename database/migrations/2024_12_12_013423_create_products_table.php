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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->string('unitsofmeasurement');
            $table->date('contract_date');
            $table->date('delivery_date');
            $table->date('installment_date');
            $table->text('notes');
            $table->unsignedBigInteger("product_type_id");
            $table->unsignedBigInteger("product_status_id");
            $table->unsignedBigInteger("employee_id");
            $table->timestamps();

            $table->foreign('product_type_id')->references('id')->on('product_types')->onDelete('cascade');
            $table->foreign('product_status_id')->references('id')->on('product_status_types')->onDelete('cascade');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
