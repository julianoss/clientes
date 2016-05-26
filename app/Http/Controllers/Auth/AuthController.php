<?php

namespace App\Http\Controllers\Auth;

use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/cliente';

    protected $username = 'login';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    // Override
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'login' => 'required', 'password' => 'required',
        ]);

        $credentials = $request->only('login', 'password');

        if (Auth::attempt($credentials))
        {
            return redirect()->intended($this->redirectPath());
        }

        return redirect('/login')
            ->withInput($request->only('login'))
            ->withErrors([
                'login' => $this->getFailedLoginMessage(),
            ]);
    }

    public function logout()
    {
        Auth::guard($this->getGuard())->logout();

        return redirect('/login');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'login' => 'required',
            'password' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Usuario
     */
    protected function create(array $data)
    {
        return Usuario::create([
            'login' => $data['login'],
            'password' => bcrypt($data['senha']),
        ]);
    }
}
