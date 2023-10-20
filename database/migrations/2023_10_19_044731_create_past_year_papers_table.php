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
        Schema::create('past_year_papers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('paper_url');
            $table->string('answer_url')->nullable();
            $table->string('education_level')->enum(['primary', 'secondary', 'pre-u', 'university']);
            $table->integer('year')->nullable();
            $table->string('major')->nullable();
            $table->integer('like')->default(0);
            $table->string('subject')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('past_year_papers');
    }
};
