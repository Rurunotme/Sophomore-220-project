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
        Schema::create('leave_requests', function (Blueprint $table) {
            $table->increments('requestID');
            $table->unsignedInteger('employeeID');
            $table->foreign('employeeID')->references('employeeID')->on('employees');
            $table->text('reason');
            $table->enum('status',['Pending','Approved','Denied'])->default('Pending');
            $table->date('leaveDate');
            $table->date('returnDate');   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_requests');
    }
};
