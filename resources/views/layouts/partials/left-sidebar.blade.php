<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{ URL::asset('bsb/images/user.png')}}" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</div>
            <div class="email">{{Auth::user()->email}}</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="material-icons">input</i>Sign Out
                        </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active">

                    @if(Auth::user()->role->name == 'administrator')
                        <a href="{{url('/admin')}}">
                    @elseif(Auth::user()->role->name =='manager')
                        <a href="{{url('/manager')}}">
                    @elseif(Auth::user()->role->name =='owner')
                        <a href="{{url('/owner')}}">
                    @elseif(Auth::user()->role->name =='security')
                        <a href="{{url('/security')}}">
                    @endif
                    <i class="material-icons">home</i>
                    <span>Home</span>
                </a>
            </li>

            @if(Auth::user()->role->name == 'administrator')
                @include('layouts.partials.admin-menu')
            @elseif(Auth::user()->role->name =='manager')
                @include('layouts.partials.manager-menu')
            @elseif(Auth::user()->role->name =='owner')
                @include('layouts.partials.owner-menu')
            @elseif(Auth::user()->role->name =='security')
                @include('layouts.partials.security-menu')
            @endif

            {{--<li>--}}
                {{--<a href="javascript:void(0);" class="menu-toggle">--}}
                    {{--<i class="material-icons">swap_calls</i>--}}
                    {{--<span>User Interface (UI)</span>--}}
                {{--</a>--}}
                {{--<ul class="ml-menu">--}}
                    {{--<li>--}}
                        {{--<a href="{{ route('ui', ['page' => 'alerts']) }}">Alerts</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{ route('ui', ['page' => 'animations']) }}">Animations</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{ route('ui', ['page' => 'badges']) }}">Badges</a>--}}
                    {{--</li>--}}

                    {{--<li>--}}
                        {{--<a href="{{ route('ui', ['page' => 'breadcrumbs']) }}">Breadcrumbs</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="pages/ui/buttons.html">Buttons</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="pages/ui/collapse.html">Collapse</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="pages/ui/colors.html">Colors</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="pages/ui/dialogs.html">Dialogs</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="pages/ui/icons.html">Icons</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="pages/ui/labels.html">Labels</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="pages/ui/list-group.html">List Group</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="pages/ui/media-object.html">Media Object</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="pages/ui/modals.html">Modals</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="pages/ui/notifications.html">Notifications</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="pages/ui/pagination.html">Pagination</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="pages/ui/preloaders.html">Preloaders</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="pages/ui/progressbars.html">Progress Bars</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="pages/ui/range-sliders.html">Range Sliders</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="pages/ui/sortable-nestable.html">Sortable & Nestable</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="pages/ui/tabs.html">Tabs</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="pages/ui/thumbnails.html">Thumbnails</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="pages/ui/tooltips-popovers.html">Tooltips & Popovers</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="pages/ui/waves.html">Waves</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="javascript:void(0);" class="menu-toggle">--}}
                    {{--<i class="material-icons">assignment</i>--}}
                    {{--<span>Forms</span>--}}
                {{--</a>--}}
                {{--<ul class="ml-menu">--}}
                    {{--<li>--}}
                        {{--<a href="{{ route('forms.basic-form-elements') }}">Basic Form Elements</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{ route('forms.advanced-form-elements') }}">Advanced Form Elements</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{ route('forms.form-examples') }}">Form Examples</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{ route('forms.form-validation') }}">Form Validation</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{ route('forms.form-wizard') }}">Form Wizard</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{ route('forms.editors') }}">Editors</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="javascript:void(0);" class="menu-toggle">--}}
                    {{--<i class="material-icons">view_list</i>--}}
                    {{--<span>Tables</span>--}}
                {{--</a>--}}
                {{--<ul class="ml-menu">--}}
                    {{--<li>--}}
                        {{--<a href="{{ route('tables.normal-tables') }}">Normal Tables</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{ route('tables.jquery-datatables') }}">Jquery Datatables</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{ route('tables.editable-tables') }}">Editable Tables</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="javascript:void(0);" class="menu-toggle">--}}
                    {{--<i class="material-icons">perm_media</i>--}}
                    {{--<span>Medias</span>--}}
                {{--</a>--}}
                {{--<ul class="ml-menu">--}}
                    {{--<li>--}}
                        {{--<a href="{{ route('medias.image-gallery') }}">Image Gallery</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{ route('medias.carousel') }}">Carousel</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="javascript:void(0);" class="menu-toggle">--}}
                    {{--<i class="material-icons">pie_chart</i>--}}
                    {{--<span>Charts</span>--}}
                {{--</a>--}}
                {{--<ul class="ml-menu">--}}
                    {{--<li>--}}
                        {{--<a href="{{ route('charts.morris') }}">Morris</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{ route('charts.flot') }}">Flot</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{ route('charts.chartjs') }}">ChartJS</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{ route('charts.sparkline') }}">Sparkline</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{ route('charts.jquery-knob') }}">Jquery Knob</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="javascript:void(0);" class="menu-toggle">--}}
                    {{--<i class="material-icons">content_copy</i>--}}
                    {{--<span>Example Pages</span>--}}
                {{--</a>--}}
                {{--<ul class="ml-menu">--}}
                    {{--<li>--}}
                        {{--<a href="{{ route('examples.sign-in') }}">Sign In</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{ route('examples.sign-up') }}">Sign Up</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{ route('examples.forgot-password') }}">Forgot Password</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{ route('examples.blank') }}">Blank Page</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{ route('examples.404') }}">404 - Not Found</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{ route('examples.500') }}">500 - Server Error</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="javascript:void(0);" class="menu-toggle">--}}
                    {{--<i class="material-icons">map</i>--}}
                    {{--<span>Maps</span>--}}
                {{--</a>--}}
                {{--<ul class="ml-menu">--}}
                    {{--<li>--}}
                        {{--<a href="pages/maps/google.html">Google Map</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="pages/maps/yandex.html">YandexMap</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="pages/maps/jvectormap.html">jVectorMap</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="javascript:void(0);" class="menu-toggle">--}}
                    {{--<i class="material-icons">trending_down</i>--}}
                    {{--<span>Multi Level Menu</span>--}}
                {{--</a>--}}
                {{--<ul class="ml-menu">--}}
                    {{--<li>--}}
                        {{--<a href="javascript:void(0);">--}}
                            {{--<span>Menu Item</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="javascript:void(0);">--}}
                            {{--<span>Menu Item - 2</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="javascript:void(0);" class="menu-toggle">--}}
                            {{--<span>Level - 2</span>--}}
                        {{--</a>--}}
                        {{--<ul class="ml-menu">--}}
                            {{--<li>--}}
                                {{--<a href="javascript:void(0);">--}}
                                    {{--<span>Menu Item</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="javascript:void(0);" class="menu-toggle">--}}
                                    {{--<span>Level - 3</span>--}}
                                {{--</a>--}}
                                {{--<ul class="ml-menu">--}}
                                    {{--<li>--}}
                                        {{--<a href="javascript:void(0);">--}}
                                            {{--<span>Level - 4</span>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}

        </ul>
    </div>
    <!-- #Menu -->


    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; 2018 - 2019 <a href="https://aekansh.me">Aekansh Partani</a>
        </div>
        <div class="version">
            <b>Version: </b> 1.0
        </div>
    </div>
    <!-- #Footer -->
</aside>
<!-- #END# Left Sidebar -->