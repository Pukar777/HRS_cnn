@extends('front_layouts.layout')

@section('header')
    <!-- title -->

    <!-- CSS for particular page goes here -->

    <link rel="stylesheet" href="{{ asset('css/Login.css') }}" media="screen">


@endsection

@section('content-1')
    <!-- Content of the page goes here -->

    <section class="form__login u-clearfix u-image u-section-1" src="" id="sec-ff7e" data-image-width="1280" data-image-height="1114">
        <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
            <div class="u-clearfix u-layout-wrap u-layout-wrap-1">
                <div class="u-layout">
                    <div class="u-layout-col">
                        <div class="u-container-style u-layout-cell u-size-30 u-white u-layout-cell-1">
                            <div class="u-container-layout u-valign-top u-container-layout-1">
                                <img class="u-expanded-width u-image u-image-1" src="{{ asset('image/auth_foreground.png') }}" data-image-width="1280" data-image-height="1280">
                            </div>
                        </div>
                        <div class="u-align-center u-container-style u-layout-cell u-size-30 u-white u-layout-cell-2">
                            <div class="u-container-layout u-container-layout-2">
                                <div class="u-form u-form-1">
                                    <form id="pass_reset" action="{{ route('auth.password.update') }}" method="POST" class="u-clearfix u-form-spacing-27 u-form-vertical u-inner-form" style="padding: 0px;" source="custom" name="form">
                                            @csrf

                                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                        <div class="u-form-group u-form-name u-form-group-1">
                                            <label for="name" class="u-form-control-hidden u-label" wfd-invisible="true">Name</label>
                                            <input value="{{ old('email', $request->email) }}" type="text" id="email" name="email" class="u-border-2 u-border-grey-5 u-grey-5 u-input u-input-rectangle u-radius-50 u-input-1" readonly required autofocus>
                                            @error('email')
                                                <p>{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="u-form-group u-form-group-3">
                                            <label for="password" class="u-form-control-hidden u-label" wfd-invisible="true"></label>
                                            <input type="password" id="password" name="password" class="u-border-2 u-border-grey-5 u-grey-5 u-input u-input-rectangle u-radius-50 u-input-3" required="required" placeholder="password">
                                            @error('password')
                                                <p>{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="u-form-group u-form-group-4">
                                            <label for="password_confirmation" class="u-form-control-hidden u-label"></label>
                                            <input type="password" placeholder="Confirm password" id="confirm_password" name="password_confirmation" class="u-border-2 u-border-grey-5 u-grey-5 u-input u-input-rectangle u-radius-50 u-input-4" required="required">
                                        </div>

                                        <div class="u-align-left u-form-group u-form-submit u-form-group-5">
                                            <a  onclick="document.getElementById('pass_reset').submit()" class="u-active-grey-75 u-border-1 u-border-active-grey-75 u-border-hover-black u-border-palette-2-base u-btn u-btn-round u-btn-submit u-button-style u-hover-black u-palette-2-light-1 u-radius-50 u-btn-1">Change Password</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection



@section('footer')
    <!-- JavaScripts or links to js files goes here -->
    
@endsection