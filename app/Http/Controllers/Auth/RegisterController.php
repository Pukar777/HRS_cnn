<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Account;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    //

    public function index()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $credentials['password'] = bcrypt($credentials['password']);

        $credentials = User::create($credentials);

        Auth::login($credentials);

        // return redirect('/');

        return redirect()->route('user.dashboard');
        // return redirect(RouteServiceProvider::DASHBOARD);
    }

    public function password_set(Request $request)
    {
        $token = $request->token;
        if (!DB::table('password_resets')->where('token', $token)->first()) {
            return redirect()->route('auth.login')->with('error', 'The link is bad.');
        }
        return view('auth.password_set')->with('request', $request);
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $token = $request->token;
        if (!DB::table('password_resets')->where('token', $token)->first()) {
            return redirect()->route('auth.login')->with('error', 'The token is bad.');
        }

        User::where('email', $request->email)->update(['password' => bcrypt($request->password)]);

        $user = User::with('account')->where('email', $request->email)->first();
        if (!$user->account) {
            $account_no = $this->generateAccountNo();
            Account::create([
                'account_no' => $account_no,
                'user_id' => $user->id
            ]);
        }

        DB::table('password_resets')->where('token', $token)->delete();
        Auth::login($user);



        return redirect()->route('user.dashboard')->with('success', 'Password reser successful');

        // dd($request->getRequestUri());

        // $text = parse_url($_SERVER['REQUEST_URI']);
        // $token = substr($text['path'], -60);
        // $email = urldecode($text['query']);

        // if (!DB::table('password_resets')->where('token', $token)->first()) {
        //     return redirect()->route('auth.login')->with('error', 'The link is bad.');
        // }
        // return view('auth.password_set')->with('email', $email);

        // return view('auth.password_set')->with('request', $request);
    }

    public function generateAccountNo()
    {
        do {
            $code = random_int(10000000, 99999999);
        } while (Account::where("account_no", "=", $code)->first());

        return $code;
    }
}
