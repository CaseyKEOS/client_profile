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
        Schema::create('backend_setups', function (Blueprint $table) {
            $table->id();
            $table->string("subcontractor");
            $table->string("provision");
            $table->date("projectstarted");
            $table->date("projectcompleted");
            $table->date("date");
            $table->text("notes");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('backend_setups');
    }
};
