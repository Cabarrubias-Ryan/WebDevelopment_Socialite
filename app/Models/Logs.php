<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    protected $table = 'logs';

    protected $fillable =[
        'id',
        'login_at',
        'status',
        'login_type'
    ];
}
