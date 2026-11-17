<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Employee extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'employeeID';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'password',
        'email',
        'phone',
        'departmentID',
        'roleID',
        'isCurrentEmployee',
    ];

    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'isCurrentEmployee' => 'boolean',
        ];
    }
}
