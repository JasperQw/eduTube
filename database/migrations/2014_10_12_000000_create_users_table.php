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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('birthday');
            $table->integer('age');
            $table->string('education_level')->enum(["university", "kindergarten", "primary", "secondary", "pre-u"]);
            $table->string('profile_image')->default('anonymous-user.webp');
            $table->integer('check_in')->default(0);
            $table->integer('last_check_in')->default(0);
            $table->integer('points')->default(0);
            $table->string('role')->enum(['student', 'educator', 'counsellor'])->default('student');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
