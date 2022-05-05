@extends('back_layouts.layout')

@section('header')
    <!-- title -->
    <title>Dashboard/Transaction</title>
    <!-- CSS for particular page goes here -->
@endsection

@section('content-1')
    <!-- Content of the page goes here -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    
                    <div class="card-header">
                        <h3 class="float-start">Transactions</h3>
                        <a href="{{ route('admin.transaction_manage.create') }}" class="btn btn-md btn-primary float-end" id="create_form_add">Create new Transaction</a>
                    </div>

                    <div class="card-body" >
                        <table class="table table-bordered mb-0 table-dark table-striped text-center">
                            <thead>
                                <tr>
                                    <th scope="col" width="60">S.N.</th>
                                    <th scope="col">Transacted By</th>
                                    <th scope="col">Account</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Comment</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td></td>
                                    <td>{{ $transaction->account->account_no }}</td>
                                    <td>{{ strtoupper($transaction->type) }}</td>
                                    <td>{{ $transaction->amount }}/Rs.</td>
                                    <td>
                                        {{-- <a href="{{ route('role_manage_edit', $role) }}" onclick="getElementById({{ 'actions'.$role.'edit' }}).submit()" class="btn btn-sm btn-primary">Edit</a> --}}
                                        {{-- <a onclick="getElementById({{ 'actions'.$role.'delete' }}).submit()" class="btn btn-sm btn-danger">Delete</a> --}}
                                        <a href="{{ route('admin.transaction_manage.edit', $transaction->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="{{ route('admin.transaction_manage.destroy', $transaction->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                        
                                    </td>
                                </tr>
                                    @endforeach
                            </tbody>
                        </table> 
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection



@section('footer')
    <!-- JavaScripts or links to js files goes here -->
@endsection
