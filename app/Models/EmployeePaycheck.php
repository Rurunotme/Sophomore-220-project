<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeePaycheck extends Model
{
    protected $primaryKey = 'paycheckID';

    public $timestamps = false;

    protected $fillable = [
        'employeeID',
        'payPeriodStart',
        'payPeriodEnd',
        'regularHours',
        'overtimeHours',
        'paymentStatus',
        'grossPaymentAmount',
        'overtimeRate',
    ];
}
