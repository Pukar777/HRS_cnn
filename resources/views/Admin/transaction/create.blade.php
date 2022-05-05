@extends('back_layouts.layout')

@section('header')
    <!-- title -->
    <title>Dashboard/Home</title>
    <!-- CSS for particular page goes here -->
@endsection

@section('content-1')
    <!-- Content of the page goes here -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">            
                    <div class="card-header">
                        <h3 class="float-start">Create a New Transaction</h3>

                        @if (session('success'))
                            <div class="col-sm-12">
                                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="col-sm-12">
                                <div class="alert  alert-error alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                            </div>
                        @endif


                    </div>
                    <div class="card-body g-3" id="create_form">
                        {{ Form::open(array('url' => route('admin.transaction_manage.store'),'method' => 'POST')) }}
                            @csrf
                            <div class="">
                                @if($accounts)
                                {{ Form::select('id', $accounts, null, ['class'=>"form-control selectpicker", 'required'=>"", "data-live-search"=>"true"]) }}
                                @endif
                                @if($account)
                                {{  Form::text('id', $account->name, ['class'=>"form-control readonly",'required'=>'', 'class'=>'form-control'])  }}
                                @endif
                            </div>
                            <br>
                            <div class="">
                                {{ Form::number('amount', '', ['id' => 'ammount', 'placeholder' => 'Amount(Rs.)', 'required' => '', 'class' => 'form-control']) }}
                            </div>
                            <br>
                            <div class="form-check form-check-inline">
                                {{ Form::radio('type', 'debit', ['id' => 'debit']) }}
                                <label class="form-check-label" for="debit">Debit</label>
                            </div>
                            <div class="form-check form-check-inline">
                                {{ Form::radio('type', 'credit', ['id' => 'credit']) }}
                                <label class="form-check-label" for="credit">Credit</label>
                            </div>
                            <br>
                            <br>
                            <div class="">
                                {{ Form::text('comments', '', ['id'=>"comment", 'placeholder'=>"comments...", 'required'=>"", 'class'=>"form-control"]) }}
                            </div>
                            <br>
                            {{ Form::submit('Save', ['class'=>'btn btn-primary']) }}
                        {{ Form::close() }}


                        {{-- <form action="{{ route('admin.transaction_manage.store') }}" method="POST">

                            <div class="">
                                <label for="account_no"></label>
                                <select class="form-control selectpicker" multiple data-live-search="true">
                                    <option  selected disabled></option>
                                    @foreach ($accounts as $account)
                                        <option value="{{ $account->account_no }}">{{ $account->account_no }} - {{ $account->user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="">
                                <label for="amount"></label>
                                <input name="amount" type="number" id="amount" placeholder="Amount(Rs.)" required="" class="form-control" >
                            </div>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="type" id="debit" value="debit">
                                <label class="form-check-label" for="debit">Debit</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="type" id="credit" value="credit">
                                <label class="form-check-label" for="credit">Credit</label>
                            </div>
                            <div class="">
                                <label for="comment"></label>
                                <input name="comment" type="text" id="comment" placeholder="comments..." required="" class="form-control" >
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form> --}}

                    </div>
                </div>

                {{ Form::open(array('url'=> route('admin.hrs.store'), 'method' => 'POST', 'enctype'=>"multipart/form-data")) }}

                    {{ Form::file('image', ['class' => 'icon']) }}

                    {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}

                {{ Form::close() }}

                <link rel="stylesheet" href="{{ asset('css\upload.css') }}" media="screen">


                    <div class="card drag-area mt-5">
                        <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
                        <header>Drag & Drop to Upload File</header>
                        <span>OR</span>
                        <button>Browse File</button>
                        <input type="file" hidden>
                    </div>

                <script class="u-script" type="text/javascript" src="{{ asset('js/upload.js') }}" defer=""></script>
                
            </div>
        </div>
    </div>    
@endsection



@section('footer')
    <!-- JavaScripts or links to js files goes here -->
@endsection
