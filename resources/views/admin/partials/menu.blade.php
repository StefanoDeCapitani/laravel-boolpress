<div class="menu bg-secondary h-100 w-100 px-4 py-4">
    <ul class="navbar-nav d-flex direction-column ml-auto mb-2 mb-lg-0">
        @if( Auth::user()->role === "admin")
        <li class="nav-item"><a class="nav-link text-white" href="{{ route("admin.users.index") }}">Users</a></li>
        @endif
        <li class="nav-item"><a class="nav-link text-white active" aria-current="page" href="{{ route("admin.posts.index") }}">Posts</a></li>
    </ul>
</div>