<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilePicture extends Model
{
    protected $primaryKey = 'employeeID';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
    'employeeID',
    'pictureBlob',
    'imageType',
];
}
