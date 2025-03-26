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
            $table->id(); // The primary key
            $table->string('name'); // Name of the user
            $table->string('email')->unique(); // Email address, must be unique
            $table->timestamp('email_verified_at')->nullable(); // Timestamp for email verification (nullable)
            $table->string('password'); // User password
            $table->rememberToken(); // Token for "remember me" functionality
            $table->foreignId('role_id')->nullable()->constrained('roles')->onDelete('set null');

            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
