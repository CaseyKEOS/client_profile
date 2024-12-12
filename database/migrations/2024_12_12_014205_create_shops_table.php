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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string("shopname");
            $table->string("saddress");
            $table->string("sbranch");
            $table->string("svibernum");
            $table->string("semailaddress");
            $table->string("scontactperson");
            $table->string("scontactnum");
            $table->date("contract_date");
            $table->text("notes");
            $table->unsignedBigInteger("shop_type_id");
            $table->unsignedBigInteger("client_id");
            $table->timestamps();

            $table->foreign('shop_type_id')->references('id')->on('shop_types')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
