<!DOCTYPE html>
<html class="wide wow-animation" lang="{{ app()->getLocale() }}">

<head>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-F6GV2KL54E"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-F6GV2KL54E');
    </script>
    <meta name="google-site-verification" content="sTgZhdZDFuXrrwbvBHM87PlUPZjis5sWM08_y9pVllM" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700%7CLato%7CKalam:300,400,700">
    <link rel="canonical" href="{{ request()->url() }}" />
    <meta name="description" content="{{ $description??sc_store('description') }}">
    <meta name="keyword" content="{{ $keyword??sc_store('keyword') }}">
    <title>{{$title??sc_store('title')}}</title>
    <link rel="icon" href="{{ sc_file(sc_store('icon', null, 'images/icon.png')) }}" type="image/png" sizes="16x16">
    <meta property="og:image" content="{{ !empty($og_image)?sc_file($og_image):sc_file('images/org.jpg') }}" />
    <meta property="og:url" content="{{ \Request::fullUrl() }}" />
    <meta property="og:type" content="Website" />
    <meta property="og:title" content="{{ $title??sc_store('title') }}" />
    <meta property="og:description" content="{{ $description??sc_store('description') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- css default for item s-cart -->
    @include($sc_templatePath.'.common.css')
    <!--//end css defaut -->

    <!--Module header -->
    @includeIf($sc_templatePath.'.common.render_block', ['positionBlock' => 'header'])
    <!--//Module header -->

    <link rel="stylesheet" href="{{ sc_file($sc_templateFile.'/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ sc_file($sc_templateFile.'/css/fonts.css')}}">
    <link rel="stylesheet" href="{{ sc_file($sc_templateFile.'/css/style.css')}}">
    <!-- Zalo button -->
    <style>
        @keyframes zoom {
            0% {
                transform: scale(.5);
                opacity: 0
            }

            50% {
                opacity: 1
            }

            to {
                opacity: 0;
                transform: scale(1)
            }
        }

        @keyframes lucidgenzalo {
            0% to {
                transform: rotate(-25deg)
            }

            50% {
                transform: rotate(25deg)
            }
        }

        .jscroll-to-top {
            bottom: 100px
        }

        .fcta-zalo-ben-trong-nut svg path {
            fill: #fff
        }

        .fcta-zalo-vi-tri-nut {
            position: fixed;
            bottom: 124px;
            right: 20px;
            z-index: 999
        }

        .fcta-zalo-nen-nut,
        div.fcta-zalo-mess {
            box-shadow: 0 1px 6px rgba(0, 0, 0, .06), 0 2px 32px rgba(0, 0, 0, .16)
        }

        .fcta-zalo-nen-nut {
            width: 50px;
            height: 50px;
            text-align: center;
            color: #fff;
            background: #0068ff;
            border-radius: 50%;
            position: relative
        }

        .fcta-zalo-nen-nut::after,
        .fcta-zalo-nen-nut::before {
            content: "";
            position: absolute;
            border: 1px solid #0068ff;
            background: #0068ff80;
            z-index: -1;
            left: -20px;
            right: -20px;
            top: -20px;
            bottom: -20px;
            border-radius: 50%;
            animation: zoom 1.9s linear infinite
        }

        .fcta-zalo-nen-nut::after {
            animation-delay: .4s
        }

        .fcta-zalo-ben-trong-nut,
        .fcta-zalo-ben-trong-nut i {
            transition: all 1s
        }

        .fcta-zalo-ben-trong-nut {
            position: absolute;
            text-align: center;
            width: 60%;
            height: 60%;
            left: 10px;
            bottom: 33px;
            line-height: 70px;
            font-size: 25px;
            opacity: 1
        }

        .fcta-zalo-ben-trong-nut i {
            animation: lucidgenzalo 1s linear infinite
        }

        .fcta-zalo-nen-nut:hover .fcta-zalo-ben-trong-nut,
        .fcta-zalo-text {
            opacity: 0
        }

        .fcta-zalo-nen-nut:hover i {
            transform: scale(.5);
            transition: all .5s ease-in
        }

        .fcta-zalo-text a {
            text-decoration: none;
            color: #fff
        }

        .fcta-zalo-text {
            position: absolute;
            top: 6px;
            text-transform: uppercase;
            font-size: 12px;
            font-weight: 700;
            transform: scaleX(-1);
            transition: all .5s;
            line-height: 1.5
        }

        .fcta-zalo-nen-nut:hover .fcta-zalo-text {
            transform: scaleX(1);
            opacity: 1
        }

        div.fcta-zalo-mess {
            position: fixed;
            bottom: 128px;
            right: 58px;
            z-index: 99;
            background: #fff;
            padding: 7px 25px 7px 15px;
            color: #0068ff;
            border-radius: 50px 0 0 50px;
            font-weight: 700;
            font-size: 15px
        }

        .fcta-zalo-mess span {
            color: #0068ff !important
        }

        span#fcta-zalo-tracking {
            font-family: Roboto;
            line-height: 1.5
        }

        .fcta-zalo-text {
            font-family: Roboto
        }
    </style>

    <script>
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            document.getElementById("linkzalo").href = "https://zalo.me/{{ sc_config('zalo_number') }}";
        }
    </script>
    <!-- End Zalo button -->
    <style>
        {!! sc_store_css() !!}
    </style>
    <style>
        .ie-panel {
            display: none;
            background: #212121;
            padding: 10px 0;
            box-shadow: 3px 3px 5px 0 rgba(0, 0, 0, .3);
            clear: both;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        html.ie-10 .ie-panel,
        html.lt-ie-10 .ie-panel {
            display: block;
        }
    </style>
    @stack('styles')
</head>

<body>
    <div class="ie-panel">
        <a href="http://windows.microsoft.com/en-US/internet-explorer/">
            <img src="{{ sc_file($sc_templateFile.'/images/ie8-panel/warning_bar_0000_us.jpg')}}" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today.">
        </a>
    </div>

    <div class="page">
        {{-- Block header --}}
        @section('block_header')
        @include($sc_templatePath.'.block_header')
        @show
        {{--// Block header --}}

        {{-- Block top --}}
        @section('block_top')
        @include($sc_templatePath.'.block_top')

        <!--Breadcrumb -->
        @section('breadcrumb')
        @include($sc_templatePath.'.common.breadcrumb')
        @show
        <!--//Breadcrumb -->

        <!--Notice -->
        @include($sc_templatePath.'.common.notice')
        <!--//Notice -->
        @show
        {{-- //Block top --}}

        {{-- Block main --}}
        @section('block_main')
        <section class="section section-xxl bg-default text-md-left">
            <div class="container">
                <div class="row row-20">
                    @section('block_main_content')
                    @if (sc_config('show_block_left'))
                    <!--Block left-->
                    <div class="col-lg-4 col-xl-3">
                        @section('block_main_content_left')
                        @include($sc_templatePath.'.block_main_content_left')
                        @show
                    </div>
                    <!--//Block left-->

                    <!--Block center-->
                    <div class="col-lg-9 col-xl-9">
                        @section('block_main_content_center')
                        @include($sc_templatePath.'.block_main_content_center')
                        @show
                    </div>
                    <!--//Block center-->
                    @else
                    <!--Block center-->
                    <div class="col-lg-12 col-xl-12">
                        @section('block_main_content_center')
                        @include($sc_templatePath.'.block_main_content_center')
                        @show
                    </div>
                    <!--//Block center-->
                    @endif

                    @if (empty($hiddenBlockRight))
                    <!--Block right -->
                    @section('block_main_content_right')
                    @include($sc_templatePath.'.block_main_content_right')
                    @show
                    <!--//Block right -->
                    @endif

                    @show
                </div>
            </div>
        </section>
        @show
        {{-- //Block main --}}

        <!-- Render include view -->
        @include($sc_templatePath.'.common.include_view')
        <!--// Render include view -->


        {{-- Block bottom --}}
        @section('block_bottom')
        @include($sc_templatePath.'.block_bottom')
        @show
        {{-- //Block bottom --}}

        {{-- Block footer --}}
        @section('block_footer')
        @include($sc_templatePath.'.block_footer')
        @show
        {{-- //Block footer --}}

        <!-- Zalo button -->
        <a href="https://zalo.me/{{ sc_config('zalo_number') }}" id="linkzalo" target="_blank" rel="noopener noreferrer">
            <div id="fcta-zalo-tracking" class="fcta-zalo-mess">
                <span id="fcta-zalo-tracking">Chat Zalo <span class="fcta-zalo-hour-active">(7h - 17h)</span><br /></span>
            </div>
            <div class="fcta-zalo-vi-tri-nut">
                <div id="fcta-zalo-tracking" class="fcta-zalo-nen-nut">
                    <div id="fcta-zalo-tracking" class="fcta-zalo-ben-trong-nut"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 460.1 436.6">
                            <path fill="currentColor" class="st0" d="M82.6 380.9c-1.8-.8-3.1-1.7-1-3.5 1.3-1 2.7-1.9 4.1-2.8 13.1-8.5 25.4-17.8 33.5-31.5 6.8-11.4 5.7-18.1-2.8-26.5C69 269.2 48.2 212.5 58.6 145.5 64.5 107.7 81.8 75 107 46.6c15.2-17.2 33.3-31.1 53.1-42.7 1.2-.7 2.9-.9 3.1-2.7-.4-1-1.1-.7-1.7-.7-33.7 0-67.4-.7-101 .2C28.3 1.7.5 26.6.6 62.3c.2 104.3 0 208.6 0 313 0 32.4 24.7 59.5 57 60.7 27.3 1.1 54.6.2 82 .1 2 .1 4 .2 6 .2H290c36 0 72 .2 108 0 33.4 0 60.5-27 60.5-60.3v-.6-58.5c0-1.4.5-2.9-.4-4.4-1.8.1-2.5 1.6-3.5 2.6-19.4 19.5-42.3 35.2-67.4 46.3-61.5 27.1-124.1 29-187.6 7.2-5.5-2-11.5-2.2-17.2-.8-8.4 2.1-16.7 4.6-25 7.1-24.4 7.6-49.3 11-74.8 6zm72.5-168.5c1.7-2.2 2.6-3.5 3.6-4.8 13.1-16.6 26.2-33.2 39.3-49.9 3.8-4.8 7.6-9.7 10-15.5 2.8-6.6-.2-12.8-7-15.2-3-.9-6.2-1.3-9.4-1.1-17.8-.1-35.7-.1-53.5 0-2.5 0-5 .3-7.4.9-5.6 1.4-9 7.1-7.6 12.8 1 3.8 4 6.8 7.8 7.7 2.4.6 4.9.9 7.4.8 10.8.1 21.7 0 32.5.1 1.2 0 2.7-.8 3.6 1-.9 1.2-1.8 2.4-2.7 3.5-15.5 19.6-30.9 39.3-46.4 58.9-3.8 4.9-5.8 10.3-3 16.3s8.5 7.1 14.3 7.5c4.6.3 9.3.1 14 .1 16.2 0 32.3.1 48.5-.1 8.6-.1 13.2-5.3 12.3-13.3-.7-6.3-5-9.6-13-9.7-14.1-.1-28.2 0-43.3 0zm116-52.6c-12.5-10.9-26.3-11.6-39.8-3.6-16.4 9.6-22.4 25.3-20.4 43.5 1.9 17 9.3 30.9 27.1 36.6 11.1 3.6 21.4 2.3 30.5-5.1 2.4-1.9 3.1-1.5 4.8.6 3.3 4.2 9 5.8 14 3.9 5-1.5 8.3-6.1 8.3-11.3.1-20 .2-40 0-60-.1-8-7.6-13.1-15.4-11.5-4.3.9-6.7 3.8-9.1 6.9zm69.3 37.1c-.4 25 20.3 43.9 46.3 41.3 23.9-2.4 39.4-20.3 38.6-45.6-.8-25-19.4-42.1-44.9-41.3-23.9.7-40.8 19.9-40 45.6zm-8.8-19.9c0-15.7.1-31.3 0-47 0-8-5.1-13-12.7-12.9-7.4.1-12.3 5.1-12.4 12.8-.1 4.7 0 9.3 0 14v79.5c0 6.2 3.8 11.6 8.8 12.9 6.9 1.9 14-2.2 15.8-9.1.3-1.2.5-2.4.4-3.7.2-15.5.1-31 .1-46.5z"></path>
                        </svg></div>
                    <div id="fcta-zalo-tracking" class="fcta-zalo-text">Chat ngay</div>
                </div>
            </div>
        </a>
        <!-- // Zalo button -->
    </div>

    <div id="sc-loading">
        <div class="sc-overlay"><i class="fa fa-spinner fa-pulse fa-5x fa-fw "></i></div>
    </div>

    <script src="{{ sc_file($sc_templateFile.'/js/core.min.js')}}"></script>
    <script src="{{ sc_file($sc_templateFile.'/js/script.js')}}"></script>

    <!-- js default for item s-cart -->
    @include($sc_templatePath.'.common.js')
    <!--//end js defaut -->
    @stack('scripts')

</body>

</html>