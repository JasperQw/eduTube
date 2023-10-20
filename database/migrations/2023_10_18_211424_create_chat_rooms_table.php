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
        Schema::create('chat_rooms', function (Blueprint $table) {
            $table->id();
            $table->text('message')->nullable();
            $table->string('image')->nullable();
            $table->string('file')->nullable();
            $table->integer('user_id');
            $table->string('education_level')->enum(['primary', 'secondary', 'pre-u', 'university']);
            $table->integer('year')->nullable();
            $table->string('major')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_rooms');
    }
};
