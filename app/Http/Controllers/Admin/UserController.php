<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\AuditHelper;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // =========================
    // USERS LIST (PAGE)
    // =========================
    public function index(Request $request)
    {
        $query = DB::table('users');

        // SEARCH
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('first_name', 'like', "%{$request->search}%")
                  ->orWhere('last_name', 'like', "%{$request->search}%")
                  ->orWhere('username', 'like', "%{$request->search}%")
                  ->orWhere('email', 'like', "%{$request->search}%")
                  ->orWhere('phone', 'like', "%{$request->search}%");
            });
        }

        // ROLE FILTER
        if ($request->role) {
            $query->where('role', $request->role);
        }

        // STATUS FILTER
        if ($request->status) {
            $query->where('status', $request->status);
        }

        $users = $query->orderBy('id', 'desc')->paginate(10);

        return view('admin.users.index', compact('users'));
    }
        // =========================
    // CREATE PAGE
    // =========================
    public function create()
    {
        $permissions = DB::table('cms_permissions')
            ->orderBy('display_order')
            ->get()
            ->groupBy('group_name');

        return view('admin.users.create', compact('permissions'));
    }

    // =========================
    // STORE USER
    // =========================
    public function store(Request $request)
    {
        

        $request->validate([

            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',

            'username' => 'required|max:100|unique:users,username',

            'email' => 'required|email|unique:users,email',

            'phone' => 'nullable|max:30',

            'password' => 'required|min:6|confirmed',

            'role' => 'required',
            
            'status' => 'required',
            'selected_avatar' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            
         

        ]);

        DB::beginTransaction();

        try {

                    $avatar = null;
                    
                

      // =========================
        // AVATAR OR PHOTO
        // =========================

        if ($request->hasFile('photo')) {

            $avatar = $request->file('photo')->store(
                'users',
                'public'
            );

        } elseif ($request->filled('selected_avatar')) {

           $avatar = 'avatar/'.$request->selected_avatar;

        } else {

            $avatar = null;

        }
            // =========================
            // CREATE USER
            // =========================

            $user = User::create([

                'first_name' => $request->first_name,

                'last_name' => $request->last_name,

                'username' => $request->username,

                'email' => $request->email,

                'phone' => $request->phone,

                'password' => Hash::make($request->password),

                'avatar' => $avatar,

                'role' => $request->role,

                'status' => $request->status,

                'is_super_admin' => $request->role == 'super_admin' ? 1 : 0,

                'created_by' => Auth::id(),

                'is_deleted' => 0,

            ]);
            
            
           AuditHelper::log(

                $user,

                'users',

                'insert',

                'Users',

                $user->id,

                $user->first_name.' '.$user->last_name,

                'New administrator created.'

            );

            // =========================
            // SAVE PERMISSIONS
            // =========================

            $permissions = DB::table('cms_permissions')->get();

            foreach ($permissions as $permission) {

                DB::table('cms_user_permissions')->insert([

                    'user_id' => $user->id,

                    'permission_slug' => $permission->slug,

                    'can_view' => in_array($permission->slug . '.view', $request->permissions ?? []) ? 1 : 0,

                    'can_create' => in_array($permission->slug . '.create', $request->permissions ?? []) ? 1 : 0,

                    'can_edit' => in_array($permission->slug . '.edit', $request->permissions ?? []) ? 1 : 0,

                    'can_delete' => in_array($permission->slug . '.delete', $request->permissions ?? []) ? 1 : 0,

                    'created_at' => now(),

                    'updated_at' => now(),

                ]);

            }

            DB::commit();

            return redirect()
                ->route('admin.users.index')
                ->with('success', 'Administrator created successfully.');

        }
   catch (\Throwable $e) {

    DB::rollBack();

    dd([
        'message' => $e->getMessage(),
        'file' => $e->getFile(),
        'line' => $e->getLine(),
    ]);
}
      

    }
  // =========================
// EDIT PAGE
// =========================
public function edit($id)
{
    $user = User::findOrFail($id);

    $permissions = DB::table('cms_permissions')
        ->orderBy('display_order')
        ->get()
        ->groupBy('group_name');


    // گرفتن دسترسی‌های قبلی کاربر
    $userPermissions = DB::table('cms_user_permissions')
        ->where('user_id', $id)
        ->get();


    return view(
        'admin.users.edit',
        compact(
            'user',
            'permissions',
            'userPermissions'
        )
    );
}


// =========================
// UPDATE USER
// =========================
public function update(Request $request, $id)
{

    $user = User::findOrFail($id);


    $request->validate([

        'first_name' => 'required|max:100',
        'last_name'  => 'required|max:100',

        'username'   => 'required|max:100|unique:users,username,'.$id,

        'email'      => 'required|email|unique:users,email,'.$id,

        'phone'      => 'nullable|max:30',

        'role'       => 'required',

        'status'     => 'required',

        'photo'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

    ]);


    DB::beginTransaction();


    try{


        $avatar = $user->avatar;

// =========================
// UPLOAD NEW PHOTO
// =========================

if ($request->hasFile('photo')) {

    // حذف عکس قبلی اگر آپلودی بوده باشد
    if (
        $user->avatar &&
        str_starts_with($user->avatar, 'users/') &&
        Storage::disk('public')->exists($user->avatar)
    ) {
        Storage::disk('public')->delete($user->avatar);
    }

    $avatar = $request->file('photo')->store(
        'users',
        'public'
    );

}

// =========================
// SELECT AVATAR
// =========================

elseif ($request->filled('selected_avatar')) {

    // اگر قبلاً عکس آپلودی داشته، حذف شود
    if (
        $user->avatar &&
        str_starts_with($user->avatar, 'users/') &&
        Storage::disk('public')->exists($user->avatar)
    ) {
        Storage::disk('public')->delete($user->avatar);
    }

  $avatar = $request->selected_avatar;

}

// =========================
// KEEP CURRENT PHOTO
// =========================

else {

    $avatar = $user->avatar;

}



        $user->update([

            'first_name'=>$request->first_name,

            'last_name'=>$request->last_name,

            'username'=>$request->username,

            'email'=>$request->email,

            'phone'=>$request->phone,

            'avatar'=>$avatar,

            'role'=>$request->role,

            'status'=>$request->status,

            'is_super_admin'=>$request->role == 'super_admin' ? 1 : 0,

        ]);



        // =========================
        // UPDATE PASSWORD (OPTIONAL)
        // =========================

        if($request->filled('password')){

            $user->password = bcrypt($request->password);

            $user->save();

        }



                // =========================
        // UPDATE PERMISSIONS
        // =========================


        DB::table('cms_user_permissions')
            ->where('user_id',$user->id)
            ->delete();



        $selected = $request->permissions ?? [];



        $permissions = DB::table('cms_permissions')->get();



        foreach($permissions as $permission){


            DB::table('cms_user_permissions')->insert([

                'user_id'=>$user->id,

                'permission_slug'=>$permission->slug,


                'can_view'=>in_array($permission->slug.'.view',$selected) ? 1 : 0,


                'can_create'=>in_array($permission->slug.'.create',$selected) ? 1 : 0,


                'can_edit'=>in_array($permission->slug.'.edit',$selected) ? 1 : 0,


                'can_delete'=>in_array($permission->slug.'.delete',$selected) ? 1 : 0,


                'created_at'=>now(),

                'updated_at'=>now(),

            ]);


        }



        AuditHelper::log(

            $user,

            'users',

            'update',

            'Users',

            $user->id,

            $user->first_name.' '.$user->last_name,

            'Administrator information updated.'

        );



        DB::commit();



        return redirect()
            ->route('admin.users.index')
            ->with('success','Administrator updated successfully.');



    }
    catch(\Exception $e){


        DB::rollBack();


        return back()
            ->withInput()
            ->with('error',$e->getMessage());


    }

}



// =========================
// DELETE USER
// =========================

public function destroy($id)
{

    DB::beginTransaction();

    try {


        $user = User::findOrFail($id);



            
        // =========================
        // DELETE USER IMAGE
        // =========================

        if (
            $user->avatar &&
            str_starts_with($user->avatar, 'users/') &&
            Storage::disk('public')->exists($user->avatar)
        ) {

            Storage::disk('public')->delete($user->avatar);

        }


        // =========================
        // DELETE USER PERMISSIONS
        // =========================

        DB::table('cms_user_permissions')
            ->where('user_id',$id)
            ->delete();



        // =========================
        // AUDIT LOG BEFORE DELETE
        // =========================

        AuditHelper::log(

            $user,

            'users',

            'delete',

            'Users',

            $user->id,

            $user->first_name.' '.$user->last_name,

            'Administrator deleted.'

        );



        // =========================
        // DELETE USER
        // =========================

        $user->delete();



        DB::commit();



        return redirect()
            ->route('admin.users.index')
            ->with('success','Administrator deleted successfully.');



    }
    catch(\Exception $e){


        DB::rollBack();


        return back()
            ->with('error',$e->getMessage());

    }

}
    // =========================
    // AJAX SEARCH
    // =========================
    public function ajax(Request $request)
    {
        $query = DB::table('users');

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('first_name', 'like', "%{$request->search}%")
                  ->orWhere('last_name', 'like', "%{$request->search}%")
                  ->orWhere('username', 'like', "%{$request->search}%")
                  ->orWhere('email', 'like', "%{$request->search}%")
                  ->orWhere('phone', 'like', "%{$request->search}%");
            });
        }

        if ($request->role) {
            $query->where('role', $request->role);
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        $users = $query->orderBy('id', 'desc')->get();

        return response()->json($users);
    }
    
}