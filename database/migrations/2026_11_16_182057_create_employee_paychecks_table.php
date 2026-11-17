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
        Schema::create('employee_paycheck', function (Blueprint $table) {
            $table->increments('paycheckID');
            $table->unsignedInteger('employeeID');
            $table->foreign('employeeID')->references('employeeID')->on('employees');
            $table->date('payPeriodStart');
            $table->date('payPeriodEnd');
            $table->decimal('regularHours', 6, 2);
            $table->decimal('overtimeHours', 6, 2);
            $table->enum('paymentStatus',['Pending', 'Processing', 'Paid', 'Failed','Cancelled']);
            $table->decimal('grossPaymentAmount', 8, 2);
            $table->decimal('overtimeRate', 3, 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_paychecks');
    }
};
