<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\VerificationMail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\RoleUser;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::with('roles')->get();
        return view('admin.user.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id');

        return view('admin.user.create')->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => Str::random(60),
            'created_at' => Carbon::now()
        ]);

        $tokenData = DB::table('password_resets')->where('email', $request->email)->first();

        $credentials['password'] = $tokenData->token;

        $user = User::create($credentials);

        foreach ($request->roles as $role) {
            RoleUser::create([
                'user_id' => $user->id,
                'role_id' => $role
            ]);
        }


        if ($this->sendVerificationMail($tokenData->email, $tokenData->token, $user)) {
            return redirect()->back()->with('success', 'User created successfully.');
        }
        return redirect()->back()->with('error', 'There was an error creating while user.');
    }

    private function sendVerificationMail($email, $token, $user)
    {
        $link = config('base_url') . 'auth/password_set/' . $token . '?email=' . urlencode($user->email);
        $link = 'http://127.0.0.1:8000/' . $link;
        try {
            Mail::to($email)->send(new VerificationMail($link));
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        User::find($id)->delete();

        return redirect()->back()->with('message', 'The user was deleted successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);
        $roles = Role::pluck('name', 'id');
        return view('admin.user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        RoleUser::where('user_id', $id)->delete();

        foreach ($request->roles as $role) {
            RoleUser::create([
                'user_id' => $id,
                'role_id' => $role
            ]);
        }

        return redirect()->route('admin.user_manage.index')->with('success', 'Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        User::get($id)->delete();

        return redirect()->back()->with('message', 'The user was deleted successfully.');
    }
}
