
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>MSociety - A Visitor Management System</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">


    <style>
        .icon-block {
            padding: 0 15px;
        }
        .icon-block .material-icons {
            font-size: inherit;
        }

        .slider .indicators .indicator-item {
            background-color: #666666;
            border: 3px solid #ffffff;
            -webkit-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
            -moz-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
        }
        .slider .indicators .indicator-item.active {
            background-color: #ffffff;
        }
        .slider {
            width: 900px;
            margin: 0 auto;
        }
        .slider .indicators {
            bottom: 60px;
            z-index: 100;
            /* text-align: left; */
        }
    </style>
</head>
<body>
<nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo"><i class="material-icons md-48">home</i>MSociety</a>
        <ul class="right hide-on-med-and-down">
            @if (Route::has('login'))
                    @auth
                        @if(Auth::user()->role->name == 'administrator')
                            <li><a href="{{url('/admin')}}">Home</a></li>
                        @elseif(Auth::user()->role->name =='manager')
                            <li><a href="{{url('/manager')}}">Home</a></li>
                        @elseif(Auth::user()->role->name =='owner')
                            <li><a href="{{url('/owner')}}">Home</a></li>
                        @elseif(Auth::user()->role->name =='security')
                            <li><a href="{{url('/security')}}">Home</a></li>
                        @endif
                    @else
                        <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-lock"></span> Login</a></li>
                        <li><a href="{{ url('/sign-up') }}"><span class="glyphicon glyphicon-user"></span> Register</a></li>
                    @endauth
            @endif
        </ul>

        <ul id="nav-mobile" class="sidenav">
            <li><a href="#"><span class="glyphicon glyphicon-home">HOME</a></li>

            @if (Route::has('login'))
                @auth
                    @if(Auth::user()->role->name == 'administrator')
                        <li><a href="{{url('/admin')}}">Home</a></li>
                    @elseif(Auth::user()->role->name =='manager')
                        <li><a href="{{url('/manager')}}">Home</a></li>
                    @elseif(Auth::user()->role->name =='owner')
                        <li><a href="{{url('/owner')}}">Home</a></li>
                    @elseif(Auth::user()->role->name =='security')
                        <li><a href="{{url('/security')}}">Home</a></li>
                    @endif
                @else
                    <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-lock"></span> Login</a></li>
                    <li><a href="{{ url('/sign-up') }}"><span class="glyphicon glyphicon-user"></span> Register</a></li>
                @endauth
            @endif
        </ul>
        <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
</nav>
{{--<div class="section no-pad-bot" id="index-banner">--}}
    {{--<div class="container">--}}
        {{--<br><br>--}}
        {{--<h1 class="header center orange-text"><i class="material-icons md-68">home</i> MSociety</h1>--}}
        {{--<div class="row center">--}}
            {{--<h5 class="header col s12 light">A Modern Visitor Management System</h5>--}}
        {{--</div>--}}
        {{--<div class="row center">--}}
            {{--<a href="http://materializecss.com/getting-started.html" id="download-button" class="btn-large waves-effect waves-light orange">Get Started</a>--}}
        {{--</div>--}}
        {{--<br><br>--}}

    {{--</div>--}}
{{--</div>--}}

        <!--SLIDER-->
        <div class="carousel carousel-slider" data-indicators="true" style="height:750px"; >


            <a class="carousel-item" href="#one!"><img src="http://lorempixel.com/800/600/city/6"></a>


            <div class="carousel-fixed-item center">
                <h2 class="white-text">MSociety</h2>
                <p class="white-text">A Visitor Management System</p>
            </div>

            <a class="carousel-item" href="#two!"><img src="http://lorempixel.com/800/600/city/3">
            </a>
            <a class="carousel-item" href="#two!"><img src="http://lorempixel.com/800/600/city/5">
            </a>
        </div>

        <!--   Icon Section   -->
        {{--<div class="row">--}}
            {{--<div class="col s12 m4">--}}
                {{--<div class="icon-block">--}}
                    {{--<h2 class="center light-blue-text"><i class="material-icons">flash_on</i></h2>--}}
                    {{--<h5 class="center">Speeds up Visitor Management</h5>--}}

                    {{--<p class="light">We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components. Additionally, we refined animations and transitions to provide a smoother experience for developers.</p>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="col s12 m4">--}}
                {{--<div class="icon-block">--}}
                    {{--<h2 class="center light-blue-text"><i class="material-icons">group</i></h2>--}}
                    {{--<h5 class="center">User Experience Focused</h5>--}}

                    {{--<p class="light">By utilizing elements and principles of Material Design, we were able to create a framework that incorporates components and animations that provide more feedback to users. Additionally, a single underlying responsive system across all platforms allow for a more unified user experience.</p>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="col s12 m4">--}}
                {{--<div class="icon-block">--}}
                    {{--<h2 class="center light-blue-text"><i class="material-icons">settings</i></h2>--}}
                    {{--<h5 class="center">Easy to work with</h5>--}}

                    {{--<p class="light">We have provided detailed documentation as well as specific code examples to help new users get started. We are also always open to feedback and can answer any questions a user may have about Materialize.</p>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

    {{--</div>--}}
    {{--<br><br>--}}
{{--</div>--}}

<footer class="page-footer orange">
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col l6 s12">--}}
                {{--<h5 class="white-text">Company Bio</h5>--}}
                {{--<p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>--}}


            {{--</div>--}}
            {{--<div class="col l3 s12">--}}
                {{--<h5 class="white-text">Settings</h5>--}}
                {{--<ul>--}}
                    {{--<li><a class="white-text" href="#!">Link 1</a></li>--}}
                    {{--<li><a class="white-text" href="#!">Link 2</a></li>--}}
                    {{--<li><a class="white-text" href="#!">Link 3</a></li>--}}
                    {{--<li><a class="white-text" href="#!">Link 4</a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            {{--<div class="col l3 s12">--}}
                {{--<h5 class="white-text">Connect</h5>--}}
                {{--<ul>--}}
                    {{--<li><a class="white-text" href="#!">Link 1</a></li>--}}
                    {{--<li><a class="white-text" href="#!">Link 2</a></li>--}}
                    {{--<li><a class="white-text" href="#!">Link 3</a></li>--}}
                    {{--<li><a class="white-text" href="#!">Link 4</a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="footer-copyright">
        <div class="container">
            Made by <a class="orange-text text-lighten-3">@coders</a>
        </div>
    </div>
</footer>


<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

<script>
    (function($){
        $(function(){

            $('.sidenav').sidenav();

        }); // end of document ready
    })(jQuery); // end of jQuery name space

    $(document).ready(function(){
        $('.carousel.carousel-slider').carousel({full_width: true});


    });

    setInterval(function(){
        $('.carousel').carousel('next');
    }, 5000);



</script>

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>

<script src="js/init.js"></script>

</body>
</html>