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
        Schema::create('salary_changes', function (Blueprint $table) {
            $table->increments('salaryUpdateID');
            $table->decimal('oldSalary', 8, 2);
            $table->enum('oldSalaryType',['salary','hourly']);
            $table->decimal('newSalary', 8, 2);
            $table->enum('newSalaryType',['salary','hourly']);
            $table->datetime('updateTime');
            $table->unsignedInteger('employeeID');
            $table->foreign('employeeID')->references('employeeID')->on('employees');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salary_changes');
    }
};
