
<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">

    <script defer src="https://use.fontawesome.com/releases/v5.2.0/js/all.js"
            integrity="sha384-4oV5EgaV02iISL2ban6c/RmotsABqE4yZxZLcYMAdG7FAPsyHYAPpywE9PJo+Khy"
            crossorigin="anonymous"></script>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>MSociety</title>
</head>

<body>
<!-- Nav bar-->
<div class = "navbar-fixed">
    <nav class = "teal">
        <div class="container">
            <div class = "nav-wrapper">
                <a href="#" class="brand-logo">MSociety</a>
                <a href="#" data-target="mobile-nav"
                   class="sidenav-trigger">
                    <i class = "material-icons">menu</i>
                </a>
                <ul class="right hide-on-med-and-down">
                    @if (Route::has('login'))
                        @auth
                            @if(Auth::user()->role->name == 'administrator')
                                <li><a href="{{url('/admin')}}">HOME</a></li>
                            @elseif(Auth::user()->role->name =='manager')
                                <li><a href="{{url('/manager')}}">HOME</a></li>
                            @elseif(Auth::user()->role->name =='owner')
                                <li><a href="{{url('/owner')}}">HOME</a></li>
                            @elseif(Auth::user()->role->name =='security')
                                <li><a href="{{url('/security')}}">HOME</a></li>
                            @endif
                        @else
                            <li><a href="{{ route('login') }}">LOGIN</a></li>
                            <li><a href="{{ url('/sign-up') }}"><span class="glyphicon glyphicon-user"></span> REGISTER</a></li>
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</div>
<ul class="sidenav" id="mobile-nav">
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
<!-- Section : Slider -->
<section class="slider">
    <div class="slider">
        <ul class="slides">
            <li>
                <img src="{{ URL::asset('images/img1.jpeg')}}"> <!-- random image -->
                <div class="caption center-align">
                    <h2>Take Your Dream Home</h2>
                    <h5 class="light grey-text text-lighten-3
                    hide-on-small-only">Lorem ipsum dolor sit amet,
                        consectetur adipisicing elit. Blanditiis, dolorem?

                    </h5>
                </div>
            </li>
            <li>
                <img src="{{ URL::asset('images/img2.png')}}"> <!-- random image -->
                <div class="caption left-align">
                    <h2>Take Your Chance</h2>
                    <h5 class="light grey-text text-lighten-3
                    hide-on-small-only">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Accusamus deserunt vel earum ipsum dignissimos corporis! Pariatur modi sit suscipit doloremque.
                    </h5>
                </div>
            </li>
            <li>
                <img src="{{ URL::asset('images/img3.jpeg')}}"> <!-- random image -->
                <div class="caption right-align">
                    <h2>We Want You To Know You're Not Alone</h2>
                    <h5 class="light grey-text text-lighten-3
                    hide-on-small-only">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                        Ut aliquam quis fugiat minima rerum eligendi ullam porro, voluptate voluptatum, odit voluptatem quae veniam, explicabo suscipit sint perferendis culpa eum laudantium.</h5>
                </div>
            </li>

        </ul>
    </div>
</section>

<!--Section: Popular Places-->
<section id="popular" class="section section-popular scrollspy">
    <div class = "container">
        <div class="row">
            <h4 class ="center"><span class = "teal-text"></span> Popular Places </h4>
            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="{{ URL::asset('images/img1.jpeg')}}" alt="">
                        <span class="card-title">Bangalore
                </span>
                    </div>
                    <div class="card-content">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Numquam, voluptatibus.
                    </div>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="{{ URL::asset('images/img2.png')}}" alt="">
                        <span class="card-title">Hyderabad
                  </span>
                    </div>
                    <div class="card-content">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Numquam, voluptatibus.
                    </div>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="{{ URL::asset('images/img3.jpeg')}}" alt="">
                        <span class="card-title">Cochin
                    </span>
                    </div>
                    <div class="card-content">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Numquam, voluptatibus.
                    </div>
                </div>
            </div>
        </div>
</section>


<!-- section: follow -->
<section class ="section section-follow teal darken-2 white-text center">
    <div class = "container">
        <div class= "row">
            <div class = "col s12">
                <h4>Follow People's society</h4>
                <p>Follow us on social media and be with us</p>
                <a href = "#" class = "white-text">
                    <i class= "fab fa-facebook fa-4x"></i>
                </a>
                <a href = "#" class = "white-text">
                    <i class= "fab fa-twitter fa-4x"></i>
                </a>
                <a href = "#" class = "white-text">
                    <i class= "fab fa-pinterest fa-4x"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- section: Gallery -->
<section id= "gallery" class= "section section-gallery scrollspy">
    <div class = "container">
        <h4 class "center">
        <span class ="teal-text">Photo</span> Gallery
        </h4>
        <div class= "row">
            <div class="col s12 m3">
                <img src="https://source.unsplash.com/1600x900/?beach" alt=""
                     class = "materialboxed responsive-img">
            </div>
            <div class="col s12 m3">
                <img src="https://source.unsplash.com/1600x900/?nature" alt=""
                     class = "materialboxed responsive-img">
            </div>
            <div class="col s12 m3">
                <img src="https://source.unsplash.com/1600x900/?houses" alt=""
                     class = "materialboxed responsive-img">
            </div>
            <div class="col s12 m3">
                <img src="https://source.unsplash.com/1600x900/?beach,travel" alt=""
                     class = "materialboxed responsive-img">
            </div>
        </div>
        <div class= "row">
            <div class="col s12 m3">
                <img src="https://source.unsplash.com/1600x900/?ground" alt=""
                     class = "materialboxed responsive-img">
            </div>
            <div class="col s12 m3">
                <img src="https://source.unsplash.com/1600x900/?pub" alt=""
                     class = "materialboxed responsive-img">
            </div>
            <div class="col s12 m3">
                <img src="https://source.unsplash.com/1600x900/?house" alt=""
                     class = "materialboxed responsive-img">
            </div>
            <div class="col s12 m3">
                <img src="https://source.unsplash.com/1600x900/?plants" alt=""
                     class = "materialboxed responsive-img">
            </div>
        </div>
    </div>
</section>

<!-- Section: Contact-->
<section id = "contact" class= "section section-contact scrollspy">
    <div class ="container">
        <div class ="row">
            <div class = "col s12 m6">
                <div class = "card-panel teal white-text center">
                    <i class = "material-icons">email</i>
                    <h5>Contact us for registration of your society</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
                        .Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                    <a href="/society-register" style="color:white"><button class="btn btn-primary">Society Register</button></a>
                </div>
                <ul class = "collection with-header">
                    <li class = "collection-header"><h4>Location</h4></li>
                    <li class = "collection-item">People's Society</li>
                    <li class = "collection-item">sector 2, HSR layout</li>
                    <li class = "collection-item">Bangalore</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<footer class="page-footer orange">
<div class="footer-copyright">
    <div class="container">
        Made by <a class="orange-text text-lighten-3">@coders</a>
    </div>
</div>
</footer>
<!--JavaScript at end of body for optimized loading-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
<script>
    //sidenav
    const sideNav = document.querySelector('.sidenav');
    M.Sidenav.init(sideNav,{});
    //slider
    const slider = document.querySelector('.slider');
    M.Slider.init(slider,{
        indicators:false,
        height: 500,
        transition: 500,
        interval : 6000
    });
</script>
</body>
</html>