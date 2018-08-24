<li>
    <a href="javascript:void(0);" class="menu-toggle">
        <i class="material-icons">account_circle</i>
        <span>Users</span>
    </a>
    <ul class="ml-menu">
        <li><a href="{{ route('admin.users.index') }}">All Users</a></li>
        <li><a href="{{ route('admin.users.create') }}">Create User</a></li>
    </ul>
</li>

<li>
    <a href="{{ route('admin.society.index') }}">
        <i class="material-icons">room</i>
        <span>Soceites</span>
    </a>
</li>

    {{--<li>--}}
        {{--<a href="javascript:void(0);" class="menu-toggle">--}}
            {{--<i class="material-icons">face</i>--}}
            {{--<span>Guests</span>--}}
        {{--</a>--}}
        {{--<ul class="ml-menu">--}}
            {{--<li><a href="{{ route('admin.guests.index') }}">All Guests</a></li>--}}
            {{--<li><a href="{{ route('admin.guests.create') }}">Add Guest</a></li>--}}
        {{--</ul>--}}
    {{--</li>--}}