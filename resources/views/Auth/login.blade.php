@extends('front_layouts.layout')

@section('header')
    <!-- title -->
    <title>Login</title>
    <!-- CSS for particular page goes here -->
    <link rel="stylesheet" href="{{ asset('css/Login.css') }}" media="screen">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection

@section('content-1')
    <section class="form__login u-clearfix u-image u-section-1" src="" id="sec-5808" data-image-width="1280"
        data-image-height="1114">
        <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
            <div class="u-clearfix u-layout-wrap u-layout-wrap-1">
                <div class="u-layout">
                    <div class="u-layout-col">
                        <div class="u-container-style u-layout-cell u-size-30 u-white u-layout-cell-1">
                            <div class="u-container-layout u-valign-top u-container-layout-1">
                                <img class="u-expanded-width u-image u-image-1"
                                    src="{{ asset('image/auth_foreground.png') }}" data-image-width="1280"
                                    data-image-height="1280">
                            </div>
                        </div>

                        <div>
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
                        </div>
                        <div>
                            @if (session('error'))
                                <div class="col-sm-12">
                                    <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('error') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="u-align-center u-container-style u-layout-cell u-size-30 u-white u-layout-cell-2">
                            <div class="u-container-layout u-container-layout-2">
                                <div class="u-form u-form-1">
                                    <form id="authLogin" action="{{ route('auth.login') }}" method="POST"
                                        class="u-clearfix u-form-spacing-27 u-form-vertical u-inner-form"
                                        style="padding: 0px;" source="custom" name="form">
                                        @csrf
                                        <div class="u-form-group u-form-name u-form-group-1">
                                            <label for="email" class="u-form-control-hidden u-label"
                                                wfd-invisible="true">Email</label>
                                            <input type="text" placeholder="Email/Username" id="name-30a4" name="email"
                                                class="u-border-2 u-border-grey-5 u-grey-5 u-input u-input-rectangle u-radius-50 u-input-1"
                                                required="">
                                            @error('email')
                                                <p>{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="u-form-group u-form-group-2">
                                            <label for="email-cd2c" class="u-form-control-hidden u-label"
                                                wfd-invisible="true"></label>
                                            <input type="password" id="email-cd2c" name="password"
                                                class="u-border-2 u-border-grey-5 u-grey-5 u-input u-input-rectangle u-radius-50 u-input-2"
                                                required="required" placeholder="password">
                                        </div>
                                        <div class="form-checkbox u-form-group u-form-group-3">
                                            <input type="checkbox" id="checkbox" name="remember" value="On">
                                            <label for="checkbox" class="u-label">Remember me</label>
                                        </div>
                                        
                                        <div class="u-align-left u-form-group u-form-submit u-form-group-4">
                                            <a onclick="getElementById('authLogin').submit()"
                                                class="u-active-grey-75 u-border-1 u-border-active-grey-75 u-border-hover-black u-border-palette-2-base u-btn u-btn-round u-btn-submit u-button-style u-hover-black u-palette-2-light-1 u-radius-50 u-btn-1">Login</a>
                                        </div>
                                    </form>
                                </div>

                                @if (Route::has('auth.password.reset'))
                                    <a href="{{ Route('auth.password.reset') }}"
                                        class="u-text u-text-custom-color-5 u-text-default u-text-1"> Forgot Password?</a>
                                @endif
                                <p class="u-text u-text-default u-text-2">New to HRS.&nbsp;<a
                                        href="{{ route('auth.register') }}"
                                        class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-custom-color-5 u-btn-2">Click
                                        here</a> to Signup.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')
@endsection
