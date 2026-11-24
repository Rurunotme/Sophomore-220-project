<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeTimePunch extends Model
{
    protected $primaryKey = 'punchID';
    public $timestamps = false;
    protected $fillable = [
    'employeeID',
    'punchIn',
    'punchout',
];
}
