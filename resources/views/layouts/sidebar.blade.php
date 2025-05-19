<ul class="nav flex-column p-3">
    <li class="nav-item mb-2 fw-bold text-white px-2 py-2" style="background-color: #ff6339;">
        <i class="fas fa-film me-2"></i> DASHBOARD
    </li>

    <li class="nav-item dropdown mb-2">
        <a class="nav-link dropdown-toggle text-dark" href="#" id="movieWebDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-video me-2"></i> Movie & Web Series
        </a>
        <ul class="dropdown-menu" aria-labelledby="movieWebDropdown">
            <!-- Movies Section -->
            <li>
                <h6 class="dropdown-header text-uppercase">Movies</h6>
            </li>
            <li>
                <a class="dropdown-item" href="{{ route('movies.create') }}">
                    <i class="fas fa-plus me-2"></i> Add Movie
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="{{ route('movies.index') }}">
                    <i class="fas fa-list me-2"></i> All Movies
                </a>
            </li>

            <li><hr class="dropdown-divider"></li>

            <!-- Web Series Section -->
            <li>
                <h6 class="dropdown-header text-uppercase">Web Series</h6>
            </li>
            <li>
                <a class="dropdown-item" href="{{ route('webseries.create') }}">
                    <i class="fas fa-plus me-2"></i> Add Web Series
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="{{ route('webseries.index') }}">
                    <i class="fas fa-list me-2"></i> All Web Series
                </a>
            </li>

            <li><hr class="dropdown-divider"></li>

            <!-- Seasons Section -->
            <li>
                <h6 class="dropdown-header text-uppercase">Seasons</h6>
            </li>
            <li>
                <a class="dropdown-item" href="{{ route('webseries.create') }}">
                    <i class="fas fa-plus me-2"></i> Add Season
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="{{ route('webseries.index') }}">
                    <i class="fas fa-list me-2"></i> All Seasons
                </a>
            </li>

            <li><hr class="dropdown-divider"></li>

            <!-- Episodes Section -->
            <li>
                <h6 class="dropdown-header text-uppercase">Episodes</h6>
            </li>
            <li>
                <a class="dropdown-item" href="{{ route('webseries.create') }}">
                    <i class="fas fa-plus me-2"></i> Add Episode
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="{{ route('webseries.index') }}">
                    <i class="fas fa-list me-2"></i> All Episodes
                </a>
            </li>
        </ul>
    </li>


    <li class="nav-item mb-2">
        <a href="{{ route('plan.index') }}" class="nav-link text-dark">
            <i class="fas fa-list me-2"></i> Package Plan
        </a>
    </li>
    <li class="nav-item dropdown mb-2">
        <a class="nav-link dropdown-toggle text-dark" href="#" id="channelDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-cogs me-2"></i> Channel Management
        </a>
        <ul class="dropdown-menu" aria-labelledby="channelDropdown">
            <li>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-list me-2"></i> Approve Channel
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-list me-2"></i> Pending CHANNEL Video
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-list me-2"></i> Rejected CHANNEL Video
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-list me-2"></i> Block CHANNEL Video
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-list me-2"></i> Channels Videos
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item mb-2">
        <a href="{{ route('genre.index') }}" class="nav-link text-dark">
            <i class="fas fa-folder me-2"></i> GENRE
        </a>
    </li>
    <li class="nav-item mb-2">
        <a href="{{ route('banner.index') }}" class="nav-link text-dark">
            <i class="fas fa-scroll me-2"></i> Banner
        </a>
    </li>
    <li class="nav-item mb-2">
        <a href="{{ route('users.index') }}" class="nav-link text-dark">
            <i class="fas fa-user me-2"></i> USERS
        </a>
    </li>
    <li class="nav-item mb-2">
        <a href="{{ route('tlogs.index') }}" class="nav-link text-dark">
            <i class="fas fa-clock me-2"></i> TRANSACTION LOG
        </a>
    </li>
    <li class="nav-item mb-2">
        <a href="{{ route('notify.index') }}" class="nav-link text-dark">
            <i class="fas fa-bell me-2"></i> Notification
        </a>
    </li>
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
