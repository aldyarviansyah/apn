<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ModelHasPermission;
use App\Models\ModelHasRole;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * endpoint: /users
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request) {
        $data['title'] = __('users.app_users');
        return view('users.index', $data);
    }

    /**
     * endpoint: /users/create
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create() {
        $data['title'] = __('users.create_user');
        $data['roles'] = Role::orderBy('name')->get();
        return view('users.create', $data);
    }

    /**
     * endpoint: /users/{user}/edit
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Request $request, User $user) {
        $data['title'] = __('users.update_user');
        $data['detail'] = $user;
        $data['roles'] = Role::orderBy('name')->get();
        return view('users.edit', $data);
    }

    /**
     * endpoint: /users/{user}/reset
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function reset(Request $request, User $user) {
        $data['title'] = __('users.app_user_reset_password');
        $data['detail'] = $user;
        return view('users.reset-password', $data);
    }

    /**
     * store user
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {
        $validation = $request->validate([
            'username' => 'required|max:24|alpha|unique:users,username',
            'full_name' => 'required|regex:/^[a-zA-Z-.\s]*$/u',
            'password' => 'required|min:4|required_with:password_confirmation',
            'password_confirmation' => 'required|same:password',
            'email' => 'required|email|unique:users,email',
            'role_id' => 'required|exists:roles,id',
        ], [
            'full_name.regex' => __('validation.letter_and_space')
        ]);
        $validation['type'] = 'user';
        $validation['created_by'] = auth()->user()->id;
        $user = User::create($validation);
        $user->assignRole($validation['role_id']);
        $user->givePermissionTo('login');
        $dataMsg = [
            'title' => __('users.user_created'),
            'message' => __('users.the_user_has_been_created'),
            'model' => __('global.user'),
            'routeAnother' => 'users.create',
            'emitAction' => 'showDetail',
            'modelId' => $user->id
        ];
        return redirect()->route('users')
            ->with('msg', 'user_saved')
            ->with('dataMsg', $dataMsg);
    }

    /**
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user) {
        $validation = $request->validate([
            'username' => 'required|max:24|alpha|unique:users,username,'.$user->id,
            'full_name' => 'required|regex:/^[a-zA-Z-.\s]*$/u',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'role_id' => 'required|exists:roles,id',
        ], [
            'full_name.regex' => __('validation.letter_and_space')
        ]);
        $additionalItems = null;
        if(!$user->hasRole((int)$validation['role_id'])) {
            $old_values = ModelHasRole::where('model_type', User::class)
                ->where('model_id', $user->id)->first();
            $new_values = [
                'role_id' => (int)$validation['role_id'],
                'model_type' => User::class,
                'model_id' => $user->id
            ];
            $old_display_value = $user->roles->first()->name;
            $new_display_value = Role::find($validation['role_id'])->name;
            $additionalItems = [
                [
                    'field' => 'all',
                    'field_label' => 'Role',
                    'value_type' => 'object',
                    'old_value' => json_encode($old_values),
                    'old_display_value' => $old_display_value,
                    'new_value' => json_encode($new_values),
                    'new_display_value' => $new_display_value,
                    'undo_able' => true,
                    'current_model' => ModelHasRole::class,
                    'current_table' => 'model_has_roles',
                ]
            ];
            $user->setAdditionalActivitiesItemAttribute($additionalItems);
        }
        $updated = (($user->username != $validation['username']) || ($user->full_name != $validation['full_name']) || ($user->email != $validation['email']) );
        $user->update($validation);
        if(!$updated && $additionalItems) {
            $user->setAdditionalActivitiesItemAttribute([]);
            $activities = Activity::create([
                'model_id' => $user->id,
                'user_id' => auth()->user()->id,
                'model' => User::class,
                'model_label' => 'User',
                'action' => 'update',
                'action_label' => 'Updated',
            ]);
            $activities->items()->createMany($additionalItems);
            $user->activity_count = $user->activities_count;
            $user->saveQuietly();
        }
        $user->syncRoles($validation['role_id']);
        $dataMsg = [
            'title' => __('users.user_updated'),
            'message' => __('users.user_updated_note'),
            'model' => __('global.user'),
            'routeAnother' => 'users.create',
            'emitAction' => 'showDetail',
            'modelId' => $user->id
        ];
        return redirect()->route('users')
            ->with('msg', 'user_saved')
            ->with('dataMsg', $dataMsg);
    }

    /**
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePermission(Request $request, User $user) {
        $user_permissions = $user->permissions->pluck('id')->toArray();
        $new_permissions = array_map('intval', $request->permissions);
        $added = array_diff($new_permissions,$user_permissions);
        $removed = array_diff($user_permissions, $new_permissions);
        $additionalItems = [];
        foreach ($added as $key => $add) {
            $new_values = [
                'model_type' => User::class,
                'model_id' => $user->id,
                'permission_id' => $add
            ];
            $new_display_value = Permission::find($add)->label;
            $newItem = [
                'field' => 'all',
                'field_label' => 'Permission',
                'value_type' => 'object',
                'old_value' => null,
                'old_display_value' => null,
                'new_value' => json_encode($new_values),
                'new_display_value' => 'Added '. $new_display_value,
                'undo_able' => true,
                'current_model' => ModelHasPermission::class,
                'current_table' => 'model_has_permissions',
            ];
            array_push($additionalItems, $newItem);
        }

        foreach ($removed as $key => $remove) {
            $new_values = [
                'model_type' => User::class,
                'model_id' => $user->id,
                'permission_id' => $remove
            ];
            $display_value = Permission::find($remove)->label;
            $newItem = [
                'field' => 'all',
                'field_label' => 'Permission',
                'value_type' => 'object',
                'old_value' => json_encode($new_values),
                'old_display_value' => $display_value,
                'new_value' => null,
                'new_display_value' => 'Removed '. $display_value,
                'undo_able' => true,
                'current_model' => ModelHasPermission::class,
                'current_table' => 'model_has_permissions',
            ];
            array_push($additionalItems, $newItem);
        }
        if(count($additionalItems)>0) {
            $activities = Activity::create([
                'model_id' => $user->id,
                'user_id' => auth()->user()->id,
                'model' => User::class,
                'model_label' => 'User',
                'action' => 'update',
                'action_label' => 'Updated',
            ]);
            $activities->items()->createMany($additionalItems);
        }
        $user->syncPermissions($request->permissions);
        $user->activity_count = $user->activities_count;
        $user->saveQuietly();
        $dataMsg = [
            'title' => __('users.user_permission_updated'),
            'message' => __('users.user_permission_updated_note'),
            'model' => __('global.user'),
            'emitAction' => 'showDetail',
            'modelId' => $user->id
        ];
        return redirect()->back()
            ->with('msg', 'user_saved')
            ->with('dataMsg', $dataMsg);
    }

    /**
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function resetPassword(Request $request, User $user) {
        $validation = $request->validate([
            'password' => 'required|min:4|required_with:password_confirmation',
            'password_confirmation' => 'required|same:password',
        ]);
        $user->setNewDisplayValueAttribute(['password' => 'Hidden\'s values']);
        $user->setUndoAbleAttribute(false);
        $user->update($validation);
        $dataMsg = [
            'title' => __('users.user_password_reset'),
            'message' => __('users.user_password_reset_note'),
            'model' => 'User',
            'emitAction' => 'showDetail',
            'modelId' => $user->id
        ];
        return redirect()->route('users')
            ->with('msg', 'user_saved')
            ->with('dataMsg', $dataMsg);
    }
}
