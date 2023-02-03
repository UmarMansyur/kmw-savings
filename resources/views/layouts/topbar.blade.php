<div class="topbar">
    <nav class="navbar-custom">
        <ul class="list-unstyled topbar-nav float-end mb-0">
            <li class="dropdown">
                <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <span class="ms-1 nav-user-name hidden-sm text-dark mx-2" style="font-weight: 700;">{{ Auth::user() ? Auth::user()->name : request()->session()->get('user')[0]->name  }}</span>
                    @if(!empty(Auth::user()->thumbnail))
                    <img src="{{ url('/storage/employes/images/' . Auth::user()->thumbnail) }}" alt="" class="rounded-circle thumb-lg" height="140" width="140" style="border: 5px solid white; object-fit: cover; object-position: top;">
                    @elseif(empty(Auth::user()->thumbnail) && empty(request()->session()->get('user')[0]->thumbnail))
                    <img src="{{ url('/images/default.jpg') }}" alt="" height="140" width="140" class="rounded-circle thumb-lg" style="border: 5px solid white; object-fit: cover; object-position: top;">
                    @elseif(request()->session()->get('user')[0]->thumbnail)
                    <img src="{{ url('/storage/members/images/' . request()->session()->get('user')[0]->thumbnail) }}" alt="" height="140" width="140" class="rounded-circle thumb-lg" style="border: 5px solid white; object-fit: cover; object-position: top;">
                    @elseif(empty(request()->session()->get('user')[0]->thumbnail))
                    <img src="{{ url('/images/default.jpg') }}" alt="" height="140" width="140" class="rounded-circle thumb-lg" style="border: 5px solid white; object-fit: cover; object-position: top;">
                    @endif
                </a>
            </li>

            <li class="dropdown mt-3 me-4">
                <a href="/logout">
                    <i data-feather="power"></i>
                </a>
            </li>
        </ul>
        <ul class="list-unstyled topbar-nav mb-0">
            <li>
                <button class="nav-link button-menu-mobile">
                    <i data-feather="menu" class="align-self-center topbar-icon text-dark"></i>
                </button>
            </li>
        </ul>
    </nav>
</div>