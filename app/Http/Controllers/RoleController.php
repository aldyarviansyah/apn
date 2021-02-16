<?php

namespace App\Http\Controllers;

use App\Models\RoleExtend;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * endpoint: /roles
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request) {
        $data['title'] = __('roles.user_roles');
        return view('roles.index', $data);
    }

    /**
     * endpoint: /roles/create
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create() {
        $data['title'] = __('roles.create_user_role');
        return view('roles.create', $data);
    }

    /**
     * @param Request $request
     * @param Role $role
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Request $request, RoleExtend $role) {
        $data['title'] = __('roles.update_user_role');
        $data['detail'] = $role;
        return view('roles.edit', $data);
    }

    /**
     * store role
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {
        $validation = $request->validate([
            'name' => 'required|regex:/^[a-z0-9 .\-]+$/i|max:24|unique:roles,name'
        ], [
            'name.regex' => __('validation.letter_and_space')
        ]);
        $validation['created_by'] = auth()->user()->id;
        $role = RoleExtend::create($validation);
        $dataMsg = [
            'title' => __('roles.user_role_created'),
            'message' => __('roles.user_role_created_note'),
            'model' => __('roles.user_roles'),
            'routeAnother' => 'roles.create',
            'emitAction' => 'showDetail',
            'modelId' => $role->id
        ];
        return redirect()->route('roles')
            ->with('msg', 'role_saved')
            ->with('dataMsg', $dataMsg);
    }

    /**
     * update role
     * @param Request $request
     * @param $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, RoleExtend $role) {
        $validation = $request->validate([
            'name' => 'required|regex:/^[a-z0-9 .\-]+$/i|max:24|unique:roles,name,'.$role->id
        ], [
            'name.regex' => __('validation.letter_and_space')
        ]);
        $role->update($validation);
        $dataMsg = [
            'title' => __('roles.user_role_updated'),
            'message' => __('roles.user_role_updated_note'),
            'model' => __('roles.user_roles'),
            'routeAnother' => 'roles.create',
            'emitAction' => 'showDetail',
            'modelId' => $role->id
        ];
        return redirect()->route('roles')
            ->with('msg', 'role_saved')
            ->with('dataMsg', $dataMsg);
    }
}
