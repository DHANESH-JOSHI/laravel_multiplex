<ul class="nav flex-column p-3">
    <!-- Dashboard -->
    <li class="nav-item mb-2">
        <a class="nav-link fw-bold text-white px-2 py-2 {{ request()->routeIs('dashboard') ? 'active' : '' }}"
           style="background-color: #ff6339;"
           href="{{ route('dashboard') }}">
            <i class="fas fa-film me-2"></i> DASHBOARD
        </a>
    </li>

    <!-- Movie & Web Series Dropdown -->
    <li class="nav-item dropdown mb-2">
        <a class="nav-link dropdown-toggle text-dark {{ request()->is('movies*') || request()->is('webseries*') ? 'active' : '' }}"
           href="#" id="movieWebDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-video me-2"></i> Movie & Web Series
        </a>
        <ul class="dropdown-menu" aria-labelledby="movieWebDropdown">
            <!-- Movies -->
            <li><h6 class="dropdown-header text-uppercase">Movies</h6></li>
            <li><a class="dropdown-item {{ request()->routeIs('movies.create') ? 'active' : '' }}" href="{{ route('movies.create') }}">
                    <i class="fas fa-plus me-2"></i> Add Movie</a></li>
            <li><a class="dropdown-item {{ request()->routeIs('movies.index') ? 'active' : '' }}" href="{{ route('movies.index') }}">
                    <i class="fas fa-list me-2"></i> All Movies</a></li>

            <li><hr class="dropdown-divider"></li>

            <!-- Web Series -->
            <li><h6 class="dropdown-header text-uppercase">Web Series</h6></li>
            <li><a class="dropdown-item {{ request()->routeIs('webseries.create') ? 'active' : '' }}" href="{{ route('webseries.create') }}">
                    <i class="fas fa-plus me-2"></i> Add Web Series</a></li>
            <li><a class="dropdown-item {{ request()->routeIs('webseries.index') ? 'active' : '' }}" href="{{ route('webseries.index') }}">
                    <i class="fas fa-list me-2"></i> All Web Series</a></li>

            <li><hr class="dropdown-divider"></li>

            <!-- Seasons -->
            <li><h6 class="dropdown-header text-uppercase">Seasons</h6></li>
            <li><a class="dropdown-item {{ request()->routeIs('season.create') ? 'active' : '' }}" href="{{ route('seasons.create') }}">
                    <i class="fas fa-plus me-2"></i> Add Season</a></li>
            <li><a class="dropdown-item {{ request()->routeIs('seasons.index') ? 'active' : '' }}" href="{{ route('seasons.index') }}">
                    <i class="fas fa-list me-2"></i> All Seasons</a></li>

            <li><hr class="dropdown-divider"></li>

            <!-- Episodes -->
            <li><h6 class="dropdown-header text-uppercase">Episodes</h6></li>
            <li><a class="dropdown-item {{ request()->routeIs('episodes.create') ? 'active' : '' }}" href="{{ route('episodes.create') }}">
                    <i class="fas fa-plus me-2"></i> Add Episode</a></li>
            <li><a class="dropdown-item {{ request()->routeIs('episodes.index') ? 'active' : '' }}" href="{{ route('episodes.index') }}">
                    <i class="fas fa-list me-2"></i> All Episodes</a></li>
        </ul>
    </li>

    <!-- Other Links -->
    <li class="nav-item mb-2">
        <a href="{{ route('plan.index') }}" class="nav-link text-dark {{ request()->routeIs('plan.index') ? 'active' : '' }}">
            <i class="fas fa-list me-2"></i> Package Plan
        </a>
    </li>

    <!-- Channel Management -->
    <li class="nav-item dropdown mb-2">
        <a class="nav-link dropdown-toggle text-dark" href="#" id="channelDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-cogs me-2"></i> Channel Management
        </a>
        <ul class="dropdown-menu" aria-labelledby="channelDropdown">
            <li><a class="dropdown-item" href="#"><i class="fas fa-list me-2"></i> Approve Channel</a></li>
            <li><a class="dropdown-item" href="#"><i class="fas fa-list me-2"></i> Pending CHANNEL Video</a></li>
            <li><a class="dropdown-item" href="#"><i class="fas fa-list me-2"></i> Rejected CHANNEL Video</a></li>
            <li><a class="dropdown-item" href="#"><i class="fas fa-list me-2"></i> Block CHANNEL Video</a></li>
            <li><a class="dropdown-item" href="#"><i class="fas fa-list me-2"></i> Channels Videos</a></li>
        </ul>
    </li>

    <li class="nav-item mb-2">
        <a href="{{ route('genre.index') }}" class="nav-link text-dark {{ request()->routeIs('genre.index') ? 'active' : '' }}">
            <i class="fas fa-folder me-2"></i> GENRE
        </a>
    </li>

    <li class="nav-item mb-2">
        <a href="{{ route('banner.index') }}" class="nav-link text-dark {{ request()->routeIs('banner.index') ? 'active' : '' }}">
            <i class="fas fa-scroll me-2"></i> Banner
        </a>
    </li>

    <li class="nav-item mb-2">
        <a href="{{ route('home-banner.index') }}" class="nav-link text-dark {{ request()->routeIs('banner.index') ? 'active' : '' }}">
            <i class="fas fa-scroll me-2"></i>Home Banner
        </a>
    </li>

    <li class="nav-item mb-2">
        <a href="{{ route('users.index') }}" class="nav-link text-dark {{ request()->routeIs('users.index') ? 'active' : '' }}">
            <i class="fas fa-user me-2"></i> USERS
        </a>
    </li>

    <li class="nav-item mb-2">
        <a href="{{ route('tlogs.index') }}" class="nav-link text-dark {{ request()->routeIs('tlogs.index') ? 'active' : '' }}">
            <i class="fas fa-clock me-2"></i> TRANSACTION LOG
        </a>
    </li>

    <li class="nav-item mb-2">
        <a href="{{ route('notify.index') }}" class="nav-link text-dark {{ request()->routeIs('notify.index') ? 'active' : '' }}">
            <i class="fas fa-bell me-2"></i> Notification
        </a>
    </li>

    <!-- Profile Dropdown -->
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button"
           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            <img src="{{ Auth::user()->avatar ?? 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name) }}"
                 class="rounded-circle me-2" width="30" height="30" alt="User Avatar">
            {{ Auth::user()->name }}
        </a>

        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>
</ul>
