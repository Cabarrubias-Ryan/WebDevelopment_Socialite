<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $table = 'users';

    protected $fillable =[
        'id',
        'username',
        'password',
        'email',
        'name',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
