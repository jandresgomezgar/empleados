<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'name', 'email','job_title', 'location', 'password'
    ];

}
