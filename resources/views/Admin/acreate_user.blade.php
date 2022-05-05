@extends('back_layouts.layout')

@section('header')
    <!-- title -->
    <title>Dashboard/Home</title>
    <!-- CSS for particular page goes here -->
@endsection

@section('content-1')
    <!-- Content of the page goes here -->
    <form action="/admin/user_manage" method="POST">
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
        <select name="" id="">
            <option value="hello">hello</option>
        </select>
    </form>
@endsection



@section('footer')
    <!-- JavaScripts or links to js files goes here -->
@endsection
