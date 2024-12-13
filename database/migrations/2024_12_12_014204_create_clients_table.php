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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string("cfirstname");
            $table->string("cmiddlename");
            $table->string("csurname");
            $table->string("caddress");
            $table->string("cbirthday");
            $table->string("cphonenum");
            $table->text("notes");
            $table->unsignedBigInteger("client_type_id");
            $table->timestamps();

            $table->foreign("client_type_id")->references("id")->on("client_types")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
