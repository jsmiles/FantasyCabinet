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
        Schema::create('politicians', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role');
            $table->string('img_url');
            $table->date('role_started');
            $table->date('role_ended');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('politicians');
    }
};
