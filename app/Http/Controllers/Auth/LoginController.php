<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Rules\HasLoginPermission;
use App\Rules\UserType;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * @param Request $request
     * @throws ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'username' => [trans('auth.failed')],
        ]);
    }

    /**
     * @return string
     */
    public function username()
    {
        $login = request()->input('username');
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        request()->merge([$field => $login]);
        return $field;
    }

    /**
     * @param Request $request
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => ['required','string', new UserType(), new HasLoginPermission()],
            'password' => 'required|string',
        ]);
    }

    /**
     * @param Request $request
     * @param $user
     */
    protected function authenticated(Request $request, $user)
    {
        $user->last_login = Carbon::now();
        $user->saveQuietly();
    }
}
