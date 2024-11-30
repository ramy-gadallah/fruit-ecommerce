<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="side-header">
        <a class="header-brand1" href="{{ route('adminHome') }}">
            {{-- <img src="{{ getFile(isset($setting['logo']->value) ? $setting->logo : null) }}" class="header-brand-img" alt="logo"> --}}
            <img src="{{asset('web/img/logo.png')}}" class="header-brand-img" alt="logo">
        </a>
        <!-- LOGO -->
    </div>
    <ul class="side-menu">
        <li>
            <h3>{{ trns('elements') }}</h3>
        </li>
        <li class="slide">
            <a class="side-menu__item  {{ Route::currentRouteName() == 'adminHome' ? 'active' : '' }}"
                href="{{ route('adminHome') }}">
                <i class="fa fa-home side-menu__icon"></i>
                <span class="side-menu__label">{{ trns('home') }}</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item  {{ Route::currentRouteName() == 'admins.index' ? 'active' : '' }}"
                href="{{ route('admins.index') }}">
                <i class="fa fa-user-shield side-menu__icon"></i>
                <span class="side-menu__label">{{ trns('admins') }}</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item  {{ Route::currentRouteName() == 'users.index' ? 'active' : '' }}"
                href="{{ route('users.index') }}">
                <i class="fa fa-users side-menu__icon"></i>
                <span class="side-menu__label">{{ trns('users') }}</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item  {{ Route::currentRouteName() == 'newLetter.index' ? 'active' : '' }}"
                href="{{ route('newLetter.index') }}">
                <i class="fa fa-users side-menu__icon"></i>
                <span class="side-menu__label">{{ trns('new_letter') }}</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item  {{ Route::currentRouteName() == 'blogs.index' ? 'active' : '' }}"
                href="{{ route('blogs.index') }}">
                <i class="fa fa-edit side-menu__icon"></i>
                <span class="side-menu__label">{{ trns('blogs') }}</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item  {{ Route::currentRouteName() == 'admin.slider.index' ? 'active' : '' }}"
                href="{{ route('admin.slider.index') }}">
                <i class="fa fa-users side-menu__icon"></i>
                <span class="side-menu__label">{{ trns('slider') }}</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item  {{ Route::currentRouteName() == 'deals.index' ? 'active' : '' }}"
                href="{{ route('deals.index') }}">
                <i class="fa fa-handshake side-menu__icon"></i>
                <span class="side-menu__label">{{ trns('Deal') }}</span>
            </a>
        </li>


        <li class="slide">
            <a class="side-menu__item  {{ Route::currentRouteName() == 'reviews.index' ? 'active' : '' }}"
                href="{{ route('reviews.index') }}">
                <i class="fa fa-star side-menu__icon"></i>
                <span class="side-menu__label">{{ trns('reviews') }}</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item  {{ Route::currentRouteName() == 'jobs.index' ? 'active' : '' }}"
                href="{{ route('jobs.index') }}">
                <i class="fa fa-briefcase side-menu__icon"></i>
                <span class="side-menu__label">{{ trns('Jobs') }}</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item  {{ Route::currentRouteName() == 'team.index' ? 'active' : '' }}"
                href="{{ route('team.index') }}">
                <i class="fa fa-users side-menu__icon"></i>
                <span class="side-menu__label">{{ trns('teams') }}</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item  {{ Route::currentRouteName() == 'partners.index' ? 'active' : '' }}"
                href="{{ route('partners.index') }}">
                <i class="fa fa-handshake side-menu__icon"></i>
                <span class="side-menu__label">{{ trns('partners') }}</span>
            </a>
        </li>



        <li class="slide">
            <a class="side-menu__item  {{ Route::currentRouteName() == 'category.index' ? 'active' : '' }}"
                href="{{ route('category.index') }}">
                <i class="fa fa-bars side-menu__icon"></i>
                <span class="side-menu__label">{{ trns('Categories') }}</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item  {{ Route::currentRouteName() == 'unit.index' ? 'active' : '' }}"
                href="{{ route('unit.index') }}">
                <i class="fa fa-ruler side-menu__icon"></i>
                <span class="side-menu__label">{{ trns('units') }}</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item  {{ Route::currentRouteName() == 'product.index' ? 'active' : '' }}"
                href="{{ route('product.index') }}">
                <i class="fa fa-box side-menu__icon"></i>
                <span class="side-menu__label">{{ trns('Products') }}</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item  {{ Route::currentRouteName() == 'breadcrumb.index' ? 'active' : '' }}"
                href="{{ route('breadcrumb.index') }}">
                <i class="fa fa-angle-double-right side-menu__icon"></i>
                <span class="side-menu__label">{{ trns('bread_crumb') }}</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item  {{ Route::currentRouteName() == 'settingIndex' ? 'active' : '' }}"
                href="{{ route('settingIndex') }}">
                <i class="fa fa-wrench side-menu__icon"></i>
                <span class="side-menu__label">{{ trns('settings') }}</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item  {{ Route::currentRouteName() == 'admin.aboutHome.index' ? 'active' : '' }}"
                href="{{ route('admin.aboutHome.index') }}">
                <i class="fa fa-question-circle side-menu__icon"></i>
                <span class="side-menu__label">{{ trns('home_about') }}</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item  {{ Route::currentRouteName() == 'contact_us.index' ? 'active' : '' }}" href="{{route('contact_us.index')}}">
                <i class="fa fa-envelope side-menu__icon"></i>
                <span class="side-menu__label">{{ trns('contact us') }}</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item  {{ Route::currentRouteName() == 'coupon.index' ? 'active' : '' }}" href="{{route('coupon.index')}}">
                <i class="fa fa-money-bill side-menu__icon"></i>  <!-- For Money -->
                <span class="side-menu__label">{{ trns('coupon') }}</span>
            </a>
        </li>


        <li class="slide">
            <a class="side-menu__item {{ Route::currentRouteName() == 'admin.logout' ? 'active' : '' }}"
                href="{{ route('admin.logout') }}">
                <i class="fa fa-lock side-menu__icon"></i>
                <span class="side-menu__label">{{ trns('logout') }}</span>
            </a>
        </li>

    </ul>
</aside>
