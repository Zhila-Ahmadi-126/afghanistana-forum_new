<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\CmsUserPermission;

class CheckPermission
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $permission = null, $action = null): Response
    {
       
        // اگر کاربر لاگین نیست
        if (!Auth::check()) {
            return redirect()->route('admin.login');
        }


        // سوپر ادمین همیشه دسترسی دارد
        if (Auth::user()->is_super_admin == 1) {
            return $next($request);
        }


        /*
        |--------------------------------------------------------------------------
        | تشخیص خودکار Permission از Route Name
        |--------------------------------------------------------------------------
        */

        if (!$permission) {

            $routeName = $request->route()->getName();


            if ($routeName) {

                $parts = explode('.', $routeName);


                // مثال:
                // admin.news.index
                // admin.news.create

                if (count($parts) >= 3) {

                    $permission = $parts[1];


                    switch ($parts[2]) {

                        case 'index':
                            $action = 'view';
                            break;


                        case 'create':
                        case 'store':
                            $action = 'create';
                            break;


                        case 'edit':
                        case 'update':
                            $action = 'edit';
                            break;


                        case 'delete':
                        case 'destroy':
                            $action = 'delete';
                            break;


                        default:
                            $action = 'view';

                    }

                }

            }

        }

if ($permission && !$action) {

    $routeName = $request->route()->getName();

    if ($routeName) {

        $parts = explode('.', $routeName);

        $method = end($parts);

        switch ($method) {

            case 'index':
            case 'ajax':
            case 'translation':
                $action = 'view';
                break;

            case 'create':
            case 'store':
                $action = 'create';
                break;

            case 'edit':
            case 'update':
            case 'saveTranslation':
                $action = 'edit';
                break;

            case 'delete':
            case 'destroy':
            case 'deleteTranslation':
                $action = 'delete';
                break;

            default:
                $action = 'view';
        }
    }
}
        // اگر permission پیدا نشد
        if (!$permission) {
            return $next($request);
        }



        $userPermission = CmsUserPermission::where('user_id', Auth::id())
            ->where('permission_slug', $permission)
            ->first();
          



        // اگر permission در دیتابیس وجود نداشت
        if (!$userPermission) {

            return response()->view('admin.errors.permission', [
                'message' => 'You do not have permission to access this page.'
            ], 403);

        }



        switch ($action) {

            case 'view':
                $allowed = $userPermission->can_view;
                break;


            case 'create':
                $allowed = $userPermission->can_create;
                break;


            case 'edit':
                $allowed = $userPermission->can_edit;
                break;


            case 'delete':
                $allowed = $userPermission->can_delete;
                break;


            default:
                $allowed = false;

        }



        // اگر اجازه نداشت
        if ($allowed != 1) {

            return response()->view('admin.errors.permission', [
                'message' => 'You do not have permission to access this page.'
            ], 403);

        }



        return $next($request);

    }
}