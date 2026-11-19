<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Employee extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'employees';

    protected $primaryKey = 'employeeID';

    protected $fillable = [
        'name',
        'password',
        'email',
        'phone',
        'departmentID',
        'roleID',
        'isCurrentEmployee'
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