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
        Schema::create("shop", function (Blueprint $table) {
            $table->id();
            $table->string("shopname");
            $table->string("saddress");
            $table->string("sbranch");
            $table->string("svibernum");
            $table->string("semailaddress");
            $table->string("scontactperson");
            $table->string("scontactnum");
            $table->date("contract_date");
            $table->timestamp("created_at");
            $table->date("updated_at");
            $table->text("notes");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("shop");
    }
};