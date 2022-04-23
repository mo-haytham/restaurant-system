<nav id="sidebar">
    <div class="sidebar-header">
        <h3>Admin Panel</h3>
    </div>
    <ul class="list-unstyled components">
        <li class="3">
            <a href="{{ route('dashboard.index') }}"><i class="fas fa-shopping-cart"></i> Order Management</a>
        </li>
        <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i
                    class="fas fa-cog"></i> Food Menu</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="add-product.html"><i class="fas fa-plus"></i> Add New Item</a>
                </li>
                <li>
                    <a href="edit-product.html"><i class="far fa-edit"></i> Edit Existing One</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('dashboard.account.management') }}"><i class="fas fa-user-circle"></i> Account
                Management</a>
        </li>
        <li class="mt-4">
            <a href="#"><i class="fas fa-sign-out-alt"></i> sign Out</a>
        </li>
    </ul>
</nav>
