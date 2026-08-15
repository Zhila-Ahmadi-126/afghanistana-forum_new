<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
        'name',
        'email',
        'rating',
        'message',
        'status',
    ];

    protected $casts = [
        'rating' => 'integer',
    ];
}