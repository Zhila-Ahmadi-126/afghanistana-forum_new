<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Mass Assignable
     */
    protected $fillable = [

        'first_name',
        'last_name',
        'username',
        'email',
        'phone',
        'password',

        'avatar',

        'role',
        'status',

        'is_super_admin',

        'created_by',

        'last_login',

        'remember_token',

        'is_deleted',

        'created_at',
        'updated_at',
        'deleted_at'

    ];

    /**
     * Hidden Attributes
     */
    protected $hidden = [

        'password',
        'remember_token',

    ];

    /**
     * Casts
     */
    protected function casts(): array
    {
        return [

            'password' => 'hashed',

            'last_login' => 'datetime',

            'created_at' => 'datetime',

            'updated_at' => 'datetime',

            'deleted_at' => 'datetime',

            'is_super_admin' => 'boolean',

            'is_deleted' => 'boolean',

        ];
    }
}