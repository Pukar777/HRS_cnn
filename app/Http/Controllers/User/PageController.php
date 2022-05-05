<?php

namespace App\Http\Controllers\User;

use Exception;

use App\Models\User;
use App\Models\Account;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use function GuzzleHttp\Promise\exception_for;

class PageController extends Controller
{
    //

    public function dashboard()
    {
        $id = auth()->id();
        $user = User::with('account')->find($id);

        try {
            $account = Account::with('transactions')->find($user->account->id);
        } catch (Exception $e) {
            return view('frontend.index');
        }


        // dd($account);

        return view('user.dashboard', compact('account'));
    }
}
