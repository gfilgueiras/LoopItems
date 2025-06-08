<?php

use App\Models\User;
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
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'userId');
            $table->json('dataBefore')->nullable();
            $table->json('dataAfter')->nullable();
            $table->string('message');
            $table->string('comment')->nullable();
            $table->enum('severity', ['Trace', 'Debug', 'Info', 'Notice', 'Warning', 'Error', 'Critical']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs');
    }
};
