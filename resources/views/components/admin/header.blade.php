<nav class="navbar navbar-expand-md navbar-dark bg-primary py-3 " style="background-color: red;">
    <div class="container ">
        <a class="navbar-brand" href="#">Dashboard Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}"
                        href="{{ route('dashboard') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Route::is('articles.*') ? 'active' : '' }}"
                        href="{{ route('articles.index') }}">Artikel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('posts.*') ? 'active' : '' }}"
                        href="{{ route('posts.index') }}">Gallery</a>
                </li>

                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
