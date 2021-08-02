
<nav class="navbar is-link" role="navigation" aria-label="main navigation">

    <div class="navbar-brand">
        <a class="navbar-item" href="{{ route('posts.index') }}">
            <strong>My social network</strong>
        </a>
    </div>

    <div class="navbar-end">
        <div class="navbar-item">
            <label>
                Logged in as {{ Auth::user()->first_name }}
            </label>
        </div>
        <div class="navbar-item">
            <div class="buttons">
                <a class="button is-primary" href="{{ route('profile.edit') }}">
                    <strong>My Account</strong>
                </a>
                <a class="button" href="{{ route('logout') }}">
                    Log out
                </a>
            </div>
        </div>
    </div>

</nav>
