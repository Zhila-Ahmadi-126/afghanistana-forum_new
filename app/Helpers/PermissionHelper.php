<?php

use Illuminate\Support\Facades\Auth;
use App\Models\CmsUserPermission;

if (!function_exists('canPermission')) {

    function canPermission($permission, $action = 'view')
    {
        // اگر کاربر لاگین نیست
        if (!Auth::check()) {
            return false;
        }


        // سوپر ادمین همه دسترسی‌ها را دارد
        if (Auth::user()->is_super_admin == 1) {
            return true;
        }


        $userPermission = CmsUserPermission::where('user_id', Auth::id())
            ->where('permission_slug', $permission)
            ->first();


        if (!$userPermission) {
            return false;
        }


        switch ($action) {

            case 'view':
                return $userPermission->can_view == 1;

            case 'create':
                return $userPermission->can_create == 1;

            case 'edit':
                return $userPermission->can_edit == 1;

            case 'delete':
                return $userPermission->can_delete == 1;

            default:
                return false;
        }
    }
}