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
                                    <form id="pass_reset" action="{{ route('auth.password.reset.mail') }}" method="POST" class="u-clearfix u-form-spacing-27 u-form-vertical u-inner-form" style="padding: 0px;" source="custom" name="form">
                                            @csrf
                                        <div class="u-form-group u-form-group-3">
                                            <label for="email" class="u-form-control-hidden u-label" wfd-invisible="true"></label>
                                            <input type="email" id="email" name="email" class="u-border-2 u-border-grey-5 u-grey-5 u-input u-input-rectangle u-radius-50 u-input-3" required="required" placeholder="Enter your email...">
                                        </div>
                                        <div class="u-align-left u-form-group u-form-submit u-form-group-5">
                                            <a  onclick="document.getElementById('pass_reset').submit()" class="u-active-grey-75 u-border-1 u-border-active-grey-75 u-border-hover-black u-border-palette-2-base u-btn u-btn-round u-btn-submit u-button-style u-hover-black u-palette-2-light-1 u-radius-50 u-btn-1">Email reset link</a>
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