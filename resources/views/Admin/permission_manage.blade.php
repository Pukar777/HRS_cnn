@extends('back_layouts.layout')

@section('header')
    <!-- title -->
    <title>Dashboard/permission_manage</title>
    <!-- CSS for particular page goes here -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@endsection

@section('content-1')
    <!-- Content of the page goes here -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">            
                    <div class="card-header">
                        <h3 class="float-start">List of Permission</h3>
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
                        <a onclick="myFunction()" class="btn btn-md btn-primary float-end" id="create_form_add">Add New</a>
                        <a onclick="myFunction()" class="btn btn-md btn-primary float-end collapse" id="create_form_close">Close</a>
                    </div>


                    
                    <div class="card-body collapse g-3" id="create_form">
                        <form action="{{ route('admin.permission_manage.store') }}" method="POST">
                            @csrf
                            <div class="col-lg-6 float-start">
                                <label for="role" class="visually-hidden"></label>
                                <input name="name" type="text" id="role" placeholder="Enter a new permission..."" required="" class="form-control" >
                            </div>
                            <div class="col-lg-3 float-end">
                                <button type="submit" class="btn btn-primary lg-3">Save</button>
                            </div>
                        </form>
                    </div>


                    <div class="card-body" >
                        <table class="table table-bordered mb-0 table-dark table-striped text-center">
                            <thead>
                                <tr>
                                    <th scope="col" width="60">S.N.</th>
                                    <th scope="col">Permissions</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach ($permissions  as $permission)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ ucwords($permission->name) }}</td>
                                    <td>
                                        {{-- <a href="{{ route('role_manage_edit', $role) }}" onclick="getElementById({{ 'actions'.$role.'edit' }}).submit()" class="btn btn-sm btn-primary">Edit</a> --}}
                                        {{-- <a onclick="getElementById({{ 'actions'.$role.'delete' }}).submit()" class="btn btn-sm btn-danger">Delete</a> --}}
                                        <a href="{{ route('admin.permission_manage.edit', $permission->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        
                                        <a href="{{ route('admin.permission_manage.destroy', $permission->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                        
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

    <script>
        function myFunction() {
            var form = document.getElementById("create_form");
            form.classList.toggle("collapse");
            var add = document.getElementById("create_form_add");
            add.classList.toggle("collapse");
            var close = document.getElementById("create_form_close");
            close.classList.toggle("collapse");
            var list = document.getElementById("roles_list");
            list.classList.toggle("collapse");
        }
    </script>
@endsection



@section('footer')
    <!-- JavaScripts or links to js files goes here -->

    
@endsection
