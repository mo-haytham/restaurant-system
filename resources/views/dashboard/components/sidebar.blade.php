<nav id="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('dashboard') }}">
            <h3>Admin Panel</h3>
        </a>
    </div>
    <ul class="list-unstyled components">
        <li class="3">
            <a href="{{ route('dashboard.orders') }}"><i class="fas fa-shopping-cart"></i> Order Management</a>
        </li>
        <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="far fa-edit"></i> Food Menu
            </a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="{{ route('dashboard.categories') }}">
                        <i class="fas fa-database"></i> Categories
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard.items') }}"><i class="fas fa-hamburger"></i> Menu</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('dashboard.management.accounts') }}"><i class="fas fa-user-circle"></i> Account
                Management</a>
        </li>
        <li class="mt-4">
            <a href="{{ route('dashboard.logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </li>
    </ul>
</nav>
