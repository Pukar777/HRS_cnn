@extends('back_layouts.layout')

@section('header')
    <!-- title -->
    <title>Dashboard/role_manage</title>
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
                        <h3 class="float-start">List of Roles</h3>
                        @error('name')
                            <p>{{ $message }}</p>
                        @enderror
                        <a onclick="myFunction()" class="btn btn-md btn-primary float-end" id="create_form_add">Add New</a>
                        <a onclick="myFunction()" class="btn btn-md btn-primary float-end collapse" id="create_form_close">Close</a>
                    </div>


                    
                    <div class="card-body collapse g-3" id="create_form">
                        

                        {{ Form::open(array('url' => route('admin.role_manage.store'), 'method'=>"POST")) }}

                        <div class="">
                            {{  Form::text('role', '', ['id'=>'role', 'placeholder'=>'Enter a new role ...', 'required'=>'', 'class'=>'form-control'])  }}
                        </div>

                        <br>

                        <div class="">
                            {!! Form::select('permissions[]', $permissions, null, ['class'=> 'form-control selectpicker', 'multiple'=>'', 'data-live-search'=>'true']) !!}
                        </div>

                        <br>

                        {{ Form::submit('Save', ['class'=> 'btn btn-primary']) }}
                        {{ Form::close() }}
                    </div>


                    <div class="card-body" >
                        <table class="table table-bordered mb-0 table-dark table-striped text-center">
                            <thead>
                                <tr>
                                    <th scope="col" width="60">S.N.</th>
                                    <th scope="col">Roles</th>
                                    <th scope="col">Permissions</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ ucwords($role->name) }}</td>
                                    <td>
                                        @foreach ($role->permissions as $permission)
                                            {{ ($permission->name) }}
                                        @endforeach
                                    </td>
                                    <td>
                                        {{-- <a href="{{ route('role_manage_edit', $role) }}" onclick="getElementById({{ 'actions'.$role.'edit' }}).submit()" class="btn btn-sm btn-primary">Edit</a> --}}
                                        {{-- <a onclick="getElementById({{ 'actions'.$role.'delete' }}).submit()" class="btn btn-sm btn-danger">Delete</a> --}}
                                        <a href="{{ route('admin.role_manage.edit', $role->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="{{ route('admin.role_manage.destroy', $role->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                        
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
