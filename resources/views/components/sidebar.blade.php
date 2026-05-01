<div class="sidebar">
    <div class="sidebar-container">
        <div class="sidebar-card my-shadow">
            <a href="{{ route('home') }}" class="sidebar-link {{ request()->routeIs('home') ? 'active' : '' }}">
                <i class="bi bi-house-door-fill"></i>
                <span class="link-text">
                    Asosiy
            </span>

            </a>
            <a href="{{ route('notifications') }}" class="sidebar-link {{ request()->routeIs('notifications') ? 'active' : '' }}">
                <i class="bi bi-bell-fill"></i>
                <span class="link-text">
                    Bildirishnoma
                </span>
            </a>
            <a href="{{ route('profile') }}" class="sidebar-link {{ request()->routeIs('profile') ? 'active' : '' }}">
                <i class="bi bi-person-circle"></i>
                <span class="link-text">
                    Profil
                </span>
            </a>
            <a href="{{ route('follow.show') }}" class="sidebar-link {{ request()->routeIs('follow.show') ? 'active' : '' }}">
                <i class="bi bi-people-fill"></i>
                <span class="link-text">
                    Obunalar
                </span>
            </a>
            <a href="{{ route('settings') }}" class="sidebar-link {{ request()->routeIs('settings') ? 'active' : '' }}">
                <i class="bi bi-gear-fill"></i>
                <span class="link-text">
                    Sozlamalar
                </span>
            </a>
            <div class="border-top mx-3"></div>
            <a href="{{ route('posts.create') }}" class="create-post-btn btn">
                Post qo'yish +
            </a>
        </div>
    </div>
</div>
