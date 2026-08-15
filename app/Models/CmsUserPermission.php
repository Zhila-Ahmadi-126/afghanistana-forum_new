<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmsUserPermission extends Model
{
    protected $table = 'cms_user_permissions';

    protected $fillable = [
        'user_id',
        'permission_slug',
        'can_view',
        'can_create',
        'can_edit',
        'can_delete',
    ];
}