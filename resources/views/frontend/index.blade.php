@extends('front_layouts.layout')

@section('header')
    <!-- title -->
    <link rel="stylesheet" href="{{ asset('css/Home.css') }}" media="screen">
    <!-- CSS for particular page goes here -->
@endsection

@section('content-1')
    <!-- Content of the page goes here -->
    <section class="u-align-left u-clearfix u-image u-shading u-section-1" src="" data-image-width="1280" data-image-height="720" id="sec-6f48">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <h1 class="u-text u-text-default u-title u-text-1">Get started</h1>
        <p class="u-large-text u-text u-text-variant u-text-2">We can provide you financial solutoin. With our new and improve system we are proud to say that&nbsp;<br>yes you can trust us...
        </p>
        <a href="#" class="u-btn u-button-style u-palette-2-base u-btn-1">Read More</a>
      </div>
    </section>
    <section class="u-clearfix u-section-2" id="carousel_9cc9">
      <div class="u-expanded-height-lg u-expanded-height-md u-expanded-height-xl u-expanded-width-sm u-expanded-width-xs u-palette-2-base u-shape u-shape-rectangle u-shape-1"></div>
      <div class="u-clearfix u-layout-wrap u-layout-wrap-1">
        <div class="u-layout">
          <div class="u-layout-row">
            <div class="u-container-style u-layout-cell u-left-cell u-size-31 u-layout-cell-1">
              <div class="u-container-layout u-valign-middle u-container-layout-1">
                <img src="{{ asset('image/home_2.png') }}" alt="" class="u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-image u-image-round u-radius-50 u-image-1" data-image-width="136" data-image-height="150">
              </div>
            </div>
            <div class="u-align-left u-container-style u-layout-cell u-palette-2-base u-right-cell u-size-29 u-layout-cell-2">
              <div class="u-container-layout u-valign-middle u-container-layout-2">
                <h2 class="u-text u-text-1"> Pioneering AI</h2>
                <a href="https://nicepage.studio" class="u-active-palette-2-light-1 u-border-3 u-border-active-palette-2-light-1 u-border-hover-palette-2-light-1 u-border-white u-btn u-btn-round u-button-style u-hover-palette-2-light-1 u-none u-radius-50 u-text-active-white u-text-body-alt-color u-text-hover-white u-btn-1">learn more</a>
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
