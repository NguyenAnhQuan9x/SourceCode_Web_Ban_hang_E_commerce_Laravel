<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('assets/img/avatars/logo.png') }}" alt="" width="200px" height="40px">
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item active">
            <a href="/admin/home" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- Layouts -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Quản lý danh mục</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href=" {{ route('categories.create') }}" class="menu-link">
                        <div data-i18n="Without menu">Thêm danh mục</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('categories.index') }}" class="menu-link">
                        <div data-i18n="Without navbar">Danh sách danh mục</div>
                    </a>
                </li>
                
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Quản lý sản phẩm</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href=" {{ route('products.create') }}" class="menu-link">
                        <div data-i18n="Without menu">Thêm sản phẩm</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('products.index') }}" class="menu-link">
                        <div data-i18n="Without navbar">Danh sách sản phẩm</div>
                    </a>
                </li>
                
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Quản lý khuyến mãi</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href=" {{ route('promotions.create') }}" class="menu-link">
                        <div data-i18n="Without menu">Thêm khuyến mãi</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('promotions.index') }}" class="menu-link">
                        <div data-i18n="Without navbar">Danh sách khuyến mãi</div>
                    </a>
                </li>
                
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Quản lý banner</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href=" {{ route('banners.create') }}" class="menu-link">
                        <div data-i18n="Without menu">Thêm banner</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('banners.index') }}" class="menu-link">
                        <div data-i18n="Without navbar">Danh sách banner</div>
                    </a>
                </li>
                
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Quản lý đơn hàng</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href=" {{ route('orders.create') }}" class="menu-link">
                        <div data-i18n="Without menu">Thêm đơn hàng</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('orders.index') }}" class="menu-link">
                        <div data-i18n="Without navbar">Danh sách đơn hàng</div>
                    </a>
                </li>
                
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Quản lý người dùng</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href=" {{ route('users.create') }}" class="menu-link">
                        <div data-i18n="Without menu">Thêm người dùng</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('users.index') }}" class="menu-link">
                        <div data-i18n="Without navbar">Danh sách người dùng</div>
                    </a>
                </li>
                
            </ul>
        </li>
    </ul>
</aside>