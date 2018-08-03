<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MySociety -  A Visitor Management System</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
                background-image: url('images/mainbackground.jpg');
                background-repeat: no-repeat;
                background-size: cover;
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
                height: 40px;
                text-align: center;
                margin: 0px
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color:yellowgreen;
                padding: 0 25px;
                font-size: 20px;
                font-weight: 800;
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
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        @if(Auth::user()->role->name == 'administrator')
                            <a href="{{url('/admin')}}">Home</a>
                        @elseif(Auth::user()->role->name =='owner')
                            <a href="{{url('/owner')}}">Home</a>
                        @elseif(Auth::user()->role->name =='security')
                            <a href="{{url('/security')}}">Home</a>
                        @endif
                    @else
                        <a href="{{ route('login') }}"><span class="glyphicon glyphicon-lock"></span> Login</a>
                        <a href="{{ url('/sign-up') }}"><span class="glyphicon glyphicon-user"></span> Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
            </div>
        </div>
    </body>
</html>
