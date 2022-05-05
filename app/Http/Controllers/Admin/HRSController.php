<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HRSController extends Controller
{
    //

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',

        ]);



        $name = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->store('public/hrs_images');

        $env_name = "tensor_gpu";
        $activate_env = "conda activate";
        $model_path = 'cd ..\app\python';
        $execution_cmd = 'python hrs.py';
        $image_path = "../../storage/app/public/hrs_images/" . basename($path);

        $command = $activate_env . " " . $env_name . " && " . $model_path . " && " . $execution_cmd . " " . $image_path;

        exec($command, $output);

        $name = $output[0];

        $namestrs = [];
        $users = [];
        if (strlen($name) > 2) {
            $len = strlen($name);
            for ($x = 0; $x <= $len - 3; $x++) {
                $namestrs[$x] = substr($name, $x, 3);
            }

            foreach ($namestrs as $str) {
                $user = User::with('account')->where('name', 'like', '%' . $str . '%')->first();
                if ($user) {
                    $users[] = $user;
                }
            }

            $account = $users[0];
            $accounts = '';

            return view('admin.transaction.create', compact('account', 'accounts'));
        } else {
            return redirect()->back()->with('error', 'No user with such name can be found. Please recheck the image.');
        }
    }
}
