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
    {//password_reset_token
        Schema::create('password_create_tokens', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->foreign('email')->references('email')->on('users');
            $table->string('token')->unique();
            $table->text('url_token');
            $table->timestamp('created_at');
            $table->dateTime('expires_at')->nullable();
            $table->boolean('updated')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('password_create_tokens');
    }
};
