<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
    protected $primaryKey = 'requestID';
    public $timestamps = false;
    protected $fillable = [
    'employeeID',
    'reason',
    'status',
    'leaveDate',
    'returnDate',
];
}
