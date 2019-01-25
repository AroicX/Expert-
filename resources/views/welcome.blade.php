<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if(Auth::check())
                <div class="top-right links">
                    @if(Auth::user()->adminlevel === '0')
                      <a href="{{ route('home') }}">Home</a>
                    @else (Auth::user()->adminlevel === '1')
                    <a href="{{ route('adminhome') }}">Home</a>
                    @endif
                </div>
                    @else
                    <div class="top-right links">
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    </div>
                   
               
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
            <!-- All Jquery -->
            <script src="/js/lib/jquery/jquery.min.js"></script>
            {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js" type="text/javascript" ></script> --}}
            <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" type="text/javascript" ></script>
            <!-- Bootstrap tether Core JavaScript -->
                <script>
              @if(Session::has('message'))
                var type = "{{ Session::get('alert', 'info') }}";
                switch(type){
                    case 'info':
                        toastr.info("{{ Session::get('message') }}");
                        break;
                    
                    case 'warning':
                        toastr.warning("{{ Session::get('message') }}");
                        break;

                    case 'success':
                        toastr.success("{{ Session::get('message') }}");
                        break;

                    case 'error':
                        toastr.error("{{ Session::get('message') }}");
                        break;
                }
              @endif
            </script>
            <script src="/js/lib/bootstrap/js/popper.min.js"></script>
            <script src="/js/lib/bootstrap/js/bootstrap.min.js"></script>
            <!-- slimscrollbar scrollbar JavaScript -->
            <script src="/js/jquery.slimscroll.js"></script>
            <!--Menu sidebar -->
            <script src="/js/sidebarmenu.js"></script>
            <!--stickey kit -->
            <script src="/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>

        {{-- 
            <script src="/js/lib/datamap/d3.min.js"></script>
            <script src="/js/lib/datamap/topojson.js"></script>
            <script src="/js/lib/datamap/datamaps.world.min.js"></script>
            <script src="/js/lib/datamap/datamap-init.js"></script>

            <script src="/js/lib/weather/jquery.simpleWeather.min.js"></script>
            <script src="/js/lib/weather/weather-init.js"></script>
            <script src="/js/lib/owl-carousel/owl.carousel.min.js"></script>
            <script src="/js/lib/owl-carousel/owl.carousel-init.js"></script>


            <script src="/js/lib/chartist/chartist.min.js"></script>
            <script src="/js/lib/chartist/chartist-plugin-tooltip.min.js"></script>
            <script src="/js/lib/chartist/chartist-init.js"></script> 
            <script src="js/lib/toastr/toastr.min.js"></script>
            <!-- scripit init-->
            <script src="js/lib/toastr/toastr.init.js"></script>
            --}}
            <!--Custom JavaScript -->


    </body>
</html>
