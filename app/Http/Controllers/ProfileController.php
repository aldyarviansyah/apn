<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function reset() {
        $data['title'] = 'Reset Password';
        return view('profile.reset-password', $data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function resetPassword(Request $request) {
        $validation = $request->validate([
            'password' => 'required|min:4|required_with:password_confirmation',
            'password_confirmation' => 'required|same:password',
        ]);
        User::where('id', auth()->user()->id)->update(['password' => bcrypt($validation['password'])]);
        $dataMsg = [
            'title' => 'User Password Reset',
            'message' => 'The user\'s password has been reset.',
            'model' => 'User',
            'emitAction' => 'showDetail',
            'modelId' => auth()->user()->id
        ];
        $route = $request->route_name??'dashboard';
        return redirect($route)
            ->with('msg', 'user_saved')
            ->with('dataMsg', $dataMsg);
    }
}
