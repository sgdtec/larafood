<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Models\Profile;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionProfileController extends Controller
{
    protected $profile;
    protected $permission;

    public function __construct (Profile $profile, Permission $permission) {
        $this->profile = $profile;
        $this->permission = $permission;
        $this->middleware(['can:profiles']);
    }

    /** Get Permissions */
    public function permissions($idProfile) {

        $profile = $this->profile->find($idProfile);

        if (!$profile) {
            return redirect()->back();
        }

        $permissions = $profile->permissions()->paginate();

        return view('admin.pages.profiles.permissions.permissions', [
            'profile'     => $profile,
            'permissions' => $permissions
        ]);
    }

    /** Get Profiles */
    public function profiles($idPermission) {

        if (!$permission = $this->permission->find($idPermission)) {
            return redirect()->back();
        }

        $profiles = $permission->profiles()->paginate();

        return view('admin.pages.permissions.profiles.profiles', [
            'profiles'     => $profiles,
            'permission' => $permission
        ]);
    }

    public function permissionsAvailable(Request $request, $idProfile) {

        if (!$profile = $this->profile->find($idProfile)) {
            return redirect()->back();
        }

        //If exists search in field search
        $filters = $request->except('_token');
        
        $permissions = $profile->permissionsAvailable($request->filter);

        return view('admin.pages.profiles.permissions.available', [
            'profile'     => $profile,
            'filters'     => $filters,
            'permissions' => $permissions
        ]);
    }

    /** Attach Permission Profile */
    public function attachPermissionsProfile(Request $request, $idProfile) {

        if (!$profile = $this->profile->find($idProfile)) {
            return redirect()->back();
        }

        if (!$request->permissions || count($request->permissions) == 0) {
            return redirect()->back()->with('info', 'Oppss, escolha pelo menos uma permissão!!!');
        }

        $profile->permissions()->attach($request->permissions);

        return redirect()->route('profiles.permissions', $profile->id);
    }

    /** Detach Permission Profile */
    public function detachPermissionProfile($idProfile, $idPermission) {

        $profile = $this->profile->find($idProfile);
        $permission = $this->permission->find($idPermission);

        if (!$profile || !$permission) {
            return redirect()->back();
        }

        $profile->permissions()->detach($permission);

        return redirect()->route('profiles.permissions', $profile->id);
    }   
}