<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{

    protected $table = 'audit_logs';


    public $timestamps = false;



    protected $fillable = [

        'user_id',

        'admin_name',

        'admin_lastname',

        'admin_role',

        'table_name',

        'action_type',

        'module',

        'record_id',

        'record_title',

        'changed_fields',

        'old_data',

        'new_data',

        'description',

        'ip_address',

        'user_agent',

        'created_at',

    ];



    protected $casts = [

        'changed_fields' => 'array',

        'old_data' => 'array',

        'new_data' => 'array',

        'created_at' => 'datetime',

    ];


}