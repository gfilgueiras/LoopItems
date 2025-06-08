<?php

use App\Models\Role;
use App\Models\Status;
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
            $table->foreignIdFor(Status::class);
            $table->foreignIdFor(Role::class);
            $table->string('firstName');
            $table->string('surename');
            $table->string('email')->unique();
            $table->timestamp('emailVerifiedAt')->nullable();
            $table->string('password');
            $table->string('phoneNumber');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('passwordResetTokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('createdAt')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('userId')->nullable()->index();
            $table->string('ipAddress', 45)->nullable();
            $table->text('userAgent')->nullable();
            $table->longText('payload');
            $table->integer('lastActivity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
