<?php

namespace App\Http\Controllers;

use App\Models\AccessRequest;
use App\Models\Activity;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AccessRequestController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request) {
        $data['title'] = __('accessrequest.title');
        return view('access-requests.index', $data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request) {
        $data['title'] = __('accessrequest.title');
        $data['dateWIB'] = \Carbon\Carbon::now()->timezone('Asia/Jakarta');
        $data['dateWITA'] = \Carbon\Carbon::now()->timezone('Asia/Ujung_Pandang');
        return view('access-requests.create', $data);
    }

    /**
     * @param Request $request
     * @param AccessRequest $accessRequest
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showApprove(Request $request, AccessRequest $accessRequest) {
        $data['title'] = __('accessrequest.create_user');
        $data['detail'] = $accessRequest;
        $data['roles'] = Role::orderBy('name')->get();
        return view('access-requests.approve', $data);
    }

    /**
     * @param Request $request
     * @param AccessRequest $accessRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approve(Request $request, AccessRequest $accessRequest) {
        $validation = $request->validate([
            'username' => 'required|max:24|alpha|unique:users,username',
            'full_name' => 'required|regex:/^[\pL\s\-]+$/u',
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
        $accessRequest->update(['status' => 'approved', 'user_id' => $user->id]);
        $user->assignRole($validation['role_id']);
        $user->givePermissionTo('login');
        $dataMsg = [
            'title' => __('accessrequest.user_created_title'),
            'message' => __('accessrequest.user_created_note'),
            'model' => __('accessrequest.user'),
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {
        $validation = $request->validate([
            'name' => 'required',
            'phone' => 'required|min:10|regex:/^\+[1-9]\d{1,14}$/',
            'company_name' => 'required',
            'company_address' => 'required',
            'company_email' => 'required|email|unique:access_requests,company_email',
            'company_position' => 'required',
        ], [
            'phone.regex' => __('validation.phone_e164')
        ]);
        $accessRequest = AccessRequest::create($validation);
        $activity = Activity::where('model', AccessRequest::class)
            ->where('model_id', $accessRequest->id)
            ->orderBy('created_at', 'desc')
            ->first();
        /** update activity user to pulic user */
        $activity->update(['user_static' => 'Public']);
        $dataMsg = [
            'title' => __('accessrequest.access_request_submitted'),
            'message' => __('accessrequest.access_request_note'),
        ];
        return redirect()->route('login')
            ->with('msg', 'data_saved')
            ->with('dataMsg', $dataMsg);
    }
}
