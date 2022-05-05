@extends('back_layouts.layout')

@section('header')
    <!-- title -->
    <title>Dashboard/User_manage</title>
    <!-- CSS for particular page goes here -->
@endsection

@section('content-1')
    <!-- Content of the page goes here -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">            
                    <div class="card-header">
                        <h3 class="float-start">Create a New User</h3>

                        

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

                        {{ Form::open(array('url' => route('admin.user_manage.store'), 'method'=>"POST")) }}
                        @csrf
                        <div class="">
                            {{  Form::text('name', '', ['id'=>'name', 'placeholder'=>'Username', 'required'=>'', 'class'=>'form-control'])  }}
                        </div>
                        <br>
                        @error('email')
                            <p>{{ $message }}</p>
                        @enderror
                        <div class="">
                            {{  Form::text('email', '', ['id'=>'email', 'placeholder'=>'Email', 'required'=>'', 'class'=>'form-control'])  }}
                        </div>
                        <br>
                        <div class="">
                            {!! Form::select('roles[]', $roles, null, ['class'=> 'form-control selectpicker', 'multiple'=>'', 'data-live-search'=>'true']) !!}
                        </div>
                        <br>
                        {{ Form::submit('Save', ['class'=> 'btn btn-primary']) }}
                        {{ Form::close() }}

                        {{-- <form action="{{ route('admin.user_manage.store') }}" method="POST">
                            @csrf
                            <div class="">
                                <label for="name"></label>
                                <input name="name" type="text" id="name" placeholder="Username" required="" class="form-control" >
                            </div>
                            <div class="">
                                <label for="email"></label>
                                <input name="email" type="email" id="email" placeholder="Email" required="" class="form-control" >
                            </div>
                            <div class="">
                                <label for="roles"></label>
                                <select class="form-control selectpicker" multiple data-live-search="true">
                                    <option selected disabled>Assign Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Save</button>
                            
                        </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <form action="/admin/user_manage" method="POST">
        <div class="col-lg-6 float-start">
            <label for="role" class="visually-hidden"></label>
            <input name="name" type="text" id="role" placeholder="Enter a new role..."" required="" class="form-control" >
        </div>
        {{-- <select class="form-select" aria-label="Default select example">
            <option selected>Select Roles</option>
            @foreach ($roles as $role)
                <option value="$roles"></option>
            @endforeach
        </select> --}}
        {{-- <select name="permission" class="selectpicker" multiple data-live-search="true">
        @foreach($roles as $role)
            <h1></h1>
            <option value="{{ $role->name }}">{{ $role->name }}</option>
        @endforeach
        </select>                         --}}
        {{-- @foreach ($roles as $role)
            {{ dd($role->name) }}
        @endforeach --}}
        {{-- <select name="" id="">
            <option value="hello">hello</option>
        </select> --}}
    {{-- </form> --}}









    
@endsection



@section('footer')
    <!-- JavaScripts or links to js files goes here -->
@endsection
