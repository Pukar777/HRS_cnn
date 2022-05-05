<?php

namespace App\Http\Controllers\admin;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionUser;
use App\Http\Controllers\Controller;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $transactions = Transaction::with('account', 'users')->get();
        // foreach ($transactions as $transaction) {
        //     dd($transaction);
        // }
        return view('admin.transaction.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $accounts = Account::pluck('account_no', 'id');
        $account = "";
        return view('admin.transaction.create', compact('accounts', 'account'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $details = [
            'account_id' => $request->id,
            'amount' => $request->amount,
            'type' => $request->type,
            'comments' => $request->comments,
        ];

        $user_id = Auth::user()->id;
        // dd($details);
        $transaction = Transaction::create($details);
        TransactionUser::create([
            'user_id' => $user_id,
            'transaction_id' => $transaction->id
        ]);

        return redirect()->back()->with('success', 'Transaction recorded successfully');
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
        $account = Account::pluck('account_no', 'id');
        return view('admin.transaction.edit', compact('account'));
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
        dd('Success');
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
    }
}
