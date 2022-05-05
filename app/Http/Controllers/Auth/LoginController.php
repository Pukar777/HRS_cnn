<?php

namespace App\Http\Controllers\Auth;

use Exception;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\VerificationMail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Mail\PasswordResetMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    //

    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        // dd($request->getCredentials());

        if ($this->credentials($request)) {
            $key = Str::lower($request->input('email')) . '|' . $request->ip();

            if (RateLimiter::tooManyAttempts($key, 5)) {
                $seconds = RateLimiter::availableIn($key);

                throw ValidationException::withMessages([
                    'email' => trans('auth.throttle', [
                        'seconds' => $seconds,
                        'minutes' => ceil($seconds / 60),
                    ]),
                ]);
            }

            if (!Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
                RateLimiter::hit($key);

                throw ValidationException::withMessages([
                    'email' => trans('auth.failed'),
                ]);
            }

            RateLimiter::clear($key);

            $request->session()->regenerate();

            $id = Auth::user()->id;
            $user = User::with('roles')->find($id);
            $roles = $user->roles;

            foreach ($roles as $role) {
                if ($role->name == 'admin' || $role->name == 'staff') {
                    return redirect()->route('admin.dashboard');
                }
            }

            return redirect()->route('user.dashboard');
        }


        // return redirect()->intended();

        // return back()->withErrors([
        //     'email' => 'The provided email do not match our records.'
        // ]);
    }

    private function credentials($request)
    {
        return $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    }

    public function reset_index()
    {
        return view('auth.password_reset');
    }

    public function reset_mail(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user == null) {
            return redirect()->back()->with('error', 'User do not exist with provided Email');
        }

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => Str::random(60),
            'created_at' => Carbon::now()
        ]);

        $tokenData = DB::table('password_resets')->where('email', $request->email)->first();

        if ($this->sendVerificationMail($tokenData->email, $tokenData->token, $request)) {
            return redirect()->back()->with('success', 'Email sent successfully.');
        }
        return redirect()->back()->with('error', 'There was an error sending mail.');
    }

    private function sendVerificationMail($email, $token, $request)
    {
        $link = config('base_url') . 'auth/password_set/' . $token . '?email=' . urlencode($request->email);
        $link = 'http://127.0.0.1:8000/' . $link;
        try {
            Mail::to($email)->send(new PasswordResetMail($link, $request->email));
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function logout(Request $request)
    {

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function redirectPath()
    {
        if (auth()->user()->is_admin) {
            return route('admin.dashboard');
        }

        return route('user.dashboard');
    }
}
