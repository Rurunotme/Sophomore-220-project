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
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('roleID');
            $table->string('title')->unique();
            $table->decimal('salary', 8, 2);
            $table->boolean('isSalary');
            $table->decimal('overtimeRate', 3, 2)->nullable();
            $table->integer('regHoursPerWeek')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
