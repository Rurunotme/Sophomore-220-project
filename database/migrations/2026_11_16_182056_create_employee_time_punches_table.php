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
        Schema::create('employee_time_punches', function (Blueprint $table) {
            $table->increments('punchID');
            $table->unsignedInteger('employeeID');
            $table->foreign('employeeID')->references('employeeID')->on('employees');
            $table->datetime('punchIn')->useCurrent();
            $table->datetime('punchout')->nullable();
             $table->check('punchout IS NULL OR punchout > punchIn');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_time_punches');
    }
};
