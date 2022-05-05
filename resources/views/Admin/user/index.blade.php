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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="float-start">List of Users</h3>
                        <a href="{{ route('admin.user_manage.create') }}" class="btn btn-md btn-primary float-end" id="create_form_add">Add New User</a>
                    </div>

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

                    <div class="card-body">
                        <table class="table table-bordered mb-0 table-dark table-striped text-center">
                            <thead>
                                <tr>
                                    <th scope="col" width="60">S.N.</th>
                                    <th scope="col" width="180" >User Role</th>
                                    <th scope="col">Users</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col" width="150">created_at</th>
                                    <th scope="col" width="200">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @foreach ($user->roles as $role)
                                                {{ ucwords($role->name) }}
                                            @endforeach
                                        </td>
                                        <td>{{ ucwords($user->name) }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>
                                             {{-- <a href="{{ route('role_manage.delete', $role['id']) }}" class="btn btn-sm btn-primary" Edit></a>
                                            <a href="" onclick="getElementById({{ 'actions' . $role . 'edit' }}).submit()" class="btn btn-sm btn-primary">Edit</a>
                                            <a onclick="getElementById({{ 'actions' . $role . 'delete' }}).submit()" class="btn btn-sm btn-danger">Delete</a> --}}
                                            {{-- <a href="/admin/user_manage/{{ $user->id }}/edit" class="btn btn-sm btn-primary">Edit</a> --}}
                                            <a href="{{ route('admin.user_manage.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <a href="{{ route('admin.user_manage.destroy', $user->id) }}" class="btn btn-sm btn-danger">Delete</a>
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
