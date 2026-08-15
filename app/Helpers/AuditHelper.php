<?php

namespace App\Helpers;

use App\Models\AuditLog;

class AuditHelper
{

    public static function log(
        $user,
        $table,
        $action,
        $module,
        $recordId,
        $recordTitle,
        $description = '',
        $changedFields = null,
        $oldData = null,
        $newData = null
    )
    {

        AuditLog::create([

            'user_id' => $user->id,

            'admin_name' => $user->first_name,

            'admin_lastname' => $user->last_name,

            'admin_role' => $user->role,

            'table_name' => $table,

            'action_type' => $action,

            'module' => $module,

            'record_id' => $recordId,

            'record_title' => $recordTitle,

            'changed_fields' => $changedFields
                ? json_encode($changedFields)
                : null,

            'old_data' => $oldData
                ? json_encode($oldData)
                : null,

            'new_data' => $newData
                ? json_encode($newData)
                : null,

            'description' => $description,

            'ip_address' => request()->ip(),

            'user_agent' => request()->userAgent(),

            'created_at' => now()

        ]);

    }

}