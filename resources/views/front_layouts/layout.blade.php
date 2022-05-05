<!DOCTYPE html>
<html style="font-size: 16px;">

<head>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css\nicepage.css') }}" media="screen">

    @yield('header')
    <!-- CSS -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <link id="u-theme-google-font" rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aclonica:400">

    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Organization",
            "name": "",
            "sameAs": []
        }
    </script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Header Footer">
    <meta property="og:type" content="website">
</head>

<body class="u-body">

    <!--dynamic content starts here-->

    @include('front_layouts.header')

    @yield('content-1')

    @include('front_layouts.footer')

    <!--dynamic content ends here-->


    <span
        style="height: 64px; width: 64px; margin-left: 0px; margin-right: auto; margin-top: 0px; background-image: none; right: 20px; bottom: 20px"
        class="u-back-to-top u-custom-color-7 u-icon u-icon-circle u-opacity u-opacity-85 u-spacing-15" data-href="#">
        <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 551.13 551.13">
            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-1d98"></use>
        </svg>
        <svg class="u-svg-content" enable-background="new 0 0 551.13 551.13" viewBox="0 0 551.13 551.13"
            xmlns="http://www.w3.org/2000/svg" id="svg-1d98">
            <path d="m275.565 189.451 223.897 223.897h51.668l-275.565-275.565-275.565 275.565h51.668z"></path>
        </svg>
    </span>


    <!-- JS -->
    <script class="u-script" type="text/javascript" src="{{ asset('js/jquery.js') }}" defer=""></script>
    <script class="u-script" type="text/javascript" src="{{ asset('js/nicepage.js') }}" defer=""></script>

    @yield('footer')
    <!-- JS -->

</body>

</html>
