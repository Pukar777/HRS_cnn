<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permission;

class PageController extends Controller
{
    //
    public function dashboard()
    {
        // $permission = Permission::with('roles')->get();
        // // dd($permission);

        // $role = Role::with('permissions')->get();
        // // dd($role);

        // $user = User::with('roles')->find(2);
        // $roles = $user->roles;

        // foreach ($roles as $role) {
        //     if ($role->name == 'admin' || $role->name == 'staff') {
        //         dd('logged in as staff');
        //     }
        // }


        // dd('logged in as user');

        return view('admin.dashboard');
    }

    public function report()
    {
        // exec("", $output_1);

        // $env_name = "tensor_gpu";
        // $activate_env = "conda activate " . $env_name;
        // $model_path = 'cd ..\app\python';
        // $execution_cmd = 'python hrs.py';
        // $image_path = 'text1';

        // $command = $model_path . " && " . $activate_env . " && " . $execution_cmd . " " . $image_path;

        // exec($command, $output);


        // exec("cd ..\app\python && " . "conda activate tensor_gpu && " . "time", $output);

        // dd($output);

        // ^ array:2 [▼
        //     0 => "hello"
        //     1 => "hrs.py"
        // ]

        $output = "uanisho";
        $namestrs = [];
        $users = [];
        if (strlen($output) > 2) {
            $len = strlen($output);
            for ($x = 0; $x <= $len - 3; $x++) {
                $namestrs[$x] = substr($output, $x, 3);
            }

            foreach ($namestrs as $str) {
                $user = User::with('account')->where('name', 'like', '%' . $str . '%')->first();
                if ($user) {
                    $users[] = $user;
                }
            }

            $account = $users[0]->account;
            $accounts = '';
            return view('admin.transaction.create', compact('account', 'accountsh'));
        } else {
            return redirect()->back()->with('error', 'No user with such name can be found. Please recheck the image.');
        }
    }
}
