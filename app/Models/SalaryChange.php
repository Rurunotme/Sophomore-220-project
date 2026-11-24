<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalaryChange extends Model
{
    protected $primaryKey = 'salaryUpdateID';
    public $timestamps = false;
    protected $fillable = [
    'oldSalary',
    'oldSalaryType',
    'newSalary',
    'newSalaryType',
    'updateTime',
    'employeeID',
];
}
