<!-- header -->
<div class="top-header-area" id="sticker">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 text-center">
                <div class="main-menu-wrap">
                    <!-- logo -->
                    <div class="site-logo">
                        <a href="{{ route('web.home.index') }}">
                            <img src="{{ asset('web') }}/img/logo.png" alt="">
                        </a>
                    </div>
                    <!-- logo -->

                    <!-- menu start -->
                    <nav class="main-menu">
                        <ul>
                            <li class="{{ Route::currentRouteName() == 'web.home.index' ? 'current-list-item' : '' }}">
                                <a href="{{ route('web.home.index') }}">Home</a>
                            </li>
                            <li class="{{ Route::currentRouteName() == 'web.about.index' ? 'current-list-item' : '' }}">
                                <a href="{{ route('web.about.index') }}">About</a>
                            </li>
                            <li class="{{ Route::currentRouteName() == 'web.shop.index' ? 'current-list-item' : '' }}">
                                <a href="{{ route('web.shop.index') }}">Shop</a>
                            </li>
                            <li class="{{ Route::currentRouteName() == 'web.cart.index' ? 'current-list-item' : '' }}">
                                <a href="{{ route('web.cart.index') }}">Carts</a>
                            </li>
                            <li class="{{ Route::currentRouteName() == 'web.news.index' ? 'current-list-item' : '' }}">
                                <a href="{{ route('web.news.index') }}">News</a>
                            </li>
                            <li class="{{ Route::currentRouteName() == 'web.team.index' ? 'current-list-item' : '' }}">
                                <a href="{{ route('web.team.index') }}">Team</a>
                            </li>
                            <li class="{{ Route::currentRouteName() == 'web.contact.index' ? 'current-list-item' : '' }}">
                                <a href="{{ route('web.contact.index') }}">Contact</a>
                            </li>
                            <li>
                                <div class="header-icons">
                                    <a class="shopping-cart " href="{{ route('web.cart.index') }}"><i class="fas fa-shopping-cart"></i></a>
                                </div>
                            </li>

                            <!-- Add Login and Register links here -->
                            @if (Auth::check())
                                <!-- If the user is logged in -->
                                <li><a href="{{ route('web.logout') }}" class="login-register-btn">log out</a></li>
                            @else
                                <!-- If the user is not logged in -->
                                <li><a href="{{ route('web.login') }}" class="login-register-btn">Login</a></li>
                                <li><a href="{{ route('web.register') }}" class="login-register-btn">Register</a></li>
                            @endif
                        </ul>
                    </nav>
                    <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                    <div class="mobile-menu"></div>
                    <!-- menu end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end header -->
