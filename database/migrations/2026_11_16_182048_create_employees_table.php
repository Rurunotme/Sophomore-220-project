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
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('employeeID');
            $table->string('name');
            $table->string('password');
            $table->string('email')->unique();
            $table->string('phone', 20);
            $table->unsignedInteger('departmentID')->nullable();
            $table->foreign('departmentID')->references('departmentID')->on('departments');
            $table->unsignedInteger('roleID');
            $table->foreign('roleID')->references('roleID')->on('roles');
            $table->boolean('isCurrentEmployee')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
